<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    try {

        $conn = new mysqli("localhost", "root", "", "students");

        if ($conn->connect_error) {
            die("Connection Error: " . $conn->connect_error);
        }


        $user = $_SESSION["username"];
        $pass = $_SESSION["password"];

        $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
                
        $result = $conn -> query($query);

        $profile = $result -> fetch_assoc();


        $username = $profile["username"];
        $contact = $profile["contact"];
        $first = $profile["firstname"];
        $last = $profile["lastname"];
        $address = $profile["address"];
        $birthdate = $profile["birthdate"];
        $program = $profile["program"];
        $branch = $profile["branch"];
        $imagedata = "";
        $imagesrc = "";

        if (!empty($profile['profile'])) {
            $imagedata = base64_encode($profile['profile']);
            $imagesrc = '"data:image/jpeg;base64,' . $imagedata . '"';
        } else {
            $imagesrc = "images/default.jpg";
        }
        
    } catch (Exception $e) {
        $filePath = '../Errors/landing-log.txt';
        $file = fopen($filePath, 'w');
        if ($file) {
            fwrite($file, $e);
            fclose($file);
        }
        echo '<script> window.location.href = "../Error/error.html"; </script>';
        exit();
    }
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
            <meta http-equiv="Pragma" content="no-cache">
            <meta http-equiv="Expires" content="0">
            <title>CvSU ManageMe</title>
            <link rel="stylesheet" href="style.css">
            <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
            <script>
                function logout() {
                    window.location.href = "../Login Page/login.php";
                }
            </script>
            <script src="tabswitch.js"></script>
            <script src="https://kit.fontawesome.com/f38a153b0a.js" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>
        <body>
            <div class="navigation-bar-container bg-success" id="navbar">
                <nav class="navbar d-flex align-items-start navigation-bar">
                    <div class="container d-flex flex-column align-items-start" id="navigation-links-container">
                        <div class="container d-flex flex-column align-items-center navigation-header">
                            <img src="images/logo.png" alt="CvSU Logo" width="90">
                            <h3 class="text-white text-center">CvSU ManageMe</h3>
                            <small class="text-white text-center">Student Activity Management System</small>
                        </div>
                        <ul class="container-fluid navbar-nav mt-3" id="navigation-links">
                            <li class="nav-item mb-3">
                                <a class="nav-link text-white text-center" onclick="showTab('profile')">
                                    <i class="fa-solid fa-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="nav-link text-white text-center" onclick="showTab('submit-activity')">
                                    <i class="fa-solid fa-file-export"></i>
                                    Submit Activity
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="nav-link text-white text-center" onclick="showTab('other-students')">
                                    <i class="fa-solid fa-users"></i>
                                    Other students
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="nav-link text-white text-center" onclick="showTab('edit-profile')">
                                    <i class="fa-solid fa-sliders"></i>
                                    Edit Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white text-center" onclick="logout()">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container" id="section-container">
                <section id="profile">
                    <div class="container-fluid d-flex justify-content-between align-items-end bg-warning position-relative profile-top-part">
                        <button class="btn btn-success position-absolute top-0 left-0 navButton" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar" style="display: none;"><i class="fa-solid fa-bars"></i></button>
                        <div class="m-3" id="profile-status">
                            <h5 class="text-start">Status:<span class="badge bg-danger">Not Submitted</span></h5>
                        </div>
                        <div class="container-fluid d-flex align-items-end justify-content-center nameplate-container">
                            <div class="container-fluid nameplate" id="nameplate">
                                <h2 class="text-sm-end"><?php echo $last . ", " . $first ?></h2>
                                <p class="text-sm-end"><?php echo $program ?></p>
                            </div>
                            <div>
                                <img src=<?php echo $imagesrc ?> alt="Default Profile Picture" id="previewimg1">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid d-flex flex-column profile-bottom-part">
                        <div class="container-fluid p-5 profile-details">
                            <div class="container-fluid" id="responsive-nameplate" style="display: none !important;">
                                <h2 class="text-center"><?php echo $last . ", " . $first ?></h2>
                                <p class="text-center"><?php echo $program ?></p>
                            </div>
                            <div class="container-fluid m-3" id="responsive-status" style="display: none !important;">
                                <h5 class="text-center">Status:<span class="badge bg-danger">Not Submitted</span></h5>
                            </div>
                            <div class="alert alert-success" id="edit-profile-update" style="display: none;">
                                <strong>Success!</strong> Your profile was updated!
                            </div> 
                            <div class="row profile-info-text">
                                <h3>Profile Information</h3>
                            </div>
                            <div class="row mt-4 input-row">
                                <div class="col-sm-4 mb-3">
                                    <label class="form-label" for="">Username</label>
                                    <input class="form-control" type="text" value="<?php echo $username ?>" style="height: 50px;" disabled>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label class="form-label" for="">Contact</label>
                                    <input class="form-control" type="text" value="<?php echo $contact ?>" style="height: 50px;" disabled>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label class="form-label" for="">Age</label>
                                    <input class="form-control" type="text" value="18 years old" style="height: 50px;" disabled>
                                </div>
                            </div>
                            <div class="row input-row">
                                <div class="col-sm-4 mb-3">
                                    <label class="form-label" for="">First Name</label>
                                    <input class="form-control" type="text" value="<?php echo $first ?>" style="height: 50px;" disabled>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label class="form-label" for="">Last Name</label>
                                    <input class="form-control" type="text" value="<?php echo $last ?>" style="height: 50px;" disabled>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label class="form-label" for="">Student Email</label>
                                    <input class="form-control" type="text" value="<?php echo $first . "." . $last . "@cvsu-main.edu.ph" ?>" style="height: 50px;" disabled>
                                </div>
                            </div>
                            <div class="row input-row">
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label" for="">Address</label>
                                    <input class="form-control" type="text" value="<?php echo $address ?>" style="height: 50px;" disabled>
                                </div>
                            </div>
                            <div class="row input-row">
                                <div class="col-sm-4 mb-3">
                                    <label class="form-label" for="">Birthdate</label>
                                    <input class="form-control" type="text" value="<?php echo $birthdate ?>" style="height: 50px;" disabled>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label class="form-label" for="">Program</label>
                                    <input class="form-control" type="text" value="<?php echo $program ?>" style="height: 50px;" disabled>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label class="form-label" for="">CvSU Branch</label>
                                    <input class="form-control" type="text" value="<?php echo $branch ?>" style="height: 50px;" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="submit-activity">
                    <div class="container-fluid d-flex justify-content-center bg-warning other-students-top-part">
                        <h2>Submit Activities</h2>
                    </div>
                    <div class="container-fluid d-flex align-items-center justify-content-center my-5 submit-card-container">
                        <div class="container-fluid card submit-card" id="submit-card">
                            <div class="card-header bg-warning submit-card-header">
                                <p>Submit Activity</p>
                            </div>
                            <div class="card-body">
                                <h5>Here you can submit your due activities</h5>
                                <p>Pending Tasks</p>
                                <ul>
                                    <li>Take a photo of CvSU Building</li>
                                    <li>Take a photo of yourself exercising</li>
                                </ul>
                                <div class="form-group">
                                    <form id="filesubmit" method="post" action="#">
                                        <label for="fileInput" class="form-label">Choose File</label>
                                        <input type="file" class="form-control" id="fileInput" multiple>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary my-3 w-25" data-bs-toggle="modal" data-bs-target="#submitActivity">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="other-students">
                    <div class="container-fluid d-flex justify-content-center bg-warning other-students-top-part">
                        <h2>Other Students</h2>
                    </div>
                    <div class="container-fluid d-flex flex-column align-items-center student-card-container">
                        <?php
                            $query = "SELECT * FROM users WHERE firstname != '$first' ORDER BY lastname ASC";
                            $students = $conn -> query($query);
                            
                            if (!$students) {
                                echo "Error: " . mysqli_error($conn);
                            }
                        ?>
                        <?php while($row = $students -> fetch_assoc()) { ?>
                            <div class="student-card card my-2 col-sm-5">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <img class="img-fluid" src=<?php echo '"data:image/jpeg;base64,' . base64_encode($row['profile']) . '"';?> alt="Default Picture" id="otherimg">
                                    <p class="ms-2"><?php echo $row["lastname"] . ", " . $row["firstname"] ?></p>
                                    <p class="d-flex flex-column align-items-center">Status:<span class="badge bg-danger mx-2">Not Submitted</span></p> 
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>
                <section id="edit-profile">
                    <div class="container-fluid d-flex justify-content-between align-items-end bg-warning position-relative edit-profile-top-part">
                        <button class="btn btn-success position-absolute top-0 left-0 navButton" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar" style="display: none;"><i class="fa-solid fa-bars"></i></button>
                        <div class="container-fluid d-flex justify-content-start align-items-end nameplate-container">
                            <img src=<?php echo $imagesrc ?> alt="Default Profile Picture" id="previewimg2">
                            <h3>Edit Profile Information</h3>
                        </div>
                    </div>
                    <div class="container-fluid d-flex flex-column edit-profile-bottom-part">
                        <div class="container-fluid p-5 profile-details">
                            <div class="d-flex flex-column responsive-nameplate" style="display: none !important;"></div>
                            <div class="d-flex justify-content-center m-3 responsive-status" style="display: none !important;"></div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" id="editprof">
                                <div class="row my-4 d-flex flex-column profile-input">
                                    <label for="profilepic" class="form-label">Upload Profile Picture</label>
                                    <input class="form-control mx-3" type="file" name="profile" id="profilepic" style="max-width: 300px;">
                                </div>
                                <div class="row input-row">
                                    <div class="col-sm-4 mb-3">
                                        <label class="form-label" for="">Username</label>
                                        <input class="form-control" type="text" value="<?php echo $username ?>" name="username" style="height: 50px;">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label class="form-label" for="">Old Password</label>
                                        <input class="form-control" type="password" name="oldpass" style="height: 50px;">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label class="form-label" for="">New Password</label>
                                        <input class="form-control" type="password" name="newpass"  style="height: 50px;">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-sm-8 mb-3">
                                        <label class="form-label" for="">Address</label>
                                        <input class="form-control" type="text" value="<?php echo $address ?>" name="address" style="height: 50px;">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label class="form-label" for="">Birthdate</label>
                                        <input class="form-control" type="date" value="<?php echo $birthdate ?>" name="birthdate" style="height: 50px;">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-sm-4 mb-3">
                                        <label class="form-label" for="">Contact Number</label>
                                        <input class="form-control" type="number" value="<?php echo $contact ?>" name="contact" style="height: 50px;">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label class="form-label" for="">First Name</label>
                                        <input class="form-control" type="text" value="<?php echo $first ?>" name="firstname" style="height: 50px;">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label class="form-label" for="">Last Name</label>
                                        <input class="form-control" type="text" value="<?php echo $last ?>" name="lastname" style="height: 50px;">
                                    </div>
                                </div>
                                <div class="container-fluid button-container my-4 d-flex justify-content-center p-0">
                                    <input type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#profileEdit" value="Submit Changes"></input>
                                </div>
                                <!-- Confirm Edit Modal -->
                                <div class="modal fade" id="profileEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Changes</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to submit changes?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="editsubmit">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Modals -->
            <!-- Submit Activity Modal -->
            <div class="modal fade" id="submitActivity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Submission</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to submit?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" onclick="submit()">Understood</button>
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

            $username = $_POST["username"];
            $contact = $_POST["contact"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $address = $_POST["address"];
            $birthdate = $_POST["birthdate"];

            // Profile Picture
            if (isset($_FILES["profile"])) {
                if (!empty($_FILES["profile"]["tmp_name"])) {
                    $filedata = file_get_contents($_FILES["profile"]["tmp_name"]);
                    $uploadQuery = "UPDATE users SET profile = ? WHERE firstname = '$first' AND lastname = '$last'";
                    $prepare = $conn -> prepare($uploadQuery);
                    $prepare -> bind_param("s", $filedata);

                    if (!$prepare -> execute()) {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            }

            $query = "UPDATE users SET username = ?, contact = ?, firstname = ?, lastname = ?, address = ?, birthdate = ? WHERE firstname = '$first' AND lastname = '$last'";
            $prepare = $conn -> prepare($query);
            $prepare -> bind_param("ssssss", $username, $contact, $firstname, $lastname, $address, $birthdate);

            $querycheck = $prepare -> execute();

            if ($querycheck) {
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $pass;
                echo '<script> window.location.href = "landing.php"; </script>';
                exit();
            }
        }
    } catch (Exception $e) {
        $filePath = '../Errors/landing-log.txt';
        $file = fopen($filePath, 'w');
        if ($file) {
            fwrite($file, $e);
            fclose($file);
        }
        echo '<script> window.location.href = "../Error/error.html"; </script>';
        exit();
    }
?>
