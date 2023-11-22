<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body class="bg-light">
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="width: 500px; height: 500px;">
            <h2 class="text-center my-4">Add Product</h2>
            <form action=" {{ route('product.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="namaproduk">Nama Produk</label>
                    <input type="text" class="form-control" placeholder="Nama Produk" id="namaproduk"
                        name="nama_product" required>
                </div>
                <div class="form-group mt-3">
                    <label for="hargarendah">Harga Rendah</label>
                    <input type="number" class="form-control" placeholder="Harga Produk" id="hargaproduk"
                        name="harga_rendah" required>
                </div>
                <div class="form-group mt-3">
                    <label for="hargatinggi">Harga Tinggi</label>
                    <input type="number" class="form-control" placeholder="Harga Produk" id="hargaproduk"
                        name="harga_tinggi" required>
                </div>
                <div class="form-group mt-3">
                    <label for="deskproduk">Deskripsi</label>
                    <input type="text" class="form-control" placeholder="Deskripsi" id="deskproduk" name="deskripsi"
                        required>
                </div>
                <div class="form-group mt-3">
                    <label for="link_shopee">Link Shopee</label>
                    <input type="text" class="form-control" placeholder="Link Shopee" id="link_shopee"
                        name="link_shopee" required>
                </div>
                <div class="form-group mt-3">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" placeholder="Stok" id="stok" name="stok"
                        required>
                </div>
                <div class="form-group mt-3">
                    <label for="spesifikasi_product">Spesifikasi Product</label>
                    <input type="text" class="form-control" placeholder="spesifikasi_product"
                        id="spesifikasi_product" name="spesifikasi_product" required>
                </div>
                <div class="form-group mt-3">
                    <label for="berat_jenis">Berat Jenis</label>
                    <input type="text" class="form-control" placeholder="berat_jenis" id="berat_jenis"
                        name="berat_jenis" required>
                </div>
                <div class="form-group mt-3">
                    <label for="varian">Varian</label>
                    <input type="text" class="form-control" placeholder="varian" id="varian" name="varian"
                        required>
                </div>
                <a href="{{ route('') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add
                </a>
                {{-- <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary">Tambah Product</button>
                </div> --}}
            </form>
        </div>
    </div>

</body>

</html>
