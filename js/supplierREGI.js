document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Form submitted successfully!');
});

function checkPassword()
{
	if(document.getElementById("password").value != document.getElementById("Re-enter password").value){
		alert("Password Mismatch!");
		return false;
	}
	else{
		alert("Success!");
		return true;
	}
}