@extends('layout.admin_pages')
@section('title', 'Create Product')
@section('content')
<div class="container  px-6 pb-6 mx-auto">
    <h1 class="text-2xl my-6 font-semibold text-gray-700 ">Create Product</h1>
    <div class="bg-white flex justify-center items-center px-8 py-8 shadow-lg rounded-3xl">

        <form action="{{route('product.store')}}" method="post" class="">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="left">
                    <div class="">
                        <label class="block text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-400">Nama Product</span>
                        </label>
                        <input type="text" placeholder="nama product" name="nama_product"
                            class="input input-bordered input-info bg-slate-50 w-full max-w-sm duration-50 mb-3" />
                    </div>
                    <div class="">
                        <label class="block text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-400">Harga</span>
                        </label>
                        <div class="grid grid-cols-2 justify-start items-center gap-4 max-w-sm mb-3">
                            <input type="number" placeholder="Rendah" name="harga_rendah"
                                class="input input-bordered input-info w-full bg-slate-50  duration-50 " />
                            <input type="number" placeholder="Tinggi" name="harga_tinggi"
                                class="input input-bordered input-info w-fulll bg-slate-50  duration-50 " />
                        </div>
                    </div>
                    <div class="">
                        <label class="block text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
                        </label>
                        <textarea class="textarea textarea-info w-full max-w-sm bg-slate-50"
                            placeholder="Deskripsi Product" name="deskripsi" rows="4"></textarea>
                    </div>

                    <div class="">
                        <label class="block text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-400 ">Link Shopee</span>
                        </label>
                        <input type="text" placeholder="Link Shopee" name="link_shopee"
                            class="input input-bordered input-info w-full max-w-sm duration-50 bg-slate-50  mb-3" />
                    </div>
                    <div class="">
                        <label class="block text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-400">Stok</span>
                        </label>
                        <input type="number" placeholder="Jumlah Stok" name="stok"
                            class="input input-bordered input-info w-full max-w-sm duration-50 bg-slate-50 mb-3" />
                    </div>
                    <div class="">
                        <label class="block text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-400">Spesifikasi Product</span>
                        </label>
                        <textarea class="textarea textarea-info w-full max-w-sm bg-slate-50"
                            placeholder="Spesifikasi Product" name="spesifikasi_product" rows="4"></textarea>
                    </div>

                </div>
                <div class="right">
                    <div class="">
                        <label class="block text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-400">Berat Jenis Product</span>
                        </label>
                        <ul
                            class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white mb-3">
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="kecil" type="checkbox" value="Kecil" name="beratjenis[0]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="kecil"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kecil</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="Sedang" type="checkbox" value="Sedang" name="beratjenis[1]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="Sedang"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sedang</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="Besar" type="checkbox" value="Besar" name="beratjenis[2]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="Besar"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Besar</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="Sangat Besar" type="checkbox" value="Sangat Besar" name="beratjenis[3]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="Sangat Besar"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sangat
                                        Besar</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="">
                        <label class="block text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-400">Varian Product</span>
                        </label>
                    </div>
                    <div id="form-container">
                        <!-- Formulir input awal -->
                        <div class="form-group flex justify-center items-center gap-2">

                        </div>
                    </div>

                    <button type="button" onclick="addInput()" class="text-green-400">Tambah Varian</button>
                </div>
            </div>
            <div class="flex justify-center items-center mt-3">
                <button type="submit"
                    class="text-center focus:outline-none text-white w-full md:w-fit bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 me-2 mb duration-300 whitespace-nowrap">Next</button>
            </div>
        </form>
    </div>
</div>
<script>
    let variantcount = 1;
        function addInput() {
            var formContainer = document.getElementById('form-container');
            var newFormGroup = document.createElement('div');
            newFormGroup.className = 'form-group';
            newFormGroup.innerHTML = ' <div class="form-group flex justify-center items-center gap-2">' +
                '<input type="text" name="varian[' + variantcount + ']" placeholder="Varian ' + variantcount + '" ' +
                'class="input input-bordered input-info w-full max-w-sm duration-50 bg-slate-50  mb-3" />' +
                '<div class="w-8 h-8 cursor-pointer" onclick="removeInput(this)" >' +
                '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                '<g id="SVGRepo_bgCarrier" stroke-width="0"></g>' +
                '<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>' +
                '<g id="SVGRepo_iconCarrier"> <circle cx="12" cy="12" r="10" stroke="#e21818" stroke-width="1.5"></circle>' +
                '<path d="M15 12H9" stroke="#e21818" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>' +
                '</div>' +
                '</div>';
            formContainer.appendChild(newFormGroup);
            variantcount++;
        }
        
        function removeInput(element) {
            var formGroup = element.parentElement;
            formGroup.parentNode.removeChild(formGroup);
        }
</script>

@endsection