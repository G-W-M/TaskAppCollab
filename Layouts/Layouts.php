<?php
class Layouts {
    public function header($conf) {
        ?>
        <!DOCTYPE html>
        <html lang="en" data-bs-theme="auto">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php echo $conf['site_name']; ?></title>

            <!-- Bootswatch Sketchy Theme -->
            <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/sketchy/bootstrap.min.css" rel="stylesheet">

            <!-- Bootstrap Icons -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

            <!-- Custom CSS -->
            <style>
                body { background-color: #fafafa; }
                .hero-section {
                    background: linear-gradient(135deg, #5a9bd5, #41729f);
                    color: #fff;
                }
                .feature-icon {
                    font-size: 3rem;
                }
                .dashboard-card {
                    transition: transform 0.2s;
                }
                .dashboard-card:hover {
                    transform: scale(1.02);
                }
            </style>
        </head>
        <body>
        <?php
    }

    public function navbar($conf) {
        ?>
        <main>
            <div class="container py-3">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded shadow-sm mb-4">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold" href="./">
                            <i class="bi bi-stack"></i> <?php echo $conf['site_name']; ?>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarMain">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a class="nav-link active" href="./">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="signup.php"><i class="bi bi-person-plus"></i> Sign Up</a></li>
                                <li class="nav-item"><a class="nav-link" href="signin.php"><i class="bi bi-box-arrow-in-right"></i> Sign In</a></li>
                                <li class="nav-item"><a class="nav-link" href="userslist.php"><i class="bi bi-people"></i> Users</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
        <?php
    }

    public function banner() {
        ?>
        <div class="p-5 mb-4 hero-section rounded shadow-sm">
            <div class="container py-5 text-center">
                <h1 class="display-4 fw-bold"><i class="bi bi-envelope-paper-heart"></i> Welcome to Task App</h1>
                <p class="col-lg-8 mx-auto fs-5">
                    Manage accounts easily — Sign up, log in securely, and view your community.
                </p>
                <a href="signup.php" class="btn btn-light btn-lg shadow-sm">
                    <i class="bi bi-person-plus-fill"></i> Get Started
                </a>
            </div>
        </div>
        <?php
    }

    public function formContent($conf, $ObjForms) {
        ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 dashboard-card">
                    <div class="card-body">
                        <?php
                        if (basename($_SERVER['PHP_SELF']) == 'signup.php') {
                            echo "<h4 class='mb-3 text-primary'><i class='bi bi-person-plus-fill'></i> Create Account</h4>";
                            $ObjForms->signup();
                        } elseif (basename($_SERVER['PHP_SELF']) == 'signin.php') {
                            echo "<h4 class='mb-3 text-success'><i class='bi bi-box-arrow-in-right'></i> Login</h4>";
                            $ObjForms->signin();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    // Features section
    public function welcomeBody($conf) {
         ?> 
        <div class="container my-5">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <i class="bi bi-person-plus feature-icon text-primary"></i>
                    <h4 class="mt-3">Create an Account</h4>
                    <p>Quickly register with your name, email, and password.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-shield-lock feature-icon text-success"></i>
                    <h4 class="mt-3">Secure Login</h4>
                    <p>Sign in with OTP verification for extra security.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-people feature-icon text-warning"></i>
                    <h4 class="mt-3">View Users</h4>
                    <p>See all registered users in the system with one click.</p>
                </div>
            </div>
        </div>
    <?php 
    }

    // Example dashboard section
    public function dashboardSample() {
        ?>
        <div class="container my-5">
            <h2 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard Preview</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-person-circle text-primary display-5"></i>
                            <h5 class="mt-2">Users</h5>
                            <p class="text-muted">Manage all registered users.</p>
                            <a href="userslist.php" class="btn btn-outline-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-gear text-success display-5"></i>
                            <h5 class="mt-2">Settings</h5>
                            <p class="text-muted">Update account and system settings.</p>
                            <a href="#" class="btn btn-outline-success btn-sm">Configure</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-bar-chart text-warning display-5"></i>
                            <h5 class="mt-2">Reports</h5>
                            <p class="text-muted">View app usage statistics.</p>
                            <a href="#" class="btn btn-outline-warning btn-sm">View Reports</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function footer($conf) {
        ?>
                <footer class="pt-4 mt-5 text-center text-muted border-top">
                    <small>&copy; <?php echo date("Y") . " " . $conf['site_name']; ?>. All rights reserved.</small>
                </footer>
            </div>
        </main>

        <!-- Bootstrap Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </html>
        <?php
    }
}
