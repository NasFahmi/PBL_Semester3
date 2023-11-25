@extends('layout.admin_pages')
@section('title')
@section('content')
<div class="container  px-6 pb-6 mx-auto">
    <div class="w-full p-6 bg-white rounded-md shadow-md mt-10">
        <h2 class="text-2xl font-semibold mb-6">Tambah Gambar Product</h2>

        <form action="{{route('product.storeImagePost')}}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf

            <!-- Input file -->
            <div class="mb-4">
                <label for="gambar" class="block text-gray-700 font-semibold mb-2">Choose a file:</label>
                {{-- <input type="file" name="gambar" id="gambar" multiple class="border rounded-md px-4 py-2 w-full">
                --}}
                <input type="file" name="image[]" id="gambar" multiple onchange="previewImages()"
                    class="file-input file-input-bordered border border-gray-800 file-input-info w-full max-w-xs"
                    required />
            </div>


            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Image Preview -->
            <div id="imagePreviews" class="w-full rounded-lg mt-4 mx-4 flex justify-start items-start">

            </div>



            <!-- Submit Button -->
            <div class="flex justify-center items-center">
                <button type="submit" class=" text-black font-bold py-2 px-4 rounded">
                    Upload
                </button>
            </div>

        </form>
    </div>

    <script>
        function previewImages() {
    const images = document.getElementById("gambar");
    const imagePreviews = document.getElementById("imagePreviews");
    imagePreviews.innerHTML = ''; // Membersihkan pratinjau sebelumnya

    for (let i = 0; i < images.files.length; i++) {
        const oFReader = new FileReader();
        const imagePreview = document.createElement("img");
        imagePreview.className = "w-[200px] h-auto rounded-lg";
        imagePreviews.appendChild(imagePreview);

        oFReader.readAsDataURL(images.files[i]);

        oFReader.onload = (oFREvent) => {
            imagePreview.src = oFREvent.target.result;
        };
    }
}

    </script>
</div>


@endsection