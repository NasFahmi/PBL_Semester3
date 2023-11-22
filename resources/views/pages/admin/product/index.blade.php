@extends('layout.admin_pages')
@section('title', 'Admin Product')
@section('content')
    <p>ini tambah product</p>
    <div class="container mx-auto mt-8">
        <a href="{{ route('product.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add
        </a>
    </div>

@endsection
