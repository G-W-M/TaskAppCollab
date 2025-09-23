<?php
class Forms {
    public function signup() { ?>
        <form method="POST" action="signup.php">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-person-plus"></i> Register
            </button>
        </form>
        <div class="text-center mt-3">
            <small>Already have an account? <a href="signin.php">Sign In</a></small>
        </div>
    <?php }

    public function signin() { ?>
        <form method="POST" action="signin.php">
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
            </div>
            <button type="submit" class="btn btn-success w-100">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
        </form>
        <div class="text-center mt-3">
            <small>Don’t have an account? <a href="signup.php">Sign Up</a></small>
        </div>
    <?php }
}
