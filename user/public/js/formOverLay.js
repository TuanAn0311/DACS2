// JavaScript to handle opening and closing the form
function openForm() {
    document.getElementById("formOverlay").style.display = "flex";
}

function closeForm() {
    document.getElementById("formOverlay").style.display = "none";
}

// Optional: Handle form submission
document.getElementById("chaoGiaForm").addEventListener("submit", function(event) {
    // Collect form data and handle submission here
    alert("Bài đăng đã được tải lên!");
    
    closeForm();
});