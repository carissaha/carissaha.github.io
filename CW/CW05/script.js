function validateForm() {
    let userID = document.getElementById("userID").value.trim();
    let firstName = document.getElementById("firstName").value.trim();
    let lastName = document.getElementById("lastName").value.trim();

    let userIDError = document.getElementById("userIDError");
    let firstNameError = document.getElementById("firstNameError");
    let lastNameError = document.getElementById("lastNameError");

    let missingFields = [];

    // Clear previous error messages
    userIDError.innerHTML = "";
    firstNameError.innerHTML = "";
    lastNameError.innerHTML = "";

    // Check for empty fields
    if (userID === "") {
        userIDError.innerHTML = "ID is required!";
        missingFields.push("ID");
    }
    if (firstName === "") {
        firstNameError.innerHTML = "First Name is required!";
        missingFields.push("First Name");
    }
    if (lastName === "") {
        lastNameError.innerHTML = "Last Name is required!";
        missingFields.push("Last Name");
    }

    // If any fields are missing, show an alert and stop execution
    if (missingFields.length > 0) {
        alert("You forgot to fill in the following fields: " + missingFields.join(", "));
        return;
    }

    // If all fields are filled, display the result and clear the form
    let resultDiv = document.getElementById("result");
    resultDiv.innerHTML = `
        <p><strong>UserID:</strong> ${userID}</p>
        <p><strong>First Name:</strong> ${firstName}</p>
        <p><strong>Last Name:</strong> ${lastName}</p>
    `;

    // Clear form inputs
    document.getElementById("userForm").reset();
}