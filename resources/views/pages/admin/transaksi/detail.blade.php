@extends('layout.admin_pages')
@section('title', 'Admin Transaksi')
@section('content')
    <div class="container  px-6 pb-6 mx-auto">
        <h1 class="text-2xl my-6 font-semibold text-gray-700 ">Detail Transaksi</h1>
        {{-- <p>{{$data}}</p> --}}
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
            <div class="col-span-3 ">
                <div class="bg-white rounded-3xl p-8">
                    <div class="mb-2">
                        <p class="text-sm text-gray-400">Pendapatan</p>
                        <div class="flex gap-4 justify-start items-center">
                            <div class="flex justify-start items-center gap-2">
                                <div class="w-8 h-8 flex justify-center items-center">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_443_3628)"> <rect x="2" y="6" width="20" height="12" stroke="#1f2937" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></rect> <path d="M22 10C21.4747 10 20.9546 9.89654 20.4693 9.69552C19.984 9.4945 19.543 9.19986 19.1716 8.82843C18.8001 8.45699 18.5055 8.01604 18.3045 7.53073C18.1035 7.04543 18 6.52529 18 6L22 6L22 10Z" stroke="#1f2937" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 18C18 16.9391 18.4214 15.9217 19.1716 15.1716C19.9217 14.4214 20.9391 14 22 14L22 18L18 18Z" stroke="#1f2937" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2 14C3.06087 14 4.07828 14.4214 4.82843 15.1716C5.57857 15.9217 6 16.9391 6 18L2 18L2 14Z" stroke="#1f2937" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 6C6 7.06087 5.57857 8.07828 4.82843 8.82843C4.07828 9.57857 3.06087 10 2 10L2 6H6Z" stroke="#1f2937" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14.0741 9.5H11.3333C10.597 9.5 10 10.0596 10 10.75C10 11.4404 10.597 12 11.3333 12H13.1111C13.8475 12 14.4444 12.5596 14.4444 13.25C14.4444 13.9404 13.8475 14.5 13.1111 14.5H10" stroke="#1f2937" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 9.51733V8.5" stroke="#1f2937" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 15.5173V14.5" stroke="#1f2937" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> <defs> <clipPath id="clip0_443_3628"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg>
                                </div>
                                <h1 class="text-2xl text-gray-800 font-semibold">Rp. {{ number_format($data->total_harga, 0, ',', '.') }}</h1>
                            </div>
                            @if ($data->is_complete == true)
                            <div class="bg-green-200 px-4 py-2 w-fit h-fit rounded-3xl flex justify-center items-center">
                                <span class="text-green-500 font-semibold">Selesai</span>
                            </div>
                            @elseif ($data->is_complete == false)
                            <div
                                class="bg-red-200 px-4 py-2 w-fit h-fit rounded-3xl flex justify-center items-center whitespace-nowrap">
                                <span class="text-red-500 font-semibold whitespace-nowrap">Belum Selesai</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="mb-2 mt-1">
                        <p class="text-sm text-gray-400">Tanggal</p>
                        <div class="flex justify-start items-center gap-2">
                            <div class="w-6 h-6 flex justify-center items-center">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7V12L14.5 10.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#1e293b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </div>
                            <h1 class="text-2xl text-gray-800 font-semibold">
                                {{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}
                            </h1>
                        </div>
                    </div>
                    <hr>
                    <p class="text-sm text-gray-400 mt-1">Product </p>
                    <div class="flex flex-col gap-2 mt-1">
                        <div class="grid grid-cols-5 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Nama Product</p>
                            <p class="text-base col-span-3 text-gray-800 font-medium">{{$data->products->nama_product}}</p>
                        </div>
                        <div class="grid grid-cols-5 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Methode Pembayaran</p>
                            <p class="text-base col-span-3 text-gray-800 font-medium">{{$data->methode_pembayaran->methode_pembayaran}}</p>
                        </div>
                        <div class="grid grid-cols-5 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Jumlah</p>
                            <p class="text-base col-span-3 text-gray-800 font-medium">{{$data->jumlah}}</p>
                        </div>
                        <div class="grid grid-cols-5 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Total Harga</p>
                            <p class="text-base col-span-3 text-gray-800 font-medium">Rp. {{ number_format($data->total_harga, 0, ',', '.') }}</p>
                        </div>
                        <div class="grid grid-cols-5 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Keterangan</p>
                            <p class="text-base col-span-3 text-gray-800 font-medium">{{$data->keterangan}}</p>
                        </div>
                        <div class="grid grid-cols-5 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Status</p>
                            @if ($data->is_complete == true)
                            <p class="text-base col-span-3 text-green-400 font-medium">Selesai</p>
                            @elseif ($data->is_complete == false)
                            <p class="text-base col-span-3 text-red-400 font-medium">Belum Selesai</p>
                            @endif
                        </div>
                        <div class="grid grid-cols-5 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Transaksi Preorder?</p>
                            @if ($data->is_Preorder == true)
                            <p class="text-base col-span-3 text-gray-800 font-medium">Ya</p>
                            @elseif ($data->is_Preorder == false)
                            <p class="text-base col-span-3 text-gray-800 font-medium">Tidak</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 flex flex-col gap-8">
                <div class="bg-white rounded-3xl p-8">
                    <p class="text-base text-gray-800 font-medium mb-2">Informasi Pembeli</p>
                    <hr>
                    <div class="flex flex-col gap-2 mt-1">
                        <div class="grid grid-cols-6 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Nama</p>
                            <p class="text-base col-span-4 text-gray-800 font-medium">{{$data->pembelis->nama}}</p>
                        </div>
                        <div class="grid grid-cols-6 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Email</p>
                            <p class="text-base col-span-4 text-gray-800 font-medium">{{$data->pembelis->email}}</p>
                        </div>
                        <div class="grid grid-cols-6 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">Alamat</p>
                            <p class="text-base col-span-4 text-gray-800 font-medium">{{$data->pembelis->alamat}}</p>
                        </div>
                        <div class="grid grid-cols-6 justify-start items-start">
                            <p class="text-base col-span-2 text-gray-500">No Hp</p>
                            <p class="text-base col-span-4 text-gray-800 font-medium">{{$data->pembelis->no_hp}}</p>
                        </div>
                    </div>
                </div>
                @if ($data->is_Preorder == true && $data->Preorder_id !=null)
                <div class="bg-white rounded-3xl p-8">
                    <p class="text-base text-gray-800 font-medium mb-2">Informasi Preorder</p>
                    <hr>
                    <div class="flex flex-col gap-2 mt-1">
                        <div class="grid grid-cols-2 justify-start items-start">
                            <p class="text-sm col-span-1 text-gray-500">DP</p>
                            <p class="text-base col-span-1 text-gray-800 font-medium">{{$data->preorders->down_payment}}</p>
                        </div>
                        <div class="grid grid-cols-2 justify-start items-start">
                            <p class="text-sm col-span-1 text-gray-500 whitespace-nowrap ">Tanggal Pembayaran DP</p>
                            <p class="text-base col-span-1 text-gray-800 font-medium">
                                {{ \Carbon\Carbon::parse($data->preorders->tanggal_pembayaran_down_payment)->format('d F Y') }}</p>
                        </div>
                        <div class="grid grid-cols-2 justify-start items-start">
                            <p class="text-sm col-span-1 text-gray-500 whitespace-nowrap">Kekurangan Harga</p>
                            <p class="text-base col-span-1 text-red-400 font-medium">{{$data->total_harga-$data->preorders->down_payment}}</p>
                        </div>
                       
                    </div>
                </div>
                @endif
            </div>
        </div>



    </div>
@endsection
