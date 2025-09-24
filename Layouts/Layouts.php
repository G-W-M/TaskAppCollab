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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Bootstrap Icons -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        </head>
        <body class="bg-light">
        <?php
    }

    public function navbar($conf) {
        ?>
        <main>
            <div class="container py-4">
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
                                <li class="nav-item"><a class="nav-link" href="./">Home</a></li>
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
        <div class="p-5 mb-4 bg-primary text-white rounded shadow-sm">
            <div class="container py-5">
                <h1 class="display-5 fw-bold"><i class="bi bi-envelope-paper-heart"></i> Welcome to Task App</h1>
                <p class="col-md-8 fs-5">Register, sign in, and view your fellow users below.</p>
                <a href="signup.php" class="btn btn-light btn-lg shadow-sm">
                    <i class="bi bi-person-plus-fill"></i> Get Started
                </a>
            </div>
        </div>
        <?php
    }

    public function form_content($conf, $ObjForms) {
        ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <?php
                        if (basename($_SERVER['PHP_SELF']) == 'signup.php') {
                            echo "<h4 class='mb-3 text-primary'><i class='bi bi-person-plus-fill'></i> Sign Up</h4>";
                            $ObjForms->signup();
                        } elseif (basename($_SERVER['PHP_SELF']) == 'signin.php') {
                            echo "<h4 class='mb-3 text-success'><i class='bi bi-box-arrow-in-right'></i> Sign In</h4>";
                            $ObjForms->signin();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
// Welcome banner section
    public function welcome_banner($conf) { ?>
        <div class="p-5 mb-4 bg-primary text-white rounded shadow-sm">
            <div class="container py-5">
                <h1 class="display-5 fw-bold">
                    <i class="bi bi-stack"></i> Welcome to <?php echo $conf['site_name']; ?>
                </h1>
                <p class="col-md-8 fs-5">
                    A simple task app where you can sign up, sign in, and view users.
                </p>
                <a href="signup.php" class="btn btn-light btn-lg shadow-sm me-2">
                    <i class="bi bi-person-plus-fill"></i> Sign Up
                </a>
                <a href="signin.php" class="btn btn-success btn-lg shadow-sm">
                    <i class="bi bi-box-arrow-in-right"></i> Sign In
                </a>
                <a href="userslist.php" class="btn btn-warning btn-lg shadow-sm ms-2">
                    <i class="bi bi-people"></i> Users
                </a>
            </div>
        </div>
    <?php 
    }

    // Body  section
    public function welcome_body($conf) { ?> 
        <div class="container mb-5">
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="bi bi-person-plus display-4 text-primary"></i>
                    <h4 class="mt-3">Create an Account</h4>
                    <p>Quickly register with your name, email, and password.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-box-arrow-in-right display-4 text-success"></i>
                    <h4 class="mt-3">Secure Login</h4>
                    <p>Sign in with OTP verification for extra security.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-people display-4 text-warning"></i>
                    <h4 class="mt-3">View Users</h4>
                    <p>See all registered users in the system with one click.</p>
                </div>
            </div>
        </div>
    <?php 
}

    public function footer($conf) {
        ?>
                <footer class="pt-4 mt-5 text-center text-muted border-top">
                    <small>Copyright &copy; <?php echo date("Y") . " " . $conf['site_name']; ?></small>
                </footer>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    }
}
