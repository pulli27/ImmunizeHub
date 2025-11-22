// Function to handle the upload button click
function uploadHealthReport() {
    alert("Upload Health Report functionality is under development.");
}

// Function to highlight rows when checked
function highlightRow(checkbox) {
    const row = checkbox.parentElement.parentElement;
    if (checkbox.checked) {
        row.style.backgroundColor = "#c8e6c9";  // Highlight color
    } else {
        row.style.backgroundColor = "";  // Default color
    }
}

// Event listener for all checkboxes
document.addEventListener("DOMContentLoaded", function() {
    const checkboxes = document.querySelectorAll('.patients-table input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            highlightRow(checkbox);
        });
    });
});
