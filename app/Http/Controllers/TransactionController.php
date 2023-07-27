<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use DB;
use DataTables;

class TransactionController extends Controller
{
    public function add()
    {
        $product = Product::all();
        return view('pages.transaction.guest', compact('product'));
    }

    public function cart(Request $request)
    {
        $product = json_decode($request->payload);
        $response = json_decode($request->response);
        $goldPrice = $response->items[0]->xauPrice;
        $inGram = $goldPrice/31.103;

        $res = [];
        foreach ($product as $item) {
            $fetch = Product::where('id', $item->product_id)->first();
            $weight = $fetch->product_weight;
            $qty = $item->qty;
            
            if($fetch->product_unit == 'g') {
                $total_price = $inGram * ($weight * $qty);
            } else if ($fetch->product_unit == 'kg'){
                $total_price = $inGram * (($weight * 1000) * $qty);
            }
            
            $res[] = [
                'product_id' => $fetch->id,
                'product_name' => $fetch->product_name,
                'product_images' => $fetch->product_images,
                'product_weight' => $fetch->product_weight,
                'product_unit' => $fetch->product_unit,
                'qty' => $qty,
                'total_price' => $total_price,
            ];
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $res,
        ]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $gold_price = $request->responJson['items'][0]['xauPrice']/31.103;

            foreach ($request->products as $key) {
                Transaction::create([
                    'transaction_date' => date('Y-m-d H:i:s'),
                    'buyer_name' => $request->buyerName,
                    'buyer_phone' => $request->buyerPhone,
                    'buyer_email' => $request->buyerEmail,
                    'buyer_address' => $request->buyerAddress,
                    'gold_json' => json_encode($request->responJson),
                    'gold_price' => round($gold_price),
                    'product_id' => $key['productId'],
                    'qty' => $key['qty'],
                    'grand_total' => $key['totalPrice'],
                ]);
            }

            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'successfully submit order',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'message' => $th->getMessage(),
            ],400);
        }
    }

    public function datatable()
    {
        $product = Transaction::join('products', 'products.id', '=', 'transactions.product_id')
            ->select('transactions.*', 'product_name', 'product_weight', 'product_unit')
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
                ->join('products', 'products.id', '=', 'transactions.product_id')
                ->select('transactions.*', 'product_name', 'product_weight', 'product_unit')
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
