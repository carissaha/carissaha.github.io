function checkForm() {
    // TODO: Perform input validation
    let errors = [];
    let fullName = document.getElementById("fullName");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let passwordConfirm = document.getElementById("passwordConfirm");
    let formErrors = document.getElementById("formErrors");
    
    // Reset errors
    formErrors.innerHTML = "";
    formErrors.classList.add("hide");
    fullName.classList.remove("error");
    email.classList.remove("error");
    password.classList.remove("error");
    passwordConfirm.classList.remove("error");
    
    // Full Name Validation
    if (fullName.value.trim().length < 1) {
        errors.push("Missing full name.");
        fullName.classList.add("error");
    }
    
    // Email Validation
    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/;
    if (!emailRegex.test(email.value.trim())) {
        errors.push("Invalid or missing email address.");
        email.classList.add("error");
    }
    
    // Password Validation
    let passwordValue = password.value;
    if (passwordValue.length < 10 || passwordValue.length > 20) {
        errors.push("Password must be between 10 and 20 characters.");
        password.classList.add("error");
    }
    if (!/[a-z]/.test(passwordValue)) {
        errors.push("Password must contain at least one lowercase character.");
        password.classList.add("error");
    }
    if (!/[A-Z]/.test(passwordValue)) {
        errors.push("Password must contain at least one uppercase character.");
        password.classList.add("error");
    }
    if (!/[0-9]/.test(passwordValue)) {
        errors.push("Password must contain at least one digit.");
        password.classList.add("error");
    }
    
    // Confirm Password Validation
    if (passwordValue !== passwordConfirm.value) {
        errors.push("Password and confirmation password don't match.");
        passwordConfirm.classList.add("error");
    }
    
    // Display errors if any
    if (errors.length > 0) {
        formErrors.classList.remove("hide");
        formErrors.innerHTML = "<ul><li>" + errors.join("</li><li>") + "</li></ul>";
    }
    }
    
    document.getElementById("submit").addEventListener("click", function(event) {
    checkForm();
    // Prevent default form action. DO NOT REMOVE THIS LINE
    event.preventDefault();
    });