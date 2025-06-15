<?php
    $error = $_GET['error'] ?? '';
    $success = $_GET['success'] ?? '';
    $messages = [
        'account_does_not_exist' => '*Invalid username or password.',
        'password_error' => '*Account Password Incorrect',
    ];
    $succmess = ['signup_success' => 'Registration Successful'];
 ?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../Modules/fontawesome/css/fontawesome.css">
            <link rel="stylesheet" href="../Modules/fontawesome/css/brands.css">
            <link rel="stylesheet" href="../Modules/fontawesome/css/solid.css">
            <link rel="stylesheet" href="../Modules/splide/dist/css/splide.min.css">
            <link rel="stylesheet" href="../Modules/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="./Login.css">
            <script>
                window.onload = function() {
                    const errorMsg = <?= json_encode($messages[$error] ?? '') ?>;
                    const success = <?= json_encode($succmess[$success] ?? '') ?>;
                    if (errorMsg) {
                        const username = document.getElementById("username");
                        const password = document.getElementById("password");
                        const error_mess = document.getElementById("error_message");
                        error_mess.style.display = "block";
                        username.style.border = "1px solid red";
                        password.style.border = "1px solid red";
                        username.addEventListener("input", () => {
                            username.style.border = "1px solid grey";
                            password.style.border = "1px solid grey";
                            error_mess.style.display = "none";
                        });
                        password.addEventListener("input", () => {
                            username.style.border = "1px solid grey";
                            password.style.border = "1px solid grey";
                            error_mess.style.display = "none";
                        });
                    }

                    if (success) {
                        const successMessage = document.getElementById('successregister');
                        successMessage.classList.remove("d-none");
                        setTimeout(() => {
                            successMessage.classList.add("d-none");
                        }, 3000);
                    }
                }
            </script>
            <title>Login | TopHub</title>
        </head>
        <body>
            <section id="header">
                <div class="container-fluid p-0">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="navbar-brand d-flex align-items-center mx-3" id="logo" href="#">
					      <img src="../Images/logo.svg" alt="Logo">
                          <h2 class="mx-3 text-white">TopHub</h2>
					    </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="mainMenu">
                            <ul class="navbar-nav text-uppercase">
                                <li class="nav-item mx-2">
                                    <a href="#about" class="nav-link text-white">about us</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a href="#service" class="nav-link text-white">services</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </section>
            <section id="form">
                <div class="col align-items-center flex-col sign-in shadow m-5 p-4 rounded" id="singin">
                    <div class="alert alert-success d-flex align-items-center d-none" id="successregister" role="alert">
                        <div>
                            Registration Successful
                        </div>
                    </div>
                    <div class="banner mb-4">
                        <h2 style="font-weight: 900;">Login</h2>
                    </div>
                    <form class="form-wrapper" action="../validation/login.php" method="POST">
                        <div class="form sign-in">
                            <div class="input-group mb-4">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                                    <label for="username" class="form-label">Username</label>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-key"></i>
                                </span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <label for="password" class="form-label">Password</label>
                                </div>
                            </div>
                            <div class="form-check my-2">
                                <input type="checkbox" name="checkbox" class="form-check-input" id="showpassword"></input>
                                <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                            </div>
                            <small class="form-text text-danger text-start" style="display: none;" id="error_message"><?= $messages[$error] ?></small>
                            <button class="mt-1" type="submit">Sign in</button>
                            <p class="text-center my-2">
                                <a href="#">Forgot password?</a>
                            </p>
                            <p class="text-center">
                                <span>
                                    Don't have an account?
                                </span>
                                <a href="../Register/Register.php">Sign up here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </section>
            <script src="../Modules/popper/popper.min.js"></script>
            <script src="../Modules/bootstrap/js/bootstrap.min.js"></script>
            <script src="./validation.js"></script>
        </body>
    </html>