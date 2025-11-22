// JavaScript for delete functionality with confirmation
const deleteButtons = document.querySelectorAll('.delete-btn');

deleteButtons.forEach(button => {
    button.addEventListener('click', function () {
        const row = this.closest('tr');
        const isConfirmed = confirm('Are you sure you want to delete this entry?');

        if (isConfirmed) {
            row.remove();  // Remove row if the user confirms
        }
    });
});
