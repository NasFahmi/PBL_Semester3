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


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->get();
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
    public function store(StoreProductRequest $request)
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
        ]);
        $request->session()->put('product_data', [
            'nama_product' => $request->input('nama_product'),
            'harga_rendah' => $request->input('harga_rendah'),
            'harga_tinggi' => $request->input('harga_tinggi'),
            'deskripsi' => $request->input('deskripsi'),
            'link_shopee' => $request->input('link_shopee'),
            'stok' => $request->input('stok'),
            'spesifikasi_product' => $request->input('spesifikasi_product'),
        ]);
        $request->session()->put('berat_jenis', $request->beratjenis);
        $request->session()->put('varian', $request->varian);
        return redirect()->route('product.storeImage'); //! go to file upload

    }

    public function viewstoreImage()
    {
        return view('pages.admin.product.store_image');
    }

    public function finalStore(Request $request)
    {

        $request->validate([
            'image.*' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
        ], [
            'image.*.required' => 'Setiap gambar harus dipilih.',
            'image.*.image' => 'File yang dipilih harus berupa gambar.',
            'image.*.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'image.*.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        try {
            DB::beginTransaction();
            $productData = $request->session()->get('product_data');
            $product = Product::create($productData);
            $productID = $product->id;

            $varians = $request->session()->get('varian');

            foreach ($varians as $varian) {
                Varian::create([
                    'jenis_varian' => $varian,
                    'product_id' => $productID,
                ]);
            }

            $beratJenis = $request->session()->get('berat_jenis');

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



    public function viewDetail($id)
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($id);
        $berat_jenis = $data->beratJenis;
        return view('pages.admin.product.detail', compact('data', 'berat_jenis'));
    }

    public function edit($id)
    {
        $data = Product::with(['varians', 'beratJenis'])->findOrFail($id);
        $berat_jenis = $data->beratJenis;
        return view('pages.admin.product.edit', compact('data', 'berat_jenis'));
    }

    public function updatePost(Request $request, $id)
    {

        // dd($request->all());

        $dataID = $id;
        $request->session()->put('product_data', [
            'nama_product' => $request->input('nama_product'),
            'harga_rendah' => $request->input('harga_rendah'),
            'harga_tinggi' => $request->input('harga_tinggi'),
            'deskripsi' => $request->input('deskripsi'),
            'link_shopee' => $request->input('link_shopee'),
            'stok' => $request->input('stok'),
            'spesifikasi_product' => $request->input('spesifikasi_product'),
        ]);
        $request->session()->put('product_id', $dataID);
        $request->session()->put('berat_jenis', $request->beratjenis);
        // $request->session()->put('varian', $request->varian);
        // dd(session()->all());
        // dd(session()->all());

        return redirect()->route('product.editImage');
    }

    public function viewUpdateImage()
    {
        $product_id = session()->get('product_id');
        // dd($product_id);
        $fotos = Foto::where('product_id', $product_id)->get();
        return view('pages.admin.product.update_image', compact('product_id', 'fotos'));
    }

    public function update(Request $request, $id)
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($id);
        $product = session()->get('product_data');
        $berat_jenis = session()->get('berat_jenis');
        $varian = session()->get('varian');
        // dd($data->beratJenis);
        DB::beginTransaction();
        try {
            // Update product data
            $data->update([
                'nama_product' => $product['nama_product'],
                'harga_rendah' => $product['harga_rendah'],
                'harga_tinggi' => $product['harga_tinggi'],
                'deskripsi' => $product['deskripsi'],
                'link_shopee' => $product['link_shopee'],
                'stok' => $product['stok'],
                'spesifikasi_product' => $product['spesifikasi_product'],
            ]);

            // Update related records
            $product->beratJenis->update([
                'berat_jenis' => $berat_jenis['berat_jenis'],
            ]);

            $product->varians->update([
                'varian' => $varian['varian'],
            ]);

            // Handle image update (if needed)
            if ($request->hasFile('image')) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                // Delete existing image (if exists)
                Storage::delete('images/product/' . $product->foto->image);

                // Upload and update new image
                $extension = $request->file('image')->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = $request->file('image')->storeAs('images/product', $filename);

                $product->foto()->update([
                    'image' => $filename,
                ]);
            }
            // dd('test');

            DB::commit();
        } catch (\Exception $e) {
            // If there is an error, rollback the transaction
            DB::rollBack();

            // Handle the error as needed
            return redirect()->back()->with('error', 'Failed to update product data.');
        }

        return redirect()->route('product.index')->with('success', 'Product has been updated successfully');
    }
    public function destroy(Product $product)
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($product->id);
        $photos = $data->fotos;
        // foreach ($photos as $photo) {
        //     dd($photo);
        // }
        // dd($data->fotos->image);
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
                    Storage::delete('images/' . $foto->image);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            // If there is an error, rollback the transaction
            DB::rollBack();

            // Handle the error as needed
            return redirect()->back()->with('error', 'Failed to delete the product.');
        }

        return redirect()->route('product.index')->with('success', 'Product has been deleted successfully');
    }
}
