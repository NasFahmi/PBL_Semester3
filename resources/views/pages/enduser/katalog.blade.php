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
{{-- <p>{{$data}}</p> --}}
<div class=" mx-auto max-w-screen-xl px-4 mt-20 md:px-10 flex justify-center items-center flex-col ">
    <h1 class="text-3xl font-semibold text-center mb-10">Produk Kami</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-center items-center">
        @foreach ($data as $items)     
        <div class="card card-compact w-full md:w-60 h-96  bg-base-100 shadow-xl">
            <figure  class="w-full h-96">
                <img src="{{ asset('assets/images/product/'.$items->fotos->first()->foto) }}" alt="Shoes" class="h-auto w-full"/>
            </figure>
            <div class="card-body">
              <h2 class="card-title">{{$items->nama_product}}</h2>
              <p class="line-clamp-2">{{$items->deskripsi}}</p>
              <div class="flex justify-between items-start md:items-center flex-col md:flex-row md:mt-4">
                <p class="text-start text-lg font-semibold mb-2 md:mb-0">Rp. {{ number_format($items->harga_rendah, 0, ',', '.') }}</p>
                  <div class="card-actions justify-end w-full md:w-auto">
                    <a href="{{route('detail_product',$items->id)}}" class="btn btn-primary w-full md:w-auto">Details</a>
                  </div>
              </div>
            </div>
        </div>
        @endforeach
{{-- 
        <div class="card card-compact w-full md:w-60 h-96  bg-base-100 shadow-xl">
            <figure  class="w-full h-96"><img src="{{asset('assets/images/product/rambak.jpg')}}" alt="Shoes" class="h-auto w-full"/></figure>
            <div class="card-body">
              <h2 class="card-title">Shoes!</h2>
              <p>If a dog chews shoes whose shoes does he choose?</p>
              <div class="flex justify-between items-start md:items-center flex-col md:flex-row md:mt-4">
                <p class="text-start text-lg font-semibold mb-2 md:mb-0">Rp 15.000</p>
                  <div class="card-actions justify-end w-full md:w-auto">
                    <a href="" class="btn btn-primary w-full md:w-auto">Details</a>
                  </div>
              </div>
            </div>
        </div>

        <div class="card card-compact w-full md:w-60 h-96  bg-base-100 shadow-xl">
            <figure  class="w-full h-96"><img src="{{asset('assets/images/product/sambel.jpg')}}" alt="Shoes" class="h-auto w-full"/></figure>
            <div class="card-body">
              <h2 class="card-title">Shoes!</h2>
              <p>If a dog chews shoes whose shoes does he choose?</p>
              <div class="flex justify-between items-start md:items-center flex-col md:flex-row md:mt-4">
                <p class="text-start text-lg font-semibold mb-2 md:mb-0">Rp 15.000</p>
                <div class="card-actions justify-end w-full md:w-auto">
                    <a href="" class="btn btn-primary w-full md:w-auto">Details</a>
                </div>
              </div>
            </div>
        </div>

        <div class="card card-compact w-full md:w-60 h-96  bg-base-100 shadow-xl">
            <figure  class="w-full h-96"><img src="{{asset('assets/images/product/squidy_crackers.jpg savour.jpg')}}" alt="Shoes" class="h-auto w-full"/></figure>
            <div class="card-body">
              <h2 class="card-title">Shoes!</h2>
              <p>If a dog chews shoes whose shoes does he choose?</p>
              <div class="flex justify-between items-start md:items-center flex-col md:flex-row md:mt-4">
                <p class="text-start text-lg font-semibold mb-2 md:mb-0">Rp 15.000</p>
                  <div class="card-actions justify-end w-full md:w-auto">
                    <a href="" class="btn btn-primary w-full md:w-auto">Details</a>
                  </div>
              </div>
            </div>
        </div> --}}
    </div>
</div>
<div class="bg-gray-800 mt-20">
    <h1 class="text-2xl text-center font-semibold text-white mb-10 pt-10 lg:text-3xl">Temukan Kami</h1>
    <div class="mx-auto max-w-screen-lg flex justify-center items-start">
        <div  class=" mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col   md:px-10 md:flex-row md:gap-8  lg:mt-0 lg:items-stretch gap-8">
            <div class="ml-4 lg:ml-0 md:w-full">
                <div class=" md:w-full">
                    <h1 class="text-white text-xl md:text-lg mb-2">PAWONKOE</h1>
                    <h1 class="text-white text-base md:text-sm mb-4">PAWONKOE.BWI</h1>
                    <p class="text-white md:text-sm">Kami juga terus mengupdate informasi mengenai perusahaan melalui media sosial, untuk informasi terkini anda dapat mengikuti media sosial kami.</p>
                </div>
                <div class="flex justify-start items-center mt-8 gap-2">
                    <div class="text-white w-6 h-6">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </div>
                    <a href="https://maps.app.goo.gl/LRtRixYMKA1tiok46">
                        <p class="text-white">Banyuwangi, Jawa Timur</p>
                    </a>
                </div>
                <div class="flex justify-start items-center mt-4 gap-2">
                    <div class="shopee w-10 h-10">
                        <a href="">
                            <img src="{{asset('assets/images/shopee.png')}}" alt="" srcset="">
                        </a>
                    </div>
                    <div class="instagram w-10 h-10">
                        <a href="">
                            <img src="{{asset('assets/images/ig.png')}}" alt="" srcset="">
                        </a>
                    </div>
                    <div class="wa w-10 h-10">
                        <a href="">
                            <img src="{{asset('assets/images/wa.png')}}" alt="" srcset="">
                        </a>
                    </div>
                    <div class="email w-10 h-10">
                        <a href="">
                            <img src="{{asset('assets/images/email.png')}}" alt="" srcset="">
                        </a>
                    </div>
                    <div class="fb w-10 h-10">
                        <a href="">
                            <img src="{{asset('assets/images/fb.png')}}" alt="" srcset="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden md:block md:w-1/2 pr-10">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d761.0453252011717!2d114.14695737041085!3d-8.32120198595234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd15550498a1e55%3A0x616bafa860db82bb!2sProdusen%20Rambak%20Cumi%20dan%20aneka%20samval%20Pawon%20koe%20Banyuwangi!5e0!3m2!1sid!2sid!4v1700216465014!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-2xl w-[300px] h-[200px] lg:w-[380px] lg:h-[280px] ">
        </div>
        </iframe>
    </div>
</div>
<div class="bg-gray-900 flex justify-center items-center py-2 mt-20">
    <h1 class="text-white">@2023 PawonKoe. All right reserved</h1>
</div>
@endsection
