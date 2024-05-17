
function validateForm() {
  
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;

   
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    
    if (username.length < 3) {
        alert("Username must be at least 3 characters long.");
        return false;
    }

    
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    
    return true;
}


document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('profileForm');
    if (form) {
        form.onsubmit = validateForm;
    }
});