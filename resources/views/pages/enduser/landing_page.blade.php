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

    {{-- Section 3 --}}
    <div class="">
        <h1 class="text-2xl text-center font-semibold mb-4 pt-10 lg:text-3xl">Vision, Mission, dan Goals</h1>
        <div id="visi_misi" class="mx-auto max-w-screen-xl px-4 flex justify-center items-center flex-col  md:mt-16 md:px-10 md:flex-row-reverse md:gap-8 lg:items-stretch md:justify-around">
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

@endsection
