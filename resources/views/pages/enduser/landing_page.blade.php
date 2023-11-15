@extends('layout.pages')
@section('title', 'PawonKoe')
@section('content')
    {{-- section 1 --}}
    <div class="bg-cover" style="background-image: url('{{ asset('assets/images/background.png') }}');">
        {{-- bg asset('assets/images/background.png') --}}
        <div class="drawer mx-auto max-w-screen-xl">
            <input id="my-drawer-3" type="checkbox" class="drawer-toggle" /> 
            <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="w-full lg:block flex items-center bg-transparant">
                <div class="flex-none lg:hidden">
                <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </label>
                </div> 
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="h-8 mr-2">
                        <a href="#Home" class="text-lg font-semibold text-gray-50">PAWONKOE</a>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="#tentang_kami" class="text-gray-50 hover:text-gray-200">Tentang Kami</a>
                        <a href="#perjalanan" class="text-gray-50 hover:text-gray-200">Perjalanan</a>
                        <a href="#produk" class="text-gray-50 hover:text-gray-200">Product Kami</a>
                        <a href="#kontak" class="text-gray-50 hover:text-gray-200">Kontak</a>
                    </div>
                </div>
            </div>
            <!-- Page content here -->
            <div class="px-10 md:px-20 mt-20 mb-60">
                <h1 class="text-lg md:text-3xl font-semibold mb-2 text-gray-50">Rasa Yang Menyatukan Kita</h1>
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <p class="test-sm md:text-base text-gray-50">Di PawonKoe, kami mengangkat kelezatan laut ke level yang sama sekali baru. Kami dengan bangga mempersembahkan snack yang benar-benar segar, 100% berasal dari lautan yang luas.</p>
                </div>
            </div>

            </div> 
            <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label> 
            <ul class="menu p-4 w-80 min-h-full bg-base-200">
                <!-- Sidebar content here -->
                <a href="#tentang_kami" class="text-gray-900  hover:text-gray-800 font-semibold text-lg mb-8">Tentang Kami</a>
                <a href="#perjalanan" class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8">Perjalanan</a>
                <a href="#produk" class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8">Product Kami</a>
                <a href="#kontak" class="text-gray-900 hover:text-gray-800 font-semibold text-lg mb-8">Kontak</a>
            </ul>
            </div>
        </div>
    </div>

    {{-- section 2 --}}
    <div id="tentang_kami" class=" mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col  md:mt-16 md:px-10 md:flex-row md:gap-8 lg:items-stretch">
        <div class="mb-10 md:w-1/2">
            <div class="lg:w-8/12">
                <h1 class="text-2xl font-semibold mb-4 pt-10">Tentang kami</h1>
                <p class="text-sm ">PAWONKOE Memulai usaha sejak maret 2021 Lokasi usaha
                    kami ada di desa sempu kabupaten Banyuwangi.
                    Berawal dari memproduksi aneka Sambal dan kini usaha kami
                    sudah berkembang dengan memproduksi aneka olahan dari
                    cumi seperti : Rambak baby cumi , rambak kulit cumi dan
                    sambal cumi kemangi. Produk kami bisa di dapat di market place atau
                    beberapa pusat oleh-oleh di banyuwangi.</p>
            </div>
        </div>
        <div class="w-10/12 md:w-1/2">
            <img src="{{asset('assets/images/tentang-kami.png')}}" alt="" srcset="">
        </div>
    </div>

@endsection
