<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\GoldRate;
use App\Models\TransactionDetail;
use DB;
use Alert;
use DataTables;

class TransactionController extends Controller
{
    public function add(Request $request)
    {
        $search = $request->search;

        $product = Product::when($search, function ($query) use ($search){
                return $query->where('product_name', 'LIKE', '%'.$search.'%');
            })->get();
        
        return view('pages.transaction.guest', compact('product','search'));
    }

    public function checkout(Request $request)
    {
        $ids = $request->product_ids;
        $product = Product::whereIn('id', explode(',', $ids))->get();

        return view('pages.transaction.checkout', compact('product'));
    }

    public function customOrder(Request $request)
    {
        $gold_rate = GoldRate::all();
        return view('pages.transaction.custom-order', compact('gold_rate'));
    }

    public function orderCompleted(Request $request)
    {
        return view('pages.transaction.order-completed');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $goldData = json_decode($request->jsonData);

            $trc = new Transaction();
            $trc->transaction_date = date('Y-m-d H:i:s');
            $trc->buyer_name = $request->nama;
            $trc->buyer_email = $request->email;
            $trc->buyer_phone = $request->noHp;
            $trc->buyer_address = $request->alamat;
            $trc->gold_price = round($goldData->items[0]->xauPrice / 31.103);
            $trc->gold_json = $request->jsonData;
            $trc->grand_total = $request->grandTotal;
            $trc->buyer_name = $request->nama;
            $trc->save();
            
            $url_image = '';

            if ($request->hasFile('contohGambar')) {
                $imagePath = $request->file('contohGambar')->store('product_images', 'public');
                $url_image = asset('storage/'.$imagePath);
            }

            $fetchRate = GoldRate::where('rate', $request->kadar)->first();

            $detail = new TransactionDetail();
            $detail->transaction_id = $trc->id; 
            $detail->qty = $request->jumlah;
            $detail->example_images = $url_image;
            $detail->product_weight = $request->berat;
            $detail->product_type = $request->jenis;
            $detail->gold_rate = $fetchRate->carat;
            $detail->stone_type = $request->jenisBatu;
            $detail->stone_weight = $request->beratBatu;
            $detail->ring_size = $request->ukuran;
            $detail->name_graph = $request->grafirNama;
            $detail->finishing_color = $request->finishingWarna;
            $detail->payment = $request->pembayaran;
            $detail->save();

            DB::commit();
            return redirect()->route('order-completed');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('order-completed');
           
        }
    }

    public function datatable()
    {
        $product = Transaction::join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->select('transactions.*', 'product_type', 'qty')
            ->get();
            
        return DataTables::of($product)
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index()
    {
        $menu = "transaction";
        return view('pages.transaction.index', compact('menu'));
    }

    public function detail($id)
    {
        try {
            $res = Transaction::where('transactions.id', $id)
                ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
                ->first();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => $res,
            ], 200);
        } catch (\Throwable $th) {
            
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'message' => $th->getMessage(),
            ],400);
        }
    }
}
