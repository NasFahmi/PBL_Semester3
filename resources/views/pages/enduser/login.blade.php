@extends('layout.pages')
@section('title','Login')
@section('content')
<div class="flex items-center min-h-screen p-6 bg-gray-50 ">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl ">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <img
            aria-hidden="true"
            class="object-cover w-full h-full "
            src="../assets/img/login-office.jpeg"
            alt="Office"
          />
          <img
            aria-hidden="true"
            class="hidden object-cover w-full h-full "
            src="../assets/img/login-office-dark.jpeg"
            alt="Office"
          />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 ">
              Login
            </h1>
            <label class="block text-sm">
              <span class="text-gray-700 ">Email</span>
              <input
                type="email"
                class="block w-full mt-1 text-sm border-gray-200 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input rounded-md"
                placeholder="email@email.com"
              />
            </label>
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 ">Password</span>
              <input
                class="block w-full mt-1 text-sm border-gray-200 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input rounded-md"
                placeholder="***************"
                type="password"
              />
            </label>

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <a
              class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-[#276ED8] border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple"
              href=""
            >
              Log in
            </a>

            <hr class="my-8" />
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection