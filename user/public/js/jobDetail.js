// JavaScript to handle opening and closing the form
function openForm(formName) {
  document.getElementById(formName).style.display = "flex";
}

function closeForm(formName) {
  document.getElementById(formName).style.display = "none";
}

// Optional: Handle form submission
document
  .getElementById("chaoGiaForm")
  .addEventListener("submit", function (event) {
    // Collect form data and handle submission here
    closeForm();
  });

  document
  .getElementById("formUpdate")
  .addEventListener("submit", function (event) {
    // Collect form data and handle submission here
    closeForm();
  });
////////////////////////////////Phân Trang///////////////////////////////////////////////
