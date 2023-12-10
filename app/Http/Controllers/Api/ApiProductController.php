<?php

namespace App\Http\Controllers\Api;

use App\Models\Foto;
use App\Models\Varian;
use App\Models\Product;
use App\Models\BeratJenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductResources;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->get();
        // return response()->json($data);
        $transformedData = $data->map(function ($product) {
            return new ProductResources($product);
        });

        return response()->json(['success' => true, 'data' => $transformedData], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {   
        $request->validated();
        $data = $request->all();
        // return response()->json($data);
        try {
            DB::beginTransaction();
            $product = Product::create([
                'nama_product' =>$data['nama_product'],
                'harga_rendah'=>$data['harga_rendah'],
                'harga_tinggi'=>$data['harga_tinggi'],
                'deskripsi'=>$data['deskripsi'],
                'link_shopee'=>$data['link_shopee'],
                'stok'=>$data['stok'],
                'spesifikasi_product'=>$data['spesifikasi_product'],
            ]);
            $productID = $product->id;
            $varians= $data['varian'];

            foreach ($varians as $varian) {
                Varian::create([
                    'jenis_varian' => $varian,
                    'product_id' => $productID,
                ]);
            }

            $beratJenis = $data['beratjenis'];

            foreach ($beratJenis as $berat) {
                BeratJenis::create([
                    "berat_jenis" => $berat,
                    "product_id" => $productID
                ]);
            }

            // Proses setiap file yang diunggah
            $images = [];
            foreach ($request->file('image') as $file) {
                $img = $file->store("images");
                $images[] = $img;
            }

            // Simpan informasi gambar ke dalam tabel Foto
            foreach ($images as $image) {
                Foto::create([
                    'foto' => $image,
                    'product_id' => $productID
                ]);
            }

            DB::commit();

            // $request->session()->forget(['product_data', 'berat_jenis', 'varian', 'image_data']);
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Product Created',
                    'data'=>[
                        'id'=>$productID,
                        'nama_product'=>$data['nama_product'],
                        'harga_rendah'=>$data['harga_rendah'],
                        'harga_tinggi'=>$data['harga_tinggi'],
                        'deskripsi'=>$data['deskripsi'],
                        'link_shopee'=>$data['link_shopee'],
                        'stok'=>$data['stok'],
                        'spesifikasi_product'=>$data['spesifikasi_product'],
                        'berat_jenis'=>$beratJenis,
                        'varian'=>$varians,
                        'image'=>$images,
                        
                    ]
                
                ]
                ,201);
        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            DB::rollBack();
            // throw $e;
            $errorMessage = $e instanceof \Illuminate\Database\QueryException ?
            'Database error. Something went wrong.' :
            'An unexpected error occurred.';

        return response()->json(['success' => false, 'message' => $errorMessage], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($id);
            $transformedData = new ProductResources($data);
            return response()->json(['success' => true, 'data' => $transformedData]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, $id)
    {
        
        $request->validated();
        $data = $request->all();
        // dd($data);
        try {
            DB::beginTransaction();
    
            // Find the product by ID
            $product = Product::findOrFail($id);
    
            // Update the product data
            $product->update([
                'nama_product' => $request->nama_product,
                'harga_rendah' => $request->harga_rendah,
                'harga_tinggi' => $request->harga_tinggi,
                'deskripsi' => $request->deskripsi,
                'link_shopee' => $request->link_shopee,
                'stok' => $request->stok,
                'spesifikasi_product' => $request->spesifikasi_product,
            ]);
    
            // Update or create beratJenis records
            $product->beratJenis()->delete();
            foreach ($request->beratjenis as $beratjenis) {
                $product->beratJenis()->create([
                    'berat_jenis'=> $beratjenis,
                ]);
            }
            // $product->beratJenis()->sync($beratJenisIds);
    
            // Update or create varians records
            $product->varians()->delete(); // Delete existing varians
            foreach ($request->varian as $varian) {
                $product->varians()->create(['jenis_varian' => $varian]);
            }
    
            // Handle image updates
            if ($request->hasFile('image')) {
                $this->validate($request, [
                    'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);
    
                // Delete existing images
                foreach ($product->fotos as $foto) {
                    Storage::delete($foto->foto);
                    $foto->delete();
                }
    
                // Process each uploaded file
                foreach ($request->file('image') as $file) {
                    $img = $file->store("images");
                    // Create new image record
                    Foto::create([
                        'foto' => $img,
                        'product_id' => $product->id,
                    ]);
                }
            }
    
            DB::commit();
    
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Product Edited',
                    'data'=>[
                        'id'=>$id,
                        'nama_product'=>$request->nama_product,
                        'harga_rendah'=>$request->harga_rendah,
                        'harga_tinggi'=>$request->harga_tinggi,
                        'deskripsi'=>$request->deskripsi,
                        'link_shopee'=>$request->link_shopee,
                        'stok'=>$request->stok,
                        'spesifikasi_product'=>$request->spesifikasi_product,
                        'berat_jenis'=>$request->beratjenis,
                        'varian'=>$request->varian,
                        'image'=>$request->image,
                        
                    ]
                
                ]
                ,200);
        } catch (\Exception $e) {
            // If there is an error, rollback the transaction
            DB::rollBack();
            throw $e;
            // Handle the error as needed
            // return redirect()->back()->with('error', 'Failed to update product data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    try {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->find($id);

        if (!$data) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['success' => true, 'message' => 'Product has been deleted']);
    } catch (ModelNotFoundException $e) {
        return response()->json(['success' => false, 'message' => 'Something went wrong'], 404);
    }
}

}
