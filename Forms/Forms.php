<?php
class Forms {
    // Signup form
    public function signup() { ?>
        <form method="POST" action="signup.php" class="p-4 border rounded bg-light">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Create a password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-person-plus"></i> Register
            </button>
        </form>
        <div class="text-center mt-3">
            <small>Already have an account? <a href="signin.php">Sign In</a></small>
        </div>
    <?php }

    // Signin form
    public function signin() { ?>
        <form method="POST" action="signin.php" class="p-4 border rounded bg-light">
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-success w-100">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
        </form>
        <div class="text-center mt-3">
            <small>Don’t have an account? <a href="signup.php">Sign Up</a></small>
        </div>
    <?php }

    // OTP form
    public function otpForm() { ?>
        <form method="POST" action="otp_verify.php" class="p-4 border rounded bg-light">
            <div class="mb-3">
                <label class="form-label">Enter OTP</label>
                <input type="text" name="otp" class="form-control" placeholder="6-digit code" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">
                <i class="bi bi-shield-lock"></i> Verify OTP
            </button>
        </form>
    <?php }
}
?>
