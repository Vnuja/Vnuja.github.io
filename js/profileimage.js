
function previewImage(event) {
const imagePreview = document.getElementById('image-preview');
const file = event.target.files[0];

if (file) {
const reader = new FileReader();

reader.onload = function(e) {
imagePreview.src = e.target.result;
};

reader.readAsDataURL(file);
}
}

function clearImage() {
const imagePreview = document.getElementById('image-preview');
const fileInput = document.getElementById('profile-image');

// Clear the image preview
imagePreview.src = '';

// Clear the file input value to allow selecting the same file again
fileInput.value = '';
}

