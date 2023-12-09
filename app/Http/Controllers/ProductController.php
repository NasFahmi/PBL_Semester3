<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Varian;
use App\Models\BeratJenis;
use App\Models\Foto;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Rules\BeratJenisValidationRule;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->search(request('search'))->get();
        return view('pages.admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.product.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); 
        $this->validate($request, [
            'nama_product' => 'required',
            'harga_rendah' => 'required',
            'harga_tinggi' => 'required',
            'deskripsi' => 'required',
            'link_shopee' => 'required',
            'stok' => 'required',
            'spesifikasi_product' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'beratjenis' => ['required'],
        ]);
        $data=$request->all();

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
            if (isset($data['$varian'])) {
               
                $varians= $data['varian'];

            foreach ($varians as $varian) {
                Varian::create([
                    'jenis_varian' => $varian,
                    'product_id' => $productID,
                ]);
            }
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

            $request->session()->forget(['product_data', 'berat_jenis', 'varian', 'image_data']);
            return redirect()->route('product.index')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            DB::rollBack();
            throw $e;
            // dd('gagal ');
            // Handle kesalahan sesuai kebutuhan Anda, misalnya:
            // return redirect()->back()->with('error', 'Gagal menyimpan data Product.');
        }

    }


    public function show($id)
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($id);
        $berat_jenis = $data->beratJenis;
        return view('pages.admin.product.detail', compact('data', 'berat_jenis'));
    }

    public function edit($id)
    {
        $data = Product::with(['fotos','varians', 'beratJenis'])->findOrFail($id);
        // dd($data);
        return view('pages.admin.product.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_product' => 'required',
            'harga_rendah' => 'required',
            'harga_tinggi' => 'required',
            'deskripsi' => 'required',
            'link_shopee' => 'required',
            'stok' => 'required',
            'spesifikasi_product' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Allow empty image updates
        ]);
    
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
    
            return redirect()->route('product.index')->with('success', 'Product has been updated successfully');
        } catch (\Exception $e) {
            // If there is an error, rollback the transaction
            DB::rollBack();
            // throw $e;
            // Handle the error as needed
            return redirect()->back()->with('error', 'Failed to update product data.');
        }
    }
    
    
    public function destroy(Product $product)
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($product->id);

        DB::beginTransaction();
        try {
            // Delete related records
            $data->fotos()->delete();
            $data->varians()->delete();
            $data->beratJenis()->delete();

            // Delete the data itself
            $data->delete();
            // Handle image deletion (if needed)
            if ($data->fotos) {
                foreach ($data->fotos as $foto) {
                    Storage::delete($foto['foto']);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            // If there is an error, rollback the transaction
            DB::rollBack();
            // throw $e;
            // Handle the error as needed
            return redirect()->back()->with('error', 'Failed to delete the product.');
        }

        return redirect()->route('product.index')->with('success', 'Product has been deleted successfully');
    }
}
