<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
use Storage;
use Validator;
use Alert;
use DB;

class ProductController extends Controller
{
    public function datatable()
    {
        $product = Product::all();
            
        return DataTables::of($product)
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index()
    {
        $menu = "product";
        return view('pages.product.index', compact('menu'));
    }

    public function add()
    {
        $menu = "product";
        return view('pages.product.add');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'productName' => 'required|string|max:255',
                'productUnit' => 'required',
                'productWeight' => 'required|numeric',
            ], [
                'productName.required' => 'Maaf kamu belum input nama produk',
                'productUnit.required' => 'Maaf kamu belum input unit produk',
                'productWeight.required' => 'Maaf kamu belum input berat produk',
                'productWeight.numeric' => 'Maaf berat produk harus berupa angka',
            ]);
            
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
    
            // Handle product_image update if request has productImage
            if ($request->hasFile('productImage')) {
                // Store the new product_image
                $imagePath = $request->file('productImage')->store('product_images', 'public');
                
                // Update the product_image field in the database
                Product::create([
                    'product_name' => $request->productName,
                    'product_images' => asset('storage/'.$imagePath),
                    'product_unit' => $request->productUnit,
                    'product_weight' => $request->productWeight,
                ]);
            } else {
                Product::create([
                    'product_name' => $request->productName,
                    'product_images' => '',
                    'product_unit' => $request->productUnit,
                    'product_weight' => $request->productWeight,
                ]);
            }
            
            DB::commit();
            Alert::success('Berhasil', 'Berhasil Tambah Produk');
            return redirect()->route('product');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('product')->withInput();
        }
    }

    public function detail($id)
    {
        try {
            $product = Product::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Berhasil Mengambil Data Product',
                'data' => $product
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Gagal '.$th->getMessage(),
                'data' => []
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'productName' => 'required|string|max:255',
                'productUnit' => 'required',
                'productWeight' => 'required|numeric',
            ], [
                'productName.required' => 'Maaf kamu belum input nama produk',
                'productUnit.required' => 'Maaf kamu belum input unit produk',
                'productWeight.required' => 'Maaf kamu belum input berat produk',
                'productWeight.numeric' => 'Maaf berat produk harus berupa angka',
            ]);
            
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
    
            $product = Product::findOrFail($id);
    
            // Update product_name
            $product->update([
                'product_name' => $request->productName,
                'product_unit' => $request->productUnit,
                'product_weight' => $request->productWeight,
            ]);
    
            // Handle product_image update if request has productImage
            if ($request->hasFile('productImage')) {
                // Delete the old product_image if it exists
                if ($product->product_image) {
                    Storage::delete($product->product_image);
                }
    
                // Store the new product_image
                $imagePath = $request->file('productImage')->store('product_images', 'public');
                
                // Update the product_image field in the database
                $product->update([
                    'product_images' => asset('storage/'.$imagePath),
                ]);
            }
            
            DB::commit();
            Alert::success('Berhasil', 'Berhasil Update Produk');
            return redirect()->route('product');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('product')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Berhasil Delete Product',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Gagal '.$th->getMessage(),
            ]);
        }
    }
}
