<?php
    try {
        $conn = new mysqli("localhost", "root", "", "students");

        if ($conn->connect_error) {
            die("Connection Error: " . $conn->connect_error);
        }    
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {    
            $firstname = $_POST["first"];
            $lastname = $_POST["last"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $age = $_POST["age"];
            $birthdate = $_POST["birthdate"];
            $program = $_POST["program"];
            $branch = $_POST["branch"];

            $query = 'UPDATE users SET firstname = ?, lastname = ?, email = ?, address = ?, age = ?, birthdate = ?, program = ?, branch = ? WHERE firstname = "$first" AND lastname = "$last"';
            $prepare = $conn -> prepare($query);
            $prepare -> bind_param("ssssssss", $firstname, $lastname, $email, $address, $age, $birthdate, $program, $branch);

            $querycheck = $prepare -> execute();

            if ($querycheck) {
                echo "<script> alert('Update Success'); </script>";
                header("Location: landing.php");
                exit();
            } else {
                echo "<script> alert('Not success!'); </script>";
            }
        } else {
            echo "<script> alert('no requestmethod'); </script>";
        }

        $conn -> close();
    } catch (Exception $e) {
        $filePath = '../Errors/edit-log.txt';
        $file = fopen($filePath, 'w');
        if ($file) {
            fwrite($file, $e);
            fclose($file);
        }
        echo '<script> window.location.href = "../Error/error.html"; </script>';
        exit();
    }
?>