@extends('layout.admin_pages')
@section('title', 'Admin Transaksi')
@section('content')
    <div class="container  px-6 pb-6 mx-auto">
        <h1 class="text-2xl my-6 font-semibold text-gray-700 ">Edit Transaksi</h1>
        {{-- <p>{{$dataTransaksi}}</p> --}}
        <div class="bg-white px-8 py-8 shadow-lg rounded-3xl">
            <form action="{{route('transaksi.update',$dataTransaksi->id)}}" method="post">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <div class="left">
                        <div class="max-w-lg">
                            <label for="" class="">Product</label>
                            <div class="flex justify-start items-start flex-col gap-3">

                                <div class="w-full">
                                    <label for="product" class="text-sm font-medium text-gray-800">Product</label>
                                    {{-- {{$data}} --}}
                                    <select id="product" name="product"
                                        class="bg-gray-50 border max-w-4xl border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($data as $product)
                                            <option value="{{$product->id}}" {{$product->id == $dataTransaksi->product_id ? 'selected':''}}>{{$product->nama_product}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="methode_pembayaran"
                                        class="block mb-2 text-sm font-medium  text-gray-800 ">Methode Pembayaran</label>
                                        {{-- <p>{{$dataTransaksi->methode_pembayaran_id}}</p> --}}
                                        <select id="methode_pembayaran" name="methode_pembayaran"
                                        class="bg-gray-50 border max-w-4xl border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="1" {{ $dataTransaksi->methode_pembayaran_id == 1 ? 'selected' : '' }}>Transfer</option>
                                        <option value="2" {{ $dataTransaksi->methode_pembayaran_id == 2 ? 'selected' : '' }}>Shopee</option>
                                        <option value="3" {{ $dataTransaksi->methode_pembayaran_id == 3 ? 'selected' : '' }}>Offline</option>
                                        <option value="4" {{ $dataTransaksi->methode_pembayaran_id == 4 ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    
                                </div>
                                <div class="w-full">
                                    <label for="jumlah"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                                    <input type="number" id="jumlah" name="jumlah"
                                        class="bg-gray-50 border max-w-4xl border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" required
                                        value="{{$dataTransaksi->jumlah}}"
                                        >

                                </div>
                                <div class="w-full">
                                    <p class="text-sm font-medium text-gray-800">Total Harga</p>
                                    <div class="relative mb-6">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <p>Rp.</p>
                                        </div>
                                        <input type="text" name="total" id="total-harga"
                                        class="max-w-4xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0"
                                        value="{{ number_format($dataTransaksi->total_harga, 0, ',', '.') }}"
                                        >
                                    </div>
                                </div>
                                <div class="w-full">
                                    <p>Status</p>
                                    @if ($dataTransaksi->is_complete == true)
                                    <div class="flex items-center mb-4">
                                        <input checked id="radio-btn-1" type="radio" value="1" name="is_complete"
                                            class="w-4 h-4  text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                                        <label for="radio-btn-1"
                                            class="ms-2 text-sm font-medium text-gray-900 ">Selesai</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="radio-btn-2" type="radio" value="0" name="is_complete"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                                        <label for="radio-btn-2" class="ms-2 text-sm font-medium text-gray-900 ">Belum
                                            Selesai</label>
                                    </div>
                                        @elseif ($dataTransaksi->is_complete == false)
                                        <div class="flex items-center mb-4">
                                            <input  id="radio-btn-1" type="radio" value="1" name="is_complete"
                                                class="w-4 h-4  text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                                            <label for="radio-btn-1"
                                                class="ms-2 text-sm font-medium text-gray-900 ">Selesai</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input checked id="radio-btn-2" type="radio" value="0" name="is_complete"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                                            <label for="radio-btn-2" class="ms-2 text-sm font-medium text-gray-900 ">Belum
                                                Selesai</label>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="max-w-lg">
                            <Label>Pembeli</Label>
                            <div class="flex justify-start items-start flex-col gap-3">
                                <div class="w-full">
                                    <label for="nama" class="text-sm font-medium text-gray-800">Nama</label>
                                    <input type="text" id="nama" name="nama"
                                        class="  w-full max-w-4xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Nama Pembeli"
                                        value="{{$dataTransaksi->pembelis->nama}}"
                                        >
                                </div>
                                <div class="w-full">
                                    <label for="email" class="text-sm font-medium text-gray-800">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="  w-full max-w-4xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="pembeli@pembeli.com"
                                        value="{{$dataTransaksi->pembelis->email}}"
                                        >
                                </div>
                                <div class="w-full">
                                    <label for="alamat" class="text-sm font-medium text-gray-800">Alamat</label>
                                    <input type="text" id="alamat" name="alamat"
                                        class="  w-full max-w-4xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukkan alamat Anda"
                                        value="{{$dataTransaksi->pembelis->alamat}}"
                                        >
                                </div>
                                <div class="w-full">
                                    <label for="telepon" class="text-sm font-medium text-gray-800">Telepon</label>
                                    <input type="tel" id="telepon" name="telepon"
                                        class="  w-full max-w-4xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="081234567890"
                                        value="{{$dataTransaksi->pembelis->no_hp}}"
                                        >
                                </div>
                                <div class="w-full">
                                    <label for="" class="text-sm font-medium text-gray-800">Keterangan</label>
                                    <textarea class="w-full max-w-4xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Keterangan" name="keterangan"
                                        rows="5">{{$dataTransaksi->keterangan}}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex justify-center items-center mt-8">
                    <button type="submit" class="bg-green-400 text-gray-100 px-4 py-2 w-full lg:w-fit rounded-lg hover:bg-green-500 duration-300">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        /* Tanpa Rupiah */
    let total_harga = document.getElementById('total-harga');
    total_harga.addEventListener('keyup', function(e)
    {
        total_harga.value = formatRupiah(this.value);
    });
    
    
    /* Fungsi */
    function formatRupiah(angka,prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    </script>
@endsection
