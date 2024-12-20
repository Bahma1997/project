function validateForm() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorMessage = document.getElementById("error-message");

    // Simple validation check
    if (username === "" || password === "") {
        errorMessage.textContent = "Username and password are required.";
        return false;
    }
    
    // Example credentials (in a real-world application, this would be handled server-side)
    if (username === "user" && password === "password123") {
        window.location.href = "dashboard.html"; // Redirect to a dashboard or home page
        return true;
    } else {
        errorMessage.textContent = "Invalid username or password.";
        return false;
    }
}
