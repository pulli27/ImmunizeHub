document.getElementById('orderForm').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Order confirmed!');
});

document.getElementById('cancel-btn').addEventListener('click', function() {
    alert('Order cancelled!');
});
<script src="script.js"></script>