// Toggle password visibility (shared function)
function togglePassword(fieldId, el) {
    const input = document.getElementById(fieldId);
    const icon = el.querySelector("i");
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    } else {
        input.type = "password";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    }
}

// Validate signup form
function validateSignupForm(e) {
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document.getElementById("confirm_password").value.trim();

    // Check password length
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        e.preventDefault();
        return false;
    }

    // Check password match
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        e.preventDefault();
        return false;
    }

    return true;
}

// Validate signin form
function validateSigninForm(e) {
    const password = document.getElementById("login_password").value.trim();

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        e.preventDefault();
        return false;
    }
    return true;
}

// Validate OTP form
function validateOtpForm(e) {
    const otp = document.querySelector("input[name='otp']").value.trim();

    if (!/^\d{6}$/.test(otp)) {
        alert("OTP must be exactly 6 digits.");
        e.preventDefault();
        return false;
    }
    return true;
}

// Attach validations after DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    const signupForm = document.querySelector("form[action='signup.php']");
    if (signupForm) signupForm.addEventListener("submit", validateSignupForm);

    const signinForm = document.querySelector("form[action='signin.php']");
    if (signinForm) signinForm.addEventListener("submit", validateSigninForm);

    const otpForm = document.querySelector("form[action='otp_verify.php']");
    if (otpForm) otpForm.addEventListener("submit", validateOtpForm);
});
