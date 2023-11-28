@extends('layout.admin_pages')
@section('title','Admin Transaksi')
@section('content')
<div class="container  px-6 pb-6 mx-auto">
    <p class="text-2xl my-6 font-semibold text-gray-700">Transaksi</p>
    <a href="" class="bg-green-200 px-4 w-fit py-2 rounded-3xl flex justify-center items-center gap-1 mb-4">
        <div class="w-4 h-4">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12H18M12 6V18" stroke="#65a30d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        </div>
        <span class="font-semibold text-green-600 text-sm">Tambah Transaksi</span>
    </a>
    <div class="bg-white overflow-hidden  px-8 py-8 shadow-lg rounded-3xl">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
              <!-- head -->
              <thead>
                <tr>
                  <th class="text-sm">#</th>
                  <th class="text-sm">Product</th>
                  <th class="text-sm">Pembeli</th>
                  <th class="text-sm">Jumlah</th>
                  <th class="text-sm">Total Harga</th>
                  <th class="text-sm">Tanggal</th>
                  <th class="text-sm">Status</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr>
                  <th class="text-sm">1</th>
                  <td class="text-sm">Product A</td>
                  <td class="text-sm">Jhone Doe</td>
                  <td class="text-sm">20</td>
                  <td class="text-sm">120.000</td>
                  <td class="text-sm">21 Agustus 2023</td>
                  <td class="text-sm">
                    <div class="bg-green-200 px-4 py-2 w-fit h-fit rounded-3xl flex justify-center items-center">
                      <span class="text-green-500 font-semibold">Selesai</span>
                    </div>
                  </td>
                  <td>
                    <div class="flex justify-center items-center">
                        <div class="w-8 h-8" data-dropdown-toggle="dropdown1">  
                            <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" transform="rotate(90)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Kebab-Menu</title> <g id="Kebab-Menu" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect id="Container" x="0" y="0" width="24" height="24"> </rect> <path d="M12,6 C12.5522847,6 13,5.55228475 13,5 C13,4.44771525 12.5522847,4 12,4 C11.4477153,4 11,4.44771525 11,5 C11,5.55228475 11.4477153,6 12,6 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,13 C12.5522847,13 13,12.5522847 13,12 C13,11.4477153 12.5522847,11 12,11 C11.4477153,11 11,11.4477153 11,12 C11,12.5522847 11.4477153,13 12,13 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,20 C12.5522847,20 13,19.5522847 13,19 C13,18.4477153 12.5522847,18 12,18 C11.4477153,18 11,18.4477153 11,19 C11,19.5522847 11.4477153,20 12,20 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> </g> </g></svg>
                        </div>
                    </div>
                    <div id="dropdown1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-3xl shadow w-44 dark:bg-gray-700">
                        <ul class="text-sm text-gray-700 dark:text-gray-200 rounded-3xl" aria-labelledby="dropdownDefaultButton">
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-sky-300 bg-sky-50">
                                <div class="flex justify-start items-center gap-2">
                                    <div class="w-4 h-4 ">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9.75 12C9.75 10.7574 10.7574 9.75 12 9.75C13.2426 9.75 14.25 10.7574 14.25 12C14.25 13.2426 13.2426 14.25 12 14.25C10.7574 14.25 9.75 13.2426 9.75 12Z" fill="#0ea5e9"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 13.6394 2.42496 14.1915 3.27489 15.2957C4.97196 17.5004 7.81811 20 12 20C16.1819 20 19.028 17.5004 20.7251 15.2957C21.575 14.1915 22 13.6394 22 12C22 10.3606 21.575 9.80853 20.7251 8.70433C19.028 6.49956 16.1819 4 12 4C7.81811 4 4.97196 6.49956 3.27489 8.70433C2.42496 9.80853 2 10.3606 2 12ZM12 8.25C9.92893 8.25 8.25 9.92893 8.25 12C8.25 14.0711 9.92893 15.75 12 15.75C14.0711 15.75 15.75 14.0711 15.75 12C15.75 9.92893 14.0711 8.25 12 8.25Z" fill="#0ea5e9"></path> </g></svg>
                                    </div>
                                    <span class="font-semibold text-sky-400 hover:text-gray-100">Details</span> 
                                </div>
                            </a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 bg-green-50">
                                <div class="flex justify-start items-center gap-2">
                                    <div class="w-4 h-4 ">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.4001 18.1612L11.4001 18.1612L18.796 10.7653C17.7894 10.3464 16.5972 9.6582 15.4697 8.53068C14.342 7.40298 13.6537 6.21058 13.2348 5.2039L5.83882 12.5999L5.83879 12.5999C5.26166 13.1771 4.97307 13.4657 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L7.47918 20.5844C8.25351 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5343 19.0269 10.823 18.7383 11.4001 18.1612Z" fill="#4ade80"></path> <path d="M20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178L14.3999 4.03882C14.4121 4.0755 14.4246 4.11268 14.4377 4.15035C14.7628 5.0875 15.3763 6.31601 16.5303 7.47002C17.6843 8.62403 18.9128 9.23749 19.85 9.56262C19.8875 9.57563 19.9245 9.58817 19.961 9.60026L20.8482 8.71306Z" fill="#4ade80"></path> </g></svg>
                                    </div>
                                    <span class="font-semibold text-green-400">Edit</span> 
                                </div>
                            </a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 bg-red-50">
                                <div class="flex justify-start items-center gap-2">
                                    <div class="w-4 h-4 ">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2.75 6.16667C2.75 5.70644 3.09538 5.33335 3.52143 5.33335L6.18567 5.3329C6.71502 5.31841 7.18202 4.95482 7.36214 4.41691C7.36688 4.40277 7.37232 4.38532 7.39185 4.32203L7.50665 3.94993C7.5769 3.72179 7.6381 3.52303 7.72375 3.34536C8.06209 2.64349 8.68808 2.1561 9.41147 2.03132C9.59457 1.99973 9.78848 1.99987 10.0111 2.00002H13.4891C13.7117 1.99987 13.9056 1.99973 14.0887 2.03132C14.8121 2.1561 15.4381 2.64349 15.7764 3.34536C15.8621 3.52303 15.9233 3.72179 15.9935 3.94993L16.1083 4.32203C16.1279 4.38532 16.1333 4.40277 16.138 4.41691C16.3182 4.95482 16.8778 5.31886 17.4071 5.33335H19.9786C20.4046 5.33335 20.75 5.70644 20.75 6.16667C20.75 6.62691 20.4046 7 19.9786 7H3.52143C3.09538 7 2.75 6.62691 2.75 6.16667Z" fill="#f87171"></path> <path d="M11.6068 21.9998H12.3937C15.1012 21.9998 16.4549 21.9998 17.3351 21.1366C18.2153 20.2734 18.3054 18.8575 18.4855 16.0256L18.745 11.945C18.8427 10.4085 18.8916 9.6402 18.45 9.15335C18.0084 8.6665 17.2628 8.6665 15.7714 8.6665H8.22905C6.73771 8.6665 5.99204 8.6665 5.55047 9.15335C5.10891 9.6402 5.15777 10.4085 5.25549 11.945L5.515 16.0256C5.6951 18.8575 5.78515 20.2734 6.66534 21.1366C7.54553 21.9998 8.89927 21.9998 11.6068 21.9998Z" fill="#f87171"></path> </g></svg>
                                    </div>
                                    <span class="font-semibold text-red-400">Delete</span> 
                                </div>
                            </a>
                          </li>
                        </ul>
                    </div>
                  </td>
                </tr>
                <!-- row 2 -->
                <tr>
                    <th>2</th>
                    <td>Product B</td>
                    <td>Jhone Doe</td>
                    <td>20</td>
                    <td>120.000</td>
                    <td>21 Agustus 2023</td>
                    <td>
                      <div class="bg-red-200 w-fit h-fit px-4 py-2 rounded-3xl flex justify-center items-center">
                        <span class="text-red-500 font-semibold">Belum Selesai</span>
                      </div>
                    </td>
                    <td>
                        <div class="flex justify-center items-center">
                            <div class="w-8 h-8" data-dropdown-toggle="dropdown2">  
                                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" transform="rotate(90)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Kebab-Menu</title> <g id="Kebab-Menu" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect id="Container" x="0" y="0" width="24" height="24"> </rect> <path d="M12,6 C12.5522847,6 13,5.55228475 13,5 C13,4.44771525 12.5522847,4 12,4 C11.4477153,4 11,4.44771525 11,5 C11,5.55228475 11.4477153,6 12,6 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,13 C12.5522847,13 13,12.5522847 13,12 C13,11.4477153 12.5522847,11 12,11 C11.4477153,11 11,11.4477153 11,12 C11,12.5522847 11.4477153,13 12,13 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,20 C12.5522847,20 13,19.5522847 13,19 C13,18.4477153 12.5522847,18 12,18 C11.4477153,18 11,18.4477153 11,19 C11,19.5522847 11.4477153,20 12,20 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> </g> </g></svg>
                            </div>
                        </div>
                        <div id="dropdown2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Details</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                              </li>
                            </ul>
                        </div>
                    </td>
                  </tr>
                <!-- row 3 -->
                <tr>
                    <th>3</th>
                    <td>Product C</td>
                    <td>Jhone Doe</td>
                    <td>20</td>
                    <td>120.000</td>
                    <td>21 Agustus 2023</td>
                    <td>
                      <div class="bg-red-200 w-fit h-fit px-4 py-2 rounded-3xl flex justify-center items-center">
                        <span class="text-red-500 font-semibold">Belum Selesai</span>
                      </div>
                    </td>
                    <td>
                        <div class="flex justify-center items-center">
                            <div class="w-8 h-8" data-dropdown-toggle="dropdown3">  
                                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" transform="rotate(90)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Kebab-Menu</title> <g id="Kebab-Menu" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect id="Container" x="0" y="0" width="24" height="24"> </rect> <path d="M12,6 C12.5522847,6 13,5.55228475 13,5 C13,4.44771525 12.5522847,4 12,4 C11.4477153,4 11,4.44771525 11,5 C11,5.55228475 11.4477153,6 12,6 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,13 C12.5522847,13 13,12.5522847 13,12 C13,11.4477153 12.5522847,11 12,11 C11.4477153,11 11,11.4477153 11,12 C11,12.5522847 11.4477153,13 12,13 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,20 C12.5522847,20 13,19.5522847 13,19 C13,18.4477153 12.5522847,18 12,18 C11.4477153,18 11,18.4477153 11,19 C11,19.5522847 11.4477153,20 12,20 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> </g> </g></svg>
                            </div>
                        </div>
                        <div id="dropdown3" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Details</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                              </li>
                            </ul>
                        </div>
                    </td>
                  </tr>

                  <tr>
                    <th>4</th>
                    <td>Product C</td>
                    <td>Jhone Doe</td>
                    <td>20</td>
                    <td>120.000</td>
                    <td>21 Agustus 2023</td>
                    <td>
                      <div class="bg-red-200 w-fit h-fit px-4 py-2 rounded-3xl flex justify-center items-center">
                        <span class="text-red-500 font-semibold">Belum Selesai</span>
                      </div>
                    </td>
                    <td>
                        <div class="flex justify-center items-center">
                            <div class="w-8 h-8" data-dropdown-toggle="dropdown4">  
                                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" transform="rotate(90)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Kebab-Menu</title> <g id="Kebab-Menu" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect id="Container" x="0" y="0" width="24" height="24"> </rect> <path d="M12,6 C12.5522847,6 13,5.55228475 13,5 C13,4.44771525 12.5522847,4 12,4 C11.4477153,4 11,4.44771525 11,5 C11,5.55228475 11.4477153,6 12,6 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,13 C12.5522847,13 13,12.5522847 13,12 C13,11.4477153 12.5522847,11 12,11 C11.4477153,11 11,11.4477153 11,12 C11,12.5522847 11.4477153,13 12,13 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,20 C12.5522847,20 13,19.5522847 13,19 C13,18.4477153 12.5522847,18 12,18 C11.4477153,18 11,18.4477153 11,19 C11,19.5522847 11.4477153,20 12,20 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> </g> </g></svg>
                            </div>
                        </div>
                        <div id="dropdown4" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Details</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                              </li>
                            </ul>
                        </div>
                    </td>
                  </tr>

                  <tr>
                    <th>5</th>
                    <td>Product C</td>
                    <td>Jhone Doe</td>
                    <td>20</td>
                    <td>120.000</td>
                    <td>21 Agustus 2023</td>
                    <td>
                      <div class="bg-red-200 w-fit h-fit px-4 py-2 rounded-3xl flex justify-center items-center">
                        <span class="text-red-500 font-semibold">Belum Selesai</span>
                      </div>
                    </td>
                    <td>
                        <div class="flex justify-center items-center">
                            <div class="w-8 h-8" data-dropdown-toggle="dropdown5">  
                                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" transform="rotate(90)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Kebab-Menu</title> <g id="Kebab-Menu" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect id="Container" x="0" y="0" width="24" height="24"> </rect> <path d="M12,6 C12.5522847,6 13,5.55228475 13,5 C13,4.44771525 12.5522847,4 12,4 C11.4477153,4 11,4.44771525 11,5 C11,5.55228475 11.4477153,6 12,6 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,13 C12.5522847,13 13,12.5522847 13,12 C13,11.4477153 12.5522847,11 12,11 C11.4477153,11 11,11.4477153 11,12 C11,12.5522847 11.4477153,13 12,13 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,20 C12.5522847,20 13,19.5522847 13,19 C13,18.4477153 12.5522847,18 12,18 C11.4477153,18 11,18.4477153 11,19 C11,19.5522847 11.4477153,20 12,20 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> </g> </g></svg>
                            </div>
                        </div>
                        <div id="dropdown5" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Details</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                              </li>
                            </ul>
                        </div>
                    </td>
                  </tr>

                  <tr>
                    <th>6</th>
                    <td>Product C</td>
                    <td>Jhone Doe</td>
                    <td>20</td>
                    <td>120.000</td>
                    <td>21 Agustus 2023</td>
                    <td>
                      <div class="bg-red-200 w-fit h-fit px-4 py-2 rounded-3xl flex justify-center items-center">
                        <span class="text-red-500 font-semibold">Belum Selesai</span>
                      </div>
                    </td>
                    <td>
                        <div class="flex justify-center items-center">
                            <div class="w-8 h-8" data-dropdown-toggle="dropdown6">  
                                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" transform="rotate(90)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Kebab-Menu</title> <g id="Kebab-Menu" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect id="Container" x="0" y="0" width="24" height="24"> </rect> <path d="M12,6 C12.5522847,6 13,5.55228475 13,5 C13,4.44771525 12.5522847,4 12,4 C11.4477153,4 11,4.44771525 11,5 C11,5.55228475 11.4477153,6 12,6 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,13 C12.5522847,13 13,12.5522847 13,12 C13,11.4477153 12.5522847,11 12,11 C11.4477153,11 11,11.4477153 11,12 C11,12.5522847 11.4477153,13 12,13 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> <path d="M12,20 C12.5522847,20 13,19.5522847 13,19 C13,18.4477153 12.5522847,18 12,18 C11.4477153,18 11,18.4477153 11,19 C11,19.5522847 11.4477153,20 12,20 Z" id="shape-03" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0"> </path> </g> </g></svg>
                            </div>
                        </div>
                        <div id="dropdown6" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Details</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                              </li>
                              <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                              </li>
                            </ul>
                        </div>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
    </div>
</div>
@endsection