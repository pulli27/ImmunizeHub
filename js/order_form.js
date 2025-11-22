function enableButton() {
    if(document.getElementById("checkbox").checked){
		
		document.getElementById("submitBtn").disabled=false;
	}
	else{
		document.getElementById("submitBtn").disabled=true;
	}
}

document.getElementById("vaccineOrderForm").addEventListener("submit", function(event) {
    // Prevent form's default submission behavior
    event.preventDefault();
     
    // Check if checkbox is checked
    if (document.getElementById("checkbox").checked) {
        // Display success message
        document.getElementById("formMessage").innerText = "Form submitted successfully!";
        document.getElementById("formMessage").style.color = "green";
        
        // Optionally clear form fields
        document.getElementById("vaccineOrderForm").reset();
        enableButton(); // Re-disable the submit button after reset
    } else {
        alert("You must agree to the terms before submitting.");
    }
});