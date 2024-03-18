@extends('layout.pages')
@section('title', $data->nama_product)
@section('content')
    {{-- section 1 --}}
    <div class="bg-gray-50">
        {{-- bg asset('assets/images/background.png') --}}
        <div class="drawer mx-auto max-w-screen-xl">
            <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex flex-col">
                <!-- Navbar -->
                <div class="w-full lg:block flex items-center bg-transparent ">
                    <div class="flex-none lg:hidden">
                        <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </label>
                    </div>
                    <div class="flex items-center justify-between p-4">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="h-16 mr-2">
                            <a href="{{ route('landing_page') }}" class="text-black hover:text-red-600 font-semibold transition duration-300 transform hover:scale-105">PAWONKOE</a>
                        </div>
                        <div class="hidden lg:flex items-center space-x-4">
                            <a href="{{ url('/#tentang_kami') }}"
                                class="text-black hover:text-red-600 font-semibold transition duration-300 transform hover:scale-105">
                                Tentang Kami</a>
                            <a href="{{ url('/#perjalanan') }}"
                                class="text-black hover:text-red-600 font-semibold transition duration-300 transform hover:scale-105">
                                Perjalanan</a>
                            <a href="{{ url('/#visi-misi') }}"
                                class="text-black hover:text-red-600 font-semibold transition duration-300 transform hover:scale-105">
                                Visi Misi</a>
                            <a href="{{ route('katalog') }}"
                                class="text-black hover:text-red-600 font-semibold transition duration-300 transform hover:scale-105">
                                Katalog Produk</a>
                            <a href="{{ url('/#kontak') }}"
                                class="text-black hover:text-red-600 font-semibold transition duration-300 transform hover:scale-105">
                                Kontak</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="drawer-side  z-30">
                <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu p-4 w-80 min-h-full bg-base-200 z-20">
                    <!-- Sidebar content here -->
                    <a href="{{ url('/#tentang_kami') }}"
                        class="text-gray-900  hover:text-gray-800 font-semibold text-lg mb-8  duration-300">Tentang Kami</a>
                    <a href="{{ url('/#perjalanan') }}"
                        class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8  duration-300">Perjalanan</a>
                    <a href="{{ url('/#visi-misi') }}"
                        class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8  duration-300">Visi Misi</a>
                    <a href="{{ route('katalog') }}"
                        class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8  duration-300">Katalog
                        Produk</a>
                    <a href="{{ url('/#kontak') }}"
                        class="text-gray-900 hover:text-gray-800 font-semibold text-lg mb-8  duration-300">Kontak</a>
                </ul>
            </div>
        </div>
    </div>
    <div class=" px-4 md:px-20 w-full  justify-center items-center flex-col bg-white py-10">
        <div class="flex justify-center items-start gap-10 flex-col md:flex-row">
            <div id="default-carousel" class="relative w-full md:w-1/2 drop-shadow-xl" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @if ($data->fotos->count() > 1)
                        <!-- Gunakan carousel jika ada lebih dari satu foto -->
                        @foreach ($data->fotos as $index => $foto)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('storage/' . $foto->foto) }}"
                                    class="absolute z-10 block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover"
                                    alt="...">
                            </div>
                        @endforeach
                    @elseif ($data->fotos->count() === 1)
                        <!-- Tampilkan gambar langsung jika hanya ada satu foto -->
                        <div class="block w-full h-full">
                            <img src="{{ asset('storage/' . $data->fotos[0]->foto) }}" class="w-full h-full object-cover"
                                alt="...">
                        </div>
                    @else
                        <!-- Tambahkan placeholder atau pesan jika tidak ada foto -->
                        <div class="flex items-center justify-center w-full h-full">
                            <span class="text-gray-500">No photos available</span>
                        </div>
                    @endif
                </div>



                <!-- Slider controls -->
                @if ($data->fotos->count() > 1)
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>

                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                @endif
            </div>



            <div class="w-full md:w-1/2">
                <h1 class="text-3xl font-semibold mb-2">{{ $data->nama_product }}</h1>
                <h1 class="text-2xl font-semibold mb-1">Rp. {{ $data->harga }}</h1>
                <br>
                <p class="text-lg">{{ $data->deskripsi }}</p>
                <br>
                @if (count($data->varians)!= 0 )    
                <h1 class="font-semibold">Varian : </h1>
                @foreach ($data->varians as $varian)
                    <li class="text-lg">{{ $varian->jenis_varian }}</li>
                @endforeach
                <br>
                @endif
                <div class="mt-2">
                    <h1 class="text-2xl font-medium">Product Spesifikasi</h1>
                    <p class="text-lg">{!! nl2br(e($data->spesifikasi_product)) !!}</p>
                </div>
                <a href="{{ $data->link_shopee }}"
                    class="block w-full md:w-fit px-8 py-2 mt-4 text-sm font-medium text-center text-white transition-colors duration-150 bg-orange-500 border border-transparent rounded-lg active:bg-orange-600 hover:bg-orange-700 shadow-xl">
                    <div class="flex justify-center items-center ">
                        <img src="{{ asset('assets/images/shopee.png') }}" alt="Shopee Logo" class="w-8 h-8 mr-2">
                        <span>Shopee</span>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <div class="bg-gray-800 mt-20">
        <h1 class="text-2xl text-center font-semibold text-white mb-10 pt-10 lg:text-3xl">Temukan Kami</h1>
        <div class="mx-auto max-w-screen-lg flex justify-center items-start">
            <div
                class=" mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col   md:px-10 md:flex-row md:gap-8  lg:mt-0 lg:items-stretch gap-8">
                <div class="ml-4 lg:ml-0 md:w-full">
                    <div class=" md:w-full">
                        <h1 class="text-white text-xl md:text-lg mb-2">PAWONKOE</h1>
                        <h1 class="text-white text-base md:text-sm mb-4">PAWONKOE.BWI</h1>
                        <p class="text-white md:text-sm">Kami juga terus mengupdate informasi mengenai perusahaan melalui
                            media sosial, untuk informasi terkini anda dapat mengikuti media sosial kami.</p>
                    </div>
                    <div class="flex justify-start items-center mt-8 gap-2">
                        <div class="text-white w-6 h-6">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z"
                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <a href="https://maps.app.goo.gl/LRtRixYMKA1tiok46">
                            <p class="text-white">Banyuwangi, Jawa Timur</p>
                        </a>
                    </div>
                    <div class="flex justify-start items-center mt-4 gap-2">
                        <div class="shopee w-12 h-12">
                            <a href="https://shopee.co.id/pawonkoe_bwi">
                                <img src="{{asset('assets/images/sopi1.png')}}" alt="" srcset="">
                            </a>
                        </div>
                        <div class="instagram w-10 h-10">
                            <a href="https://www.instagram.com/pawonkoe.bwi_rambakcumi/">
                                <img src="{{asset('assets/images/ig-icon.png')}}" alt="" srcset="">
                            </a>
                        </div>
                        <div class="wa w-10 h-10">
                            <a href="https://wa.me/+6281316869287" target='_blank'>
                                <img src="{{asset('assets/images/whatsapp.png')}}" alt="" srcset="">
                            </a>
                        </div>
                        <div class="email w-12 h-12">
                            <a href="">
                                <img src="{{ asset('assets/images/gmail.png') }}" alt="" srcset="">
                            </a>
                        </div>
                        <div class="fb w-10 h-10">
                            <a href="https://www.facebook.com/pawonkoebanyuwangi">
                                <img src="{{asset('assets/images/facebook.png')}}" alt="" srcset="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 pr-10">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d761.0453252011717!2d114.14695737041085!3d-8.32120198595234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd15550498a1e55%3A0x616bafa860db82bb!2sProdusen%20Rambak%20Cumi%20dan%20aneka%20samval%20Pawon%20koe%20Banyuwangi!5e0!3m2!1sid!2sid!4v1700216465014!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="rounded-2xl w-[300px] h-[200px] lg:w-[380px] lg:h-[280px] ">
            </div>
            </iframe>
        </div>
    </div>
    <div class="bg-gray-900 flex justify-center items-center py-2 mt-20">
        <h1 class="text-white">@2023 PawonKoe. All right reserved</h1>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
@endsection
