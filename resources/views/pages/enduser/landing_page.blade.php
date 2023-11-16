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
                        <a href="#tentang_kami" class="text-gray-50 hover:text-gray-200  duration-300">Tentang Kami</a>
                        <a href="#perjalanan" class="text-gray-50 hover:text-gray-200  duration-300">Perjalanan</a>
                        <a href="#visi-misi" class="text-gray-50 hover:text-gray-200  duration-300">Visi Misi</a>
                        <a href="#produk" class="text-gray-50 hover:text-gray-200  duration-300">Product Kami</a>
                        <a href="#kontak" class="text-gray-50 hover:text-gray-200  duration-300">Kontak</a>
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
                <a href="#tentang_kami" class="text-gray-900  hover:text-gray-800 font-semibold text-lg mb-8  duration-300">Tentang Kami</a>
                <a href="#perjalanan" class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8  duration-300">Perjalanan</a>
                <a href="#visi-misi" class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8  duration-300">Visi Misi</a>
                <a href="#produk" class="text-gray-900 hover:text-gray-800  font-semibold text-lg mb-8  duration-300">Product Kami</a>
                <a href="#kontak" class="text-gray-900 hover:text-gray-800 font-semibold text-lg mb-8  duration-300">Kontak</a>
            </ul>
            </div>
        </div>
    </div>

    {{-- section 2 --}}
    <div id="tentang_kami" class=" mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col  md:mt-16 md:px-10 md:flex-row md:gap-8 lg:items-stretch">
        <div class="mb-10 md:w-1/2">
            <div class="lg:w-8/12">
                <h1 class="text-2xl font-semibold mb-4 pt-10 lg:text-3xl">Tentang kami</h1>
                <p class="text-sm lg:text-base">PAWONKOE Memulai usaha sejak maret 2021 Lokasi usaha
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

    {{-- Section 3 --}}
    <div id="perjalanan" class="mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col  md:mt-16 md:px-10 md:flex-row-reverse md:gap-8 lg:items-stretch md:justify-around">
        <div class="mb-10 md:w-1/3">
            <div class="lg:w-11/12">
                <h1 class="text-2xl font-semibold mb-4 pt-10 lg:text-3xl">Perjalanan</h1>
                <p class="text-sm lg:text-base">Berawal dari pandemi Yang semua orang kehilangan
                    pekerjaan dan usahanya tidak jalan lagi, Kami berinisiatif memulai usaha rumahan dengan memberdayakan para ibu-ibu rumah tangga di sekeliling kami. Alhamdulillah Pawonkoe masih bertahan dan bahkan berkembang hingga saat ini.</p>
            </div>
        </div>
        <div class="w-8/12 md:w-1/3">
            <img src="{{asset('assets/images/journey.png')}}" alt="" srcset="" class="w-full lg:w-3/4">
        </div>
    </div>

    {{-- Section 4 --}}
    <div class="">
        <h1 class="text-2xl text-center font-semibold mb-4 mt-20 lg:text-3xl">Vision, Mission, dan Goals</h1>
        <div id="visi-misi" class="mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col  md:mt-16 md:px-10 md:flex-row-reverse md:gap-8 lg:items-stretch md:justify-around">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <div class="flex justify-center items-center flex-col mt-8">
                    <div class="flex justify-center items-center">
                        <img src="{{asset('assets/images/vision.png')}}" alt="" srcset="" class="w-1/4">
                    </div>
                    <div class="w-3/4 mt-5">
                        <h1 class="text-xl text-center font-semibold mb-3">Vision</h1>
                        <p class="text-sm text-center">Menjadi unit pengolah ikan yang inovatif dan menjaminkeamanan mutu produk dan akan selalu bisa di andalkan</p>
                    </div>
                </div>
                <div class="flex justify-center items-center flex-col mt-8">
                    <div class="flex justify-center items-center">
                        <img src="{{asset('assets/images/mission.png')}}" alt="" srcset="" class="w-1/4">
                    </div>
                    <div class="w-3/4 mt-5">
                        <h1 class="text-xl text-center font-semibold mb-3">Mission</h1>
                        <p class="text-sm text-center">Meningkatkan perekonomian dan pemberdayaan warga sekitar mengenalkan cita rasa nusantara ke dunia.Menguasai pasar baik lokal maupun lintas provisi, Cegah stunting.</p>
                    </div>
                </div>
                <div class="flex justify-center items-center flex-col mt-8 md:col-span-2 lg:col-auto ">
                    <div class="flex justify-center items-center">
                        <img src="{{asset('assets/images/goal.png')}}" alt="" srcset="" class="w-1/4">
                    </div>
                    <div class="lg:w-3/4 md:w-5/12 w-3/4 mt-5">
                        <h1 class="text-xl text-center font-semibold mb-3">Goals</h1>
                        <p class="text-sm text-center">Produk kami di kenal dunia
                            Memperkerjakan lebih banyak karyawan. Produk hasil perikanan yang ber SNI</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 5 --}}
    <div class="mb-10">
        <h1 class="text-2xl text-center font-semibold mb-4 pt-20 lg:text-3xl">Jangkauan Pemasaran</h1>
        <div id="visi-misi" class="mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col  md:mt-10 md:px-10 md:flex-row-reverse md:gap-8 lg:items-stretch md:justify-around lg:px-56">
            <div class="grid grid-cols-1 md:grid-cols-2 ">
                <div class="flex justify-center items-center">
                    <div class="flex justify-center items-center flex-col mt-8 bg-blue-50 p-10 rounded-xl w-10/12">
                        <div class="flex justify-center items-center">
                            <img src="{{asset('assets/images/pin.png')}}" alt="" srcset="" class="w-1/4">
                        </div>
                        <div class="w-full mt-5">
                            <p class="text-sm text-center">Produk kami sudah ada di 20 pusat oleh -oleh dibanyuwangi, probolinggo, situbondo, surabaya dan sekitar nya</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="flex justify-center items-center flex-col mt-8 bg-blue-50 p-10 rounded-xl w-10/12 ">
                        <div class="flex justify-center items-center">
                            <img src="{{asset('assets/images/shopping.png')}}" alt="" srcset="" class="w-1/4">
                        </div>
                        <div class="w-full mt-5">
                            <p class="text-sm text-center">Kami juga melayani pembelian melalui sosial media, seperti instagram, facebook dan tiktok.</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="flex justify-center items-center flex-col mt-8 bg-blue-50 p-10 rounded-xl w-10/12 ">
                        <div class="flex justify-center items-center">
                            <img src="{{asset('assets/images/social-media.png')}}" alt="" srcset="" class="w-1/4">
                        </div>
                        <div class="w-full mt-5">
                            <p class="text-sm text-center">Kami juga berperan aktif dalam acara pameran dari beberapa dinas yang  menaungi.</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="flex justify-center items-center flex-col mt-8 bg-blue-50 p-10 rounded-xl w-10/12 ">
                        <div class="flex justify-center items-center">
                            <img src="{{asset('assets/images/people.png')}}" alt="" srcset="" class="w-1/4">
                        </div>
                        <div class="w-full mt-5">
                            <p class="text-sm text-center">Produk kami sudah ada di 20 pusat oleh -oleh dibanyuwangi, probolinggo, situbondo, surabaya dan sekitar nya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- section 6 --}}
    <div class="bg-blue-100 pb-10">
        <h1 class="text-2xl text-center font-semibold mb-10 pt-10 lg:text-3xl">Keungulan Produk Kami</h1>
        <div id="keungulan" class=" mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col   md:px-10 md:flex-row md:gap-8 lg:mt-0 lg:items-stretch gap-8">
            <div class="ml-4 md:w-1/2">
                <div class="lg:w-8/12">
                    <ul class="px-5 list-disc lg:text-lg">
                        <li>Produk bersertifikat HALAL</li>
                        <li>Kemasan rapi dan tahan lama</li>
                        <li>Menggunakan bahan premium</li>
                        <li>Ukuran perporsi</li>
                        <li>Harga terjangkau</li>
                        <li>Siap saji cocok untuk traveler</li>
                        <li>Ada berbagai macam varian rasa</li> 
                        <li>Pembayaran Secara Elektronik</li>
                        <li>Produk unik dan belum banyak pesaing</li>
                        <li>Produk mudah didapatkan di market place atau putsol</li> 
                    </ul>
                </div>
            </div>
            <div class="w-10/12 md:w-1/2 flex justify-center items-center">
                <div class="carousel w-11/12 h-56 lg:h-80 rounded-2xl">
                    <div id="slide1" class="carousel-item relative w-full ">
                      <img src="{{asset('assets/images/product/crispy savour.jpg')}}" class="w-full object-cover" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide4" class="btn btn-circle">❮</a> 
                        <a href="#slide2" class="btn btn-circle">❯</a>
                      </div>
                    </div> 
                    <div id="slide2" class="carousel-item relative w-full">
                      <img src="{{asset('assets/images/product/sambel.jpg')}}" class="w-full object-cover" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide1" onclick="preventDefaultAndNavigate('#slide1');" class="btn btn-circle">❮</a> 
                        <a href="#slide3" onclick="preventDefaultAndNavigate('#slide3'); class="btn btn-circle">❯</a>
                      </div>
                    </div> 
                    <div id="slide3" class="carousel-item relative w-full">
                      <img src="{{asset('assets/images/product/squidy_crackers.jpg')}}" class="w-full object-cover" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide2" onclick="preventDefaultAndNavigate('#slide2'); class="btn btn-circle">❮</a> 
                        <a href="#slide4" onclick="preventDefaultAndNavigate('#slide4'); class="btn btn-circle">❯</a>
                      </div>
                    </div> 
                    <div id="slide4" class="carousel-item relative w-full">
                      <img src="{{asset('assets/images/product/rambak.jpg')}}" class="w-full object-cover" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide3" onclick="preventDefaultAndNavigate('#slide3'); class="btn btn-circle">❮</a> 
                        <a href="#slide1" onclick="preventDefaultAndNavigate('#slide1'); class="btn btn-circle">❯</a>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    {{-- section 7 --}}

    <div class="">
        <h1 class="text-2xl text-center font-semibold mb-4 mt-20 lg:text-3xl">Tim Kami</h1>
        <div id="visi-misi" class="mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col  md:mt-16 md:px-10 md:flex-row-reverse md:gap-8 lg:items-stretch md:justify-around">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="flex justify-center items-center flex-col mt-8">
                    <div class="flex justify-center items-center">
                        <img src="{{asset('assets/images/jp.png')}}" alt="" srcset="" class="w-1/4">
                    </div>
                    <div class="w-3/4 lg:5/12 mt-5">
                        <h1 class="text-xl text-center font-semibold mb-3 text-green-500">JP</h1>
                        <h1 class="text-xl text-center font-semibold mb-1">Busines Analyst</h1>
                        <p class="text-sm text-center">Iman kita adalah inti masa depan kita. Tidak ada kesuksesan besar tanpa pengorbanan besar.</p>
                    </div>
                </div>
                <div class="flex justify-center items-center flex-col mt-8">
                    <div class="flex justify-center items-center">
                        <img src="{{asset('assets/images/diah.png')}}" alt="" srcset="" class="w-1/4">
                    </div>
                    <div class="w-3/4 lg:w-5/12 mt-5">
                        <h1 class="text-xl text-center font-semibold mb-3 text-green-500">Diah Lestari</h1>
                        <h1 class="text-xl text-center font-semibold mb-1">Owner</h1>
                        <p class="text-sm text-center">Banyak dari kegagalan hidup adalah orang-orang yang tidak menyadari betapa dekatnya mereka dengan kesuksesan ketika mereka menyerah.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- section 8 -- footer --}}  
    <div class="bg-gray-800 mt-20 pb-10">
        <h1 class="text-2xl text-center  font-semibold text-white mb-10 pt-10 lg:text-3xl">Temukan Kami</h1>
        <div id="keungulan" class=" mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col   md:px-10 md:flex-row md:gap-8  lg:mt-0 lg:items-stretch gap-8">
            <div class="ml-4 lg:ml-0 md:w-full">
                <div class="lg:w-8/12">
                    <h1 class="text-white text-xl mb-2">PAWONKOE</h1>
                    <h1 class="text-white text-base mb-4">PAWONKOE.BWI</h1>
                    <p class="text-white">Kami juga terus mengupdate informasi mengenai perusahaan melalui media sosial, untuk informasi terkini anda dapat mengikuti media sosial kami.</p>
                </div>
                <div class="flex justify-start items-center mt-8 gap-2">
                    <div class="text-white w-6 h-6">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </div>
                    <p class="text-white">Banyuwangi, Jawa Timur</p>
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
    </div>
    <div class="bg-gray-900 flex justify-center items-center py-2">
        <h1 class="text-white">@2023 PawonKoe. All right reserved</h1>
    </div>
    <script>
        function preventDefaultAndNavigate(target) {
            event.preventDefault();
            window.location.href = target;
        }
    </script>
    
@endsection
