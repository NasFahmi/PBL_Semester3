function previewImages() {
    const images = document.getElementById("dropzone-file");
    const imagePreviews = document.getElementById("imagePreviews");
    imagePreviews.innerHTML = ''; // Membersihkan pratinjau sebelumnya

    for (let i = 0; i < images.files.length; i++) {
        const oFReader = new FileReader();
        const imagePreview = document.createElement("img");
        imagePreview.style.width = "160px"
        imagePreview.style.height = "160px"
        imagePreview.className = "object-cover rounded-lg";
        imagePreviews.appendChild(imagePreview);

        oFReader.readAsDataURL(images.files[i]);

        oFReader.onload = (oFREvent) => {
            imagePreview.src = oFREvent.target.result;
        };
    }
}