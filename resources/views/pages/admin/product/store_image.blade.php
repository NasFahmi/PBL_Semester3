@extends('layout.admin_pages')
@section('title')
@section('content')
<div class="container  px-6 pb-6 mx-auto">
    <div class="w-full p-6 bg-white rounded-md shadow-md mt-10">
        <h2 class="text-2xl font-semibold mb-6">File Upload with Preview</h2>

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
            @error('image')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
            @enderror

            <!-- Image Preview -->
            <div id="imagePreviews" class="w-2/5 rounded-lg mt-4 mx-4">

            </div>



            <!-- Submit Button -->
            <div class="flex justify-center items-center">
                <button type="submit" class=" text-black font-bold py-2 px-4 rounded">
                    Upload
                </button>
            </div>

        </form>
    </div>

    {{-- <script>
        const inputFile = document.getElementById('gambar');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    
        inputFile.addEventListener('change', function () {
            // Menghapus semua pratinjau yang mungkin sudah ada
            imagePreviewContainer.innerHTML = '';
    
            // Menampilkan pratinjau untuk setiap file yang dipilih
            for (const file of this.files) {
                const reader = new FileReader();
                const preview = document.createElement('img');
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
    
                reader.onload = function (e) {
                    const img = new Image();
                    img.src = e.target.result;
    
                    // Mengatur ukuran maksimal pratinjau
                    const maxWidth = 200; // Sesuaikan dengan kebutuhan Anda
                    const maxHeight = 200; // Sesuaikan dengan kebutuhan Anda
    
                    // Menyesuaikan ukuran gambar agar sesuai dengan batasan lebar dan tinggi
                    let width = img.width;
                    let height = img.height;
    
                    if (width > height) {
                        if (width > maxWidth) {
                            height *= maxWidth / width;
                            width = maxWidth;
                        }
                    } else {
                        if (height > maxHeight) {
                            width *= maxHeight / height;
                            height = maxHeight;
                        }
                    }
    
                    // Mengatur ukuran canvas sesuai dengan gambar yang diperkecil
                    canvas.width = width;
                    canvas.height = height;
    
                    // Menggambar gambar ke dalam canvas dengan ukuran yang diperkecil
                    ctx.drawImage(img, 0, 0, width, height);
    
                    // Menetapkan pratinjau sebagai data URL gambar yang diperkecil
                    preview.src = canvas.toDataURL('image/jpeg', 0.8); // Sesuaikan format dan kualitas gambar
    
                    // Menambahkan pratinjau ke dalam elemen container
                    imagePreviewContainer.appendChild(preview);
                };
    
                reader.readAsDataURL(file);
            }
    
            // Menampilkan container pratinjau
            imagePreviewContainer.style.display = 'flex';
        });
    </script> --}}
    <script>
        function previewImages() {
    const images = document.getElementById("gambar");
    const imagePreviews = document.getElementById("imagePreviews");
    imagePreviews.innerHTML = ''; // Membersihkan pratinjau sebelumnya

    for (let i = 0; i < images.files.length; i++) {
        const oFReader = new FileReader();
        const imagePreview = document.createElement("img");
        imagePreview.className = "w-full rounded-lg";
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