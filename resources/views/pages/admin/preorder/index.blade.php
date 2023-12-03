@extends('layout.admin_pages')
@section('title','Admin Preorder')
@section('content')
<div class="container px-6 pb-6 mx-auto ">
    <p class="text-2xl my-6 font-semibold text-gray-700">Transaksi Preorder</p>

    <div
            class="bg-white w-full px-8 py-4 shadow-md rounded-3xl mb-4 flex justify-start items-center max-w-screen-xl lg:w-full">
            <div class="flex justify-start items-start md:items-center flex-col gap-4 w-full lg:flex-row ">
                <form class="flex items-center w-full lg:w-1/2" action="" method="GET">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M12 19L12 11" stroke="#6b7280" stroke-width="4" stroke-linecap="round"></path>
                                    <path d="M7 19L7 15" stroke="#6b7280" stroke-width="4" stroke-linecap="round"></path>
                                    <path d="M17 19V6" stroke="#6b7280" stroke-width="4" stroke-linecap="round"></path>
                                </g>
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari Product atau Pembeli" required>
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>

                <a href="{{ route('preorder.create') }}"
                    class="bg-sky-200 px-4 w-full md:w-fit py-2 rounded-3xl flex justify-center items-center gap-1 ">
                    <div class="w-4 h-4">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M6 12H18M12 6V18" stroke="#0284c7" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <span class="font-semibold text-sky-600 text-sm">Tambah Preorder</span>
                </a>

            </div>
        </div>

    <div class="grid grid-cols-3 gap-8">
        <div class="flex justify-start items-start flex-col col-span-2 gap-4">
            {{-- card --}}
            {{-- {{$data->id}} --}}
            @foreach ($data as $preorder)
                <div class="w-full bg-white flex items-start justify-between p-8 rounded-3xl shadow-lg">
                    <div class="kiri">
                        <p class="text-xl font-medium text-gray-800 mb-1">{{$preorder->pembelis->nama}}</p>
                        <div class="grid grid-cols-2 gap-4 mb-1">
                            <p class=" text-gray-400">Product</p>
                            <p class="font-medium text-gray-800">: {{$preorder->products->nama_product}}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-1">
                            <p class=" text-gray-400">Jumlah</p>
                            <p class="font-medium text-gray-800">: {{$preorder->jumlah}}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-1">
                            <p class=" text-gray-400">Total Harga</p>
                            <p class="font-medium text-gray-800">: {{$preorder->total_harga}}</p>
                        </div>
                        @if ($preorder->preorders->is_DP==true)
                            <div class="grid grid-cols-2 gap-4 mb-1">
                                <p class=" text-gray-400">Status</p>
                                <p class="font-medium text-gray-800">: Sudah DP</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-1">
                                <p class="text-gray-400">DP Sebesar </p>
                                <p class="font-medium text-gray-800">: Rp. 500.000</p>
                            </div>
                        @elseif ($preorder->preorders->is_DP==false)
                            <div class="grid grid-cols-2 gap-4 mb-1">
                                <p class="font-medium text-gray-800">: Belum DP</p>
                            </div>

                        @endif
                    </div>
                    <div class="kanan flex justify-center items-center gap-4">
                            <a href="{{route('preorder.show',$preorder->id)}}" class="flex justify-center items-center gap-1 cursor-pointer ">
                                <div class="w-4 h-4 ">
                                    <svg viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                            stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M9.75 12C9.75 10.7574 10.7574 9.75 12 9.75C13.2426 9.75 14.25 10.7574 14.25 12C14.25 13.2426 13.2426 14.25 12 14.25C10.7574 14.25 9.75 13.2426 9.75 12Z"
                                                fill="#0ea5e9"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 12C2 13.6394 2.42496 14.1915 3.27489 15.2957C4.97196 17.5004 7.81811 20 12 20C16.1819 20 19.028 17.5004 20.7251 15.2957C21.575 14.1915 22 13.6394 22 12C22 10.3606 21.575 9.80853 20.7251 8.70433C19.028 6.49956 16.1819 4 12 4C7.81811 4 4.97196 6.49956 3.27489 8.70433C2.42496 9.80853 2 10.3606 2 12ZM12 8.25C9.92893 8.25 8.25 9.92893 8.25 12C8.25 14.0711 9.92893 15.75 12 15.75C14.0711 15.75 15.75 14.0711 15.75 12C15.75 9.92893 14.0711 8.25 12 8.25Z"
                                                fill="#0ea5e9"></path>
                                        </g>
                                    </svg>
                                </div>
                                <p class="text-sm text-sky-500 font-medium ">Details</p>
                            </a>
                        <a href="{{route('preorder.edit',$preorder->id)}}" class="flex justify-center items-center gap-1 cursor-pointer">
                            <div class="w-4 h-4 ">
                                <svg viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                        stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M11.4001 18.1612L11.4001 18.1612L18.796 10.7653C17.7894 10.3464 16.5972 9.6582 15.4697 8.53068C14.342 7.40298 13.6537 6.21058 13.2348 5.2039L5.83882 12.5999L5.83879 12.5999C5.26166 13.1771 4.97307 13.4657 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L7.47918 20.5844C8.25351 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5343 19.0269 10.823 18.7383 11.4001 18.1612Z"
                                            fill="#4ade80"></path>
                                        <path
                                            d="M20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178L14.3999 4.03882C14.4121 4.0755 14.4246 4.11268 14.4377 4.15035C14.7628 5.0875 15.3763 6.31601 16.5303 7.47002C17.6843 8.62403 18.9128 9.23749 19.85 9.56262C19.8875 9.57563 19.9245 9.58817 19.961 9.60026L20.8482 8.71306Z"
                                            fill="#4ade80"></path>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm text-lime-500 font-medium">Edit</p>
                        </a>
                        {{-- delete --}}
                        <form action="{{route('preorder.destroy',$preorder->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="flex justify-center items-center gap-1 cursor-pointer">
                                <div class="w-4 h-4">
                                    <svg viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                            stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M2.75 6.16667C2.75 5.70644 3.09538 5.33335 3.52143 5.33335L6.18567 5.3329C6.71502 5.31841 7.18202 4.95482 7.36214 4.41691C7.36688 4.40277 7.37232 4.38532 7.39185 4.32203L7.50665 3.94993C7.5769 3.72179 7.6381 3.52303 7.72375 3.34536C8.06209 2.64349 8.68808 2.1561 9.41147 2.03132C9.59457 1.99973 9.78848 1.99987 10.0111 2.00002H13.4891C13.7117 1.99987 13.9056 1.99973 14.0887 2.03132C14.8121 2.1561 15.4381 2.64349 15.7764 3.34536C15.8621 3.52303 15.9233 3.72179 15.9935 3.94993L16.1083 4.32203C16.1279 4.38532 16.1333 4.40277 16.138 4.41691C16.3182 4.95482 16.8778 5.31886 17.4071 5.33335H19.9786C20.4046 5.33335 20.75 5.70644 20.75 6.16667C20.75 6.62691 20.4046 7 19.9786 7H3.52143C3.09538 7 2.75 6.62691 2.75 6.16667Z"
                                                fill="#f87171"></path>
                                            <path
                                                d="M11.6068 21.9998H12.3937C15.1012 21.9998 16.4549 21.9998 17.3351 21.1366C18.2153 20.2734 18.3054 18.8575 18.4855 16.0256L18.745 11.945C18.8427 10.4085 18.8916 9.6402 18.45 9.15335C18.0084 8.6665 17.2628 8.6665 15.7714 8.6665H8.22905C6.73771 8.6665 5.99204 8.6665 5.55047 9.15335C5.10891 9.6402 5.15777 10.4085 5.25549 11.945L5.515 16.0256C5.6951 18.8575 5.78515 20.2734 6.66534 21.1366C7.54553 21.9998 8.89927 21.9998 11.6068 21.9998Z"
                                                fill="#f87171"></path>
                                        </g>
                                    </svg>
                                </div>
                                <button type="submit" class="text-sm text-red-500 font-medium">Delete</button>
                            </a>
                        </form>

                    </div>
                </div>    
            @endforeach
            
           
            
        </div>
        {{-- informasi --}}
        <div class= "h-fit bg-white col-span-1 rounded-3xl shadow-lg p-8">
            <p class="text-gray-500 mb-2 font-medium">Informasi</p>
            <div class="mb-2">
                <p class="text-gray-600 text-sm">Total Preorder</p>
                <p class="text-gray-800 text-xl font-medium ">20</p>    
            </div>
            <div class="mb-2">
                <p class="text-gray-600 text-sm">Jumlah Preorder DP</p>
                <p class="text-gray-800 text-xl font-medium ">5</p>
            </div>
            <div class="mb-2">
                <p class="text-gray-600 text-sm">Jumlah Preorder Belum DP</p>
                <p class="text-gray-800 text-xl font-medium ">15</p>
            </div>
            <div class="mb-2">
                <p class="text-gray-600 text-sm">Total Saldo Preorder Terbayar</p>
                <p class="text-gray-800 text-xl font-medium ">Rp. 250.000</p>
                <p class="text-xs italic text-gray-400">(Total dari Preorder yang Sudah Membayar DP)</p>
            </div>
            <div class="">
                <p class="text-gray-600 text-sm">Total Saldo Perorder Belum Terbayar</p>
                <p class="text-gray-800 text-xl font-medium ">Rp. 750.000</p>
                <p class="text-xs italic text-gray-400">(Total Saldo yang Masih Dibutuhkan dari Transaksi Preorder yang Belum Lunas)</p>
            </div>
        </div>

    </div>
</div>
@endsection