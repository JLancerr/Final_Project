<?php
    // Start the session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>


<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Page</title>
            <link rel="stylesheet" href="styles.css">
            <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>
        <body>
            <div class="container-fluid bg-success d-flex justify-content-between align-items-center mb-5 py-2" id="top">
                <div id="bar">
                    <img src="images/logo.png" alt="CVSU LOGO" style="height: 90px;">
                    <div class="container d-flex flex-column justify-content-end" id="nav">
                        <h2 class="text-white">CvSU ManageMe</h2>
                        <p class="text-white">A Cavite State University Student Management System</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <nav class="navbar navbar-expand-sm d-flex justify-content-center">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white text-center mx-4" href="#">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white text-center mx-4" href="#">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white text-center mx-4" href="#">More</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="container" id="main">
                <div class="container bg-success d-flex align-items-center p-3 header">
                    <!-- <img class="img-fluid" src="images/logo.png" alt="CVSU LOGO" width="70"> -->
                    <div class="container d-flex flex-column">
                        <h3 class="text-white account">Account Login</h3>
                        <small class="text-white desc">Login to your Account</small>
                    </div>
                </div>
                <div class="container border shadow p-3 mb-5 bg-white form">
                    <form id="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="mb-3 mt-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your Username" name="username" autocomplete="off" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your Password" name="password" autocomplete="off" required>
                            <div class="invalid-feedback">*Invalid Username or Password!</div>
                        </div>
                        <div class="container d-flex justify-content-center my-3">
                            <button class="btn btn-primary w-50 mx-auto" type="submit" name="submit">Login</button>
                        </div>
                        <div class="container my-3 d-flex justify-content-evenly">
                            <a href="#" class="mt-1">Forgot Password?</a>
                            <a href="../Registration Page/registration.php" class="mt-1">Not Registered?</a>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                us = document.getElementById("username");
                ps = document.getElementById("password");
                fm = document.getElementById("form");
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        </body>
    </html>

<?php

    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                $conn = new mysqli("localhost", "root", "", "students");

                if ($conn->connect_error) {
                    die("Connection Error: " . $conn->connect_error);
                }
                
                $user = $_POST["username"];
                $pass = $_POST["password"];
                
                $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
                $querycheck = $conn -> query($query);

                $_SESSION["username"] = $user;
                $_SESSION["password"] = $pass;

                if ($querycheck -> num_rows > 0) {
                    echo '<script> window.location.href = "../Landing Page/landing.php"; </script>';
                    exit();
                } else {
                    echo '<script>
                            us.value = "";
                            ps.value = "";
                            fm.classList.add("was-validated");
                            us.addEventListener("input", () => {fm.classList.remove("was-validated");})
                            ps.addEventListener("input", () => {fm.classList.remove("was-validated");})
                        </script>';
                }
                $conn -> close();
            }
        }
        exit();
    } catch (Exception $e) {
        $filePath = '../Errors/login-log.txt';
        $file = fopen($filePath, 'w');
        if ($file) {
            fwrite($file, $e);
            fclose($file);
        }
        exit();
    }
?>