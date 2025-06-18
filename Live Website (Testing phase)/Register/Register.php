<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./Register.css">
            <link rel="stylesheet" href="../Modules/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../Modules/flatpickr/dist/flatpickr.min.js">
            <link rel="stylesheet" href="../Modules/flatpickr/dist/themes/material_blue.css">
            <script type="module" src="../Modules/flatpickr/dist/flatpickr.min.js"></script>
            <link rel="stylesheet" href="../Modules/fontawesome/css/fontawesome.css">
            <link rel="stylesheet" href="../Modules/fontawesome/css/brands.css">
            <link rel="stylesheet" href="../Modules/fontawesome/css/solid.css">
            <link rel="icon" type="image/x-icon" href="../Images/logo.svg">
            <title>Register | TopHub</title>
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
                <div class="row shadow m-5 p-4 rounded">
                    <div class="banner mb-4">
                        <h2 style="font-weight: 900;">Create Account</h2>
                    </div>
                    <div class="col align-items-center flex-col sign-up" id="registerPanel">
                        <div class="form-wrapper align-items-center">
                            <form class="form sign-up" id="registerForm" action="../validation/register.php" method="POST">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-address-book"></i>
                                    </span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="name" oninput="checkInput(this)" pattern="[A-Za-z\s*]+" title="Names must only contain alphabetic characters only." autocomplete="off" required>
                                        <label for="name" class="form-label">Full Name</label>
                                    </div>
                                </div>
                                    <div class="d-flex mb-3">
                                        <div class="input-group w-50">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-phone"></i>
                                            </span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="number" id="number" placeholder="number" oninput="checkInput(this)" pattern="\d{11}" title="Please enter exactly 11 numeric characters" autocomplete="off" required>
                                                <label for="number" class="form-label">Mobile Number</label>
                                            </div>
                                        </div>
                                        <div class="input-group w-50">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-calendar-days"></i>
                                            </span>
                                            <div class="form-floating">
                                                <input type="date" class="form-control" name="birthdate" id="birthdate" max="2007-01-01" placeholder="number" autocomplete="off" required>
                                                <label for="birthdate" class="form-label">Birthdate</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" oninput="checkInput(this)" autocomplete="off" required>
                                            <label for="email" class="form-label">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-circle-user"></i>
                                        </span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="username" id="regusername" placeholder="username" oninput="checkInput(this)" autocomplete="off" required>
                                            <label for="regusername" class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-key"></i>
                                        </span>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="password" id="regpassword" placeholder="Confirm password" oninput="checkPassword(this)" required>
                                            <label for="regpassword" class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-check-double"></i>
                                        </div>  
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="confirmregpassword" placeholder="Confirm password" oninput="checkPassword(this)" required>
                                            <label for="confirmregpassword" class="form-label">Confirm Password</label>
                                        </div>
                                    </div>
                                    <small id="notmatch" style="color: red; display: none;">*Passwords don't match</small>
                                    <div class="form-check my-2">
                                        <input type="checkbox" class="form-check-input" id="showregpassword" onclick="registershowpassword()"></input>
                                        <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                                    </div>
                                    <button type="submit">Sign up</button>
                                    <p class="text-center my-3">
                                        <span>
                                            Already have an account?
                                        </span>
                                        <a href="../Login/Login.php">
                                            Sign in here
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
            </section>
            <script src="../Modules/popper/popper.min.js"></script>
            <script src="../Modules/bootstrap/js/bootstrap.min.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    flatpickr("#birthdate", {});
                });
            </script>
            <script src="./validate.js"></script>
        </body>
    </html>