function handleFormSubmit(event) {
    event.preventDefault(); // Prevent form submission

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const subject = document.getElementById("subject").value.trim();
    const message = document.getElementById("message").value.trim();
    const successMessage = document.getElementById("success-message");

    // Basic validation
    if (!name || !email || !subject || !message) {
        alert("يرجى ملء جميع الحقول.");
        return false;
    }

    if (!validateEmail(email)) {
        alert("يرجى إدخال بريد إلكتروني صالح.");
        return false;
    }

    // Simulate sending the form (e.g., API request)
    successMessage.textContent = "تم إرسال رسالتك بنجاح. شكراً لتواصلك معنا!";
    clearForm();
}

function validateEmail(email) {
    const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
    return emailPattern.test(email);
}

function clearForm() {
    document.getElementById("contact-form").reset();
}
