@extends('layout.pages')
@section('title','Katalog Produk')
@section('content')
<div class="relative bg-no-repeat bg-cover " style="background-image: url('{{ asset('assets/images/bg-katalog.jpg') }}');">
    <!-- Overlay for darkening the background -->
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="absolute top-0 bg-gray-50 h-16 w-screen opacity-90"></div>
    
    <div class="drawer mx-auto max-w-screen-xl">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" /> 
        <div class="drawer-content flex flex-col">
        <!-- Navbar -->
        <div class="w-full lg:block flex items-center bg-transparent ">
            <div class="flex-none lg:hidden">
                <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </label>
            </div> 
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="h-8 mr-2">
                    <a href="{{route('landing_page')}}" class="text-lg font-semibold text-gray-700">PAWONKOE</a>
                </div>
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="{{ url('/#tentang_kami') }}" class="text-gray-700 hover:text-gray-900  duration-300 font-medium">Tentang Kami</a>
                    <a href="{{ url('/#perjalanan') }}" class="text-gray-700 hover:text-gray-900  duration-300 font-medium">Perjalanan</a>
                    <a href="{{ url('/#visi-misi') }}" class="text-gray-700 hover:text-gray-900  duration-300 font-medium">Visi Misi</a>
                    <a href="{{route('katalog')}}" class="text-gray-700 hover:text-gray-900  duration-300 font-medium">Katalog Produk</a>
                    <a href="{{ url('/#kontak') }}" class="text-gray-700 hover:text-gray-900  duration-300 font-medium">Kontak</a>
                </div>
            </div>
        </div>
        <!-- Page content here -->
        <div class="px-10 md:px-20 mt-28 mb-60">
            <h1 class="text-3xl text-center md:text-3xl font-bold mb-2 text-gray-50">Selamat Datang di Katalog Produk</h1>
        </div>

        </div> 
        <div class="drawer-side">
        <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label> 
        <ul class="menu p-4 w-80 min-h-full bg-base-200">
            <!-- Sidebar content here -->
            <a href="{{ url('/#tentang_kami') }}" class="text-gray-900  hover:text-gray-800 font-semibold text-lg mb-8  duration-300">Tentang Kami</a>
            <a href="{{ url('/#perjalanan') }}" class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8  duration-300">Perjalanan</a>
            <a href="{{ url('/#visi-misi') }}" class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8  duration-300">Visi Misi</a>
            <a href="{{route('katalog')}}" class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8  duration-300">Katalog Produk</a>
            <a href="{{ url('/#kontak') }}" class="text-gray-900 hover:text-gray-800 font-semibold text-lg mb-8  duration-300">Kontak</a>
        </ul>
        </div>
    </div>
</div>
<div class=" mx-auto max-w-screen-xl px-4 md:mt-20 md:px-10 flex justify-center items-center flex-col ">
    <h1 class="text-3xl font-semibold text-center mb-10">Produk Kami</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-center items-center">
        <div class="card card-compact w-full md:w-60 h-96  bg-base-100 shadow-xl">
            <figure  class="w-full h-96"><img src="{{asset('assets/images/product/crispy savour.jpg')}}" alt="Shoes" class="h-full"/></figure>
            <div class="card-body">
              <h2 class="card-title">Shoes!</h2>
              <p>If a dog chews shoes whose shoes does he choose?</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
              </div>
            </div>
        </div>

        <div class="card card-compact w-full md:w-60 h-96  bg-base-100 shadow-xl">
            <figure  class="w-full h-96"><img src="{{asset('assets/images/product/rambak.jpg')}}" alt="Shoes" class="h-full"/></figure>
            <div class="card-body">
              <h2 class="card-title">Shoes!</h2>
              <p>If a dog chews shoes whose shoes does he choose?</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
              </div>
            </div>
        </div>

        <div class="card card-compact w-full md:w-60 h-96  bg-base-100 shadow-xl">
            <figure  class="w-full h-96"><img src="{{asset('assets/images/product/sambel.jpg')}}" alt="Shoes" class="h-full"/></figure>
            <div class="card-body">
              <h2 class="card-title">Shoes!</h2>
              <p>If a dog chews shoes whose shoes does he choose?</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
              </div>
            </div>
        </div>

        <div class="card card-compact w-full md:w-60 h-96  bg-base-100 shadow-xl">
            <figure  class="w-full h-96"><img src="{{asset('assets/images/product/squidy_crackers.jpg')}}" alt="Shoes" class="h-full"/></figure>
            <div class="card-body">
              <h2 class="card-title">Shoes!</h2>
              <p>If a dog chews shoes whose shoes does he choose?</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
