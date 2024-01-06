<?php

namespace App\Http\Controllers\Api;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
        $data = Product::with(['fotos', 'varians'])
            ->where('tersedia', 1)
            ->get();
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
        $manager = new ImageManager(
            new Driver()
        );
        $request->validated();
        $data = $request->all();
        // dd($data);
        // $images = $request->file('image');


        // $file = $data['image'];
        // dd($file);
        // $images = [];
        //     foreach ($request->file('image') as $file) {
        //         // dd($file);
        //         $img = $file->store("images");
        //         // dd($img); // images/kYu4iKIXFVEypwYb1lp0UfZuH1ST5E5nDoUVgbYx.jpg"
        //         $filePath = storage_path('app/public/' . $img);
        //         $manager = new ImageManager(new Driver());
        //         // dd($manager);
        //         $image = $manager->read('storage/' . $img);
        //         $encoded = $image->toJpeg(40); // Intervention\Image\EncodedImage
        //         $encoded->save($filePath);

        //         $images[] = $img;
        //     };
        // return response()->json($images);
        // // // if (isset($file)) {
        //     $img = $file->store("images"); //images/F0Rz0AKultyXDoTikIbygvKhsFJU0mSnINrpUUSd.jpg
        //     // dd($img);
        //     // dd($img);
            // $filePath = storage_path('app/public/'.$img);
            // // $fileSize = filesize($filePath);
            //     // dd('true');
            //     // dd($fileSize / 1024); //covert to Kb, memroy->2730.4306640625
            //     $manager = new ImageManager(new Driver());
            //     $image = $manager->read('storage/'.$img);
            //     $encoded = $image->toJpeg(40); // Intervention\Image\EncodedImage

            //     $encoded->save($filePath);                
            //     $filePath = storage_path('app/public/'.$img);
            //     $fileSize = filesize($filePath);
            //     dd($fileSize / 1024);
        // // }



        try {
            // $image = $manager->read('images/example.jpg');

            DB::beginTransaction();
            $product = Product::create([
                'nama_product' => $data['nama_product'],
                'harga' => $data['harga'],
                'deskripsi' => $data['deskripsi'],
                'link_shopee' => $data['link_shopee'],
                'stok' => $data['stok'],
                'spesifikasi_product' => $data['spesifikasi_product'],
                'tersedia' => '1',
            ]);
            $productID = $product->id;
            $varians = $data['varian'];
            // return response()->json($varians);
            foreach ($varians as $varian) {
                Varian::create([
                    'jenis_varian' => $varian,
                    'product_id' => $productID,
                ]);
            }

            // Proses setiap file yang diunggah
            $images = [];
            foreach ($request->file('image') as $file) {
                // dd($file);
                $img = $file->store("images");
                // dd($img); // images/kYu4iKIXFVEypwYb1lp0UfZuH1ST5E5nDoUVgbYx.jpg"
                $filePath = storage_path('app/public/' . $img);
                $manager = new ImageManager(new Driver());
                // dd($manager);
                $image = $manager->read('storage/' . $img);
                $encoded = $image->toJpeg(40); // Intervention\Image\EncodedImage
                $encoded->save($filePath);

                $images[] = $img;
            }
            // dd($images);

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
                    'success' => true,
                    'message' => 'Product Created',
                    'data' => [
                        'id' => $productID,
                        'nama_product' => $data['nama_product'],
                        'harga' => $data['harga'],
                        'deskripsi' => $data['deskripsi'],
                        'link_shopee' => $data['link_shopee'],
                        'stok' => $data['stok'],
                        'spesifikasi_product' => $data['spesifikasi_product'],
                        'varian' => $varians,
                        'image' => $images,

                    ]

                ],
                201
            );
        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            DB::rollBack();
            throw $e;
            // $errorMessage = $e instanceof \Illuminate\Database\QueryException ?
            //     'Database error. Something went wrong.' :
            //     'An unexpected error occurred.';

            // return response()->json(['success' => false, 'message' => $errorMessage], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = Product::with(['fotos', 'varians'])->findOrFail($id);
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
        $manager = new ImageManager(
            new Driver()
        );
        $images = [];
        // dd($request->all());
        $request->validated();
        try {
            DB::beginTransaction();

            // Find the product by ID
            $product = Product::findOrFail($id);

            // Update the product data
            $product->update([
                'nama_product' => $request->nama_product,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'link_shopee' => $request->link_shopee,
                'stok' => $request->stok,
                'spesifikasi_product' => $request->spesifikasi_product,
            ]);


            // $product->beratJenis()->sync($beratJenisIds);

            // Update or create varians records
            $product->varians()->delete(); // Delete existing varians
            foreach ($request->varian as $varian) {
                $product->varians()->create(['jenis_varian' => $varian]);
            }

            // Handle image updates
            if ($request->hasFile('image')) {
                // dd('test');
                // Delete existing images
                foreach ($product->fotos as $foto) {
                    Storage::delete($foto->foto);
                    $foto->delete();
                }

                // Process each uploaded file
          
                foreach ($request->file('image') as $file) {
                    // dd($file);
                    $img = $file->store("images");
                    // dd($img); // images/kYu4iKIXFVEypwYb1lp0UfZuH1ST5E5nDoUVgbYx.jpg"
                    $filePath = storage_path('app/public/' . $img);
                    $fileSize = filesize($filePath);
                    if($fileSize/1024 > 2048){
                        $manager = new ImageManager(new Driver());
                        // dd($manager);
                        $image = $manager->read('storage/' . $img);
                        $encoded = $image->toJpeg(40); // Intervention\Image\EncodedImage
                        $encoded->save($filePath);
                    }

                    $images[] = $img;
                }
                foreach ($images as $image) {
                    Foto::create([
                        'foto' => $image,
                        'product_id' => $id
                    ]);
                }
                // dd($images);
            }

            DB::commit();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Product Edited',
                    'data' => [
                        'id' => $id,
                        'nama_product' => $request->nama_product,
                        'harga' => $request->harga_tinggi,
                        'deskripsi' => $request->deskripsi,
                        'link_shopee' => $request->link_shopee,
                        'stok' => $request->stok,
                        'spesifikasi_product' => $request->spesifikasi_product,
                        'varian' => $request->varian,
                        'image' => $images,

                    ]

                ],
                200
            );
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
            // Find the product with its related photos and variants
            $data = Product::with(['fotos', 'varians'])->findOrFail($id);

            // Update the 'tersedia' column to false
            $data->update(['tersedia' => false]);

            if (!$data) {
                return response()->json(['success' => false, 'message' => 'Product not found'], 404);
            }
            return response()->json(['success' => true, 'message' => 'Product has been deleted']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong'], 404);
        }
    }
}
