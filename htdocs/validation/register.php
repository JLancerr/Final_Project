<?php
    include('./connect.php');

    if (!$_POST['email'] || !$_POST['password'] || !$_POST['name']) {
        header('Location: ../templates/landing.html?error=missing_inputs');
        exit(); 
    }

    if (strlen($_POST['email']) > 100 || strlen($_POST['password']) > 70 || strlen($_POST['name']) > 50) {
        header('Location: ../templates/landing.html?error=length_exceeded');
        exit(); 
    }

    $conn->begin_transaction();
    try {
        // Check Duplicate Accounts
        $query = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $query->bind_param("s", $_POST['email']);
        $query->execute();
        $result = $query->get_result();
        $duplicates = $result->fetch_all();
        if (count($duplicates) > 0) {
            header('Location: ../templates/landing.html?error=duplicate_email');
            exit();
        }

        // Variables
        $fullname = $_POST['name'];
        $number = $_POST['number'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = $conn->prepare('INSERT INTO users (email, password, full_name, username, number, birthdate) VALUES (?, ?, ?, ?, ?, ?)');
        $query->bind_param('ssssss', $email, $hashed_password, $fullname, $username, $number, $birthdate);
        $query->execute();

        $conn->commit();
        header('Location: ../Login/Login.php?success=signup_success');
        exit();
    }
    catch (mysqli_sql_exception $exception)  {
        $conn->rollback();
        header('Location: ../templates/landing.html?error=signup_failed');
        exit();
    }
?>