//Script to preview uploaded logo
document.getElementById("logo-input").addEventListener("change", function(event) {
    const file = event.target.files[0]; // Get the selected file
    if (file) {
        const reader = new FileReader(); // Create a FileReader object
        reader.onload = function(e) {
            const preview = document.getElementById("logo-preview");
            preview.src = e.target.result; // Set the image source
            preview.style.display = "block"; // Show the image preview
            document.querySelector(".plus-icon").style.display = "none"; // Hide the plus icon
        };
        reader.readAsDataURL(file); // Read the file as a Data URL
    }
});