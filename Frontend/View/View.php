<?php
    include('../../php/connect.php');
    session_start();

    try {
        $query = $conn->prepare("SELECT email, password, full_name, username, number, birthdate FROM users WHERE user_id = ?;");
        
        $query->bind_param("i", $_SESSION['user_id']);
        $query->execute();
        $result = $query->get_result();
        $user_info = $result->fetch_all(MYSQLI_ASSOC)[0];
    }
    catch (mysqli_sql_exception $exception)  {
        header('Location: ../Frontend/Dashboard/Dashboard.php?error=unable_to_retrieve_info');
        exit();
    }
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
            <link rel="stylesheet" href="./View.css">
            <title>TopHub | Profile</title>
        </head>
        <body>
            <header>
                <div class="container-fluid p-0">
                    <nav class="navbar navbar-expand-lg p-0" id="header">
                        <a class="navbar-brand d-flex align-items-center mx-3" id="logo" href="#">
					      <img src="../Images/logo.svg" alt="Logo">
                          <h2 class="mx-3 text-white">TopHub</h2>
					    </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="mainMenu">
                            <ul class="navbar-nav text-uppercase d-flex justify-content-between w-100">
                                <li class="nav-item m-3">
                                    <ul class="navbar-nav">
                                        <li class="nav-item mx-2">
                                            <a href="../Dashboard/Dashboard.php" class="nav-link text-white">Home</a>
                                        </li>
                                        <li class="nav-item mx-2">
                                            <a href="#About Us" class="nav-link text-white">About Us</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown mx-5 my-auto">
                                    <button class="btn btn-outline-secondary dropdown-toggle view-profile text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-circle-user"></i>
                                        Username
                                    </button>
                                    <ul class="dropdown-menu show">
                                        <li><p class="dropdown-header">Account Settings</p></li>
                                        <li><a class="dropdown-item" href="../View/View.php">View Account</a></li>
                                        <li><a class="dropdown-item" href="../Edit/Edit.php">Edit Account</a></li>
                                        <li><a class="dropdown-item" href="../Transactions/Transactions.php">Transactions</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="../../php/logout.php">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <main>
                <div class="container-fluid p-5">
                    <div class="container shadow rounded p-3 bg-white" id="viewaccount" style="max-width: 800px;">
                        <div class="container border-bottom my-3">
                            <h1>Account Details</h1>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-address-card"></i>
                            </span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="username" value="<?php echo "{$user_info['full_name']}"?>" placeholder="username" readonly>
                                <label for="username">Full Name</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-cake-candles"></i>
                            </span>
                            <div class="form-floating">
                                <input type="date" class="form-control" id="birthdate" value="<?php echo "{$user_info['birthdate']}"?>" placeholder="username" readonly>
                                <label for="birthdate">Birthdate</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                            <div class="form-floating">
                                <input type="number" class="form-control" id="birthdate" value="<?php echo "{$user_info['number']}"?>" placeholder="username" readonly>
                                <label for="birthdate">Mobile Number</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-envelope-open-text"></i>
                            </span>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" value="<?php echo "{$user_info['email']}"?>" placeholder="username" readonly>
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="username" value="<?php echo "{$user_info['username']}"?>" placeholder="username" readonly>
                                <label for="username">Username</label>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script src="../Modules/popper/popper.min.js"></script>
            <script src="../Modules/bootstrap/js/bootstrap.min.js"></script>
        </body>
    </html>