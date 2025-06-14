<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registration Page</title>
            <script src="formcheck.js"></script>
            <link rel="stylesheet" href="styles.css">
            <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            <div class="container my-5" id="main">
                <div class="container bg-success d-flex align-items-center p-3 header">
                    <div class="container d-flex flex-column">
                        <h3 class="text-white account">Account Registration</h3>
                        <small class="text-white desc">Complete CvSU Account Registration</small>
                    </div>
                </div>
                <div class="container border shadow p-3 mb-5 bg-white form">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="row">
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your Username" name="username" oninput="check(this)" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                    <p>*Username should be alphanumerical</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="contact" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contact" pattern="[0-9]{11}" placeholder="Enter your Contact Number" name="contact" oninput="check(this)" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                    <p>*Contact Number should be in PH Format</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" placeholder="Enter your First Name" name="firstname" oninput="check(this)" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                    <p>*First name should be alphanumerical</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Enter your Last Name" name="lastname" oninput="check(this)" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                    <p>*Last name should be alphanumerical</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your Password" name="password" oninput="checkPass(this)" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                    <p>*Password should be alphanumerical</p>
                                    <p>*Password should contain a minimum of 8 characters</p>
                                    <p>*Passwords should match</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="confirm" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm" placeholder="Confirm your Password" oninput="checkPass(this)" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                    <p for="#">*Passwords should match</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 mt-3 col-sm-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter your complete address" name="address" oninput="check(this)" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="email" class="form-label">Personal Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email address" name="email" oninput="check(this)" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                    <p>*Invalid Format</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" placeholder="Enter Birthdate" name="birthdate" oninput="check(this)" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="program" class="form-label">Program</label>
                                <input type="text" class="form-control" id="program" placeholder="Enter your Program" name="program" oninput="check(this)" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    <p>*Required</p>
                                </div>
                                <div class="valid-feedback">Valid</div>
                            </div>
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="branch" class="form-label">CvSU Branch</label>
                                <select class="form-select" name="branch" required>
                                    <option value="Indang-Main Campus">Indang-Main Campus</option>
                                    <option value="Trece Martirez Campus">Trece Martirez Campus</option>
                                    <option value="Tanza Campus">Tanza Campus</option>
                                    <option value="Silang Campus">Silang Campus</option>
                                    <option value="Imus Campus">Imus Campus</option>
                                    <option value="General Trias Campus">General Trias Campus</option>
                                    <option value="Carmona Campus">Carmona Campus</option>
                                    <option value="Cavite City Campus">Cavite City Campus</option>
                                </select>
                            </div>
                        </div>
                        <div class="container d-flex flex-column align-items-center my-3 ">
                            <button class="btn btn-primary" type="submit" name="submit">Register Account</button>
                            <a href="../Login Page/login.php" class="my-2">Already Registered?</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- The Modal -->
            <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Info</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                
                        <!-- Modal body -->
                        <div class="modal-body">
                            Account Registration Successful!
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="redirect()">Proceed to Login</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        </body>
    </html>

<?php
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {

                $servername = "localhost";
                $username = "root";  // Change if needed
                $password = "";       // Change if needed
                $dbname = "students"; // Change to your preferred database name

                // Create connection (without database)
                $conn = new mysqli($servername, $username, $password);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Create database if not exists
                $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
                if ($conn->query($sql) === FALSE) {
                    die("Error creating database: " . $conn->error);
                }

                // Select the database
                $conn->select_db($dbname);

                // SQL query to create the table
                $sql = "CREATE TABLE IF NOT EXISTS users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL UNIQUE,
                    contact VARCHAR(20) NOT NULL,
                    firstname VARCHAR(50) NOT NULL,
                    lastname VARCHAR(50) NOT NULL,
                    password VARCHAR(255) NOT NULL,
                    address TEXT NOT NULL,
                    email VARCHAR(100) NOT NULL UNIQUE,
                    birthdate DATE NOT NULL,
                    program VARCHAR(100) NOT NULL,
                    branch VARCHAR(100) NOT NULL,
                    profile LONGBLOB NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

                // Execute the query
                if ($conn->query($sql) === FALSE) {
                    die("Error creating table: " . $conn->error);
                }

                $username = $_POST["username"];
                $contact = $_POST["contact"];
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $password = $_POST["password"];
                $address = $_POST["address"];
                $email = $_POST["email"];
                $birthdate = $_POST["birthdate"];
                $program = $_POST["program"];
                $branch = $_POST["branch"];

                $query = "INSERT INTO users (username, contact, firstname, lastname, password, address, email, birthdate, program, branch) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $prepare = $conn -> prepare($query);
                $prepare -> bind_param("ssssssssss", $username, $contact, $firstname, $lastname, $password, $address, $email, $birthdate, $program, $branch);

                if ($prepare -> execute()) {
                    echo "<script>";
                    echo "$(document).ready(function(){";
                    echo "$('#myModal').modal('show');});";
                    echo "</script>";
                }

                $prepare -> close();
                $conn -> close();
                exit();
            }
        }
    } catch (Exception $e) {
        $filePath = '../Errors/registration-log.txt';
        $file = fopen($filePath, 'w');
        if ($file) {
            fwrite($file, $e);
            fclose($file);
        }
        exit();
    }
?>