<?php
    include('../php/connect.php');

    if (!$_POST['email'] || !$_POST['password'] || !$_POST['full_name'] || !$_POST['username'] || !$_POST['number'] || !$_POST['birthdate']) {
        header('Location: ../Frontend/Register/Register.html?error=missing_inputs');
        exit(); 
    }

    if (strlen($_POST['email']) > 100 || strlen($_POST['password']) > 70 || strlen($_POST['full_name']) > 50 || strlen($_POST['username']) > 50) {
        header('Location: ../Frontend/Register/Register.html?error=length_exceeded');
        exit(); 
    }

    $conn->begin_transaction();
    try {
        # Check for duplicate emails
        $query = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $query->bind_param("s", $_POST['email']);
        $query->execute();
        $result = $query->get_result();
        $duplicates = $result->fetch_all();
        if (count($duplicates) > 0) {
            header('Location: ../Frontend/Register/Register.html?error=duplicate_email');
            exit();
        }
        # Check for duplicate usernames
        $query = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
        $query->bind_param("s", $_POST['username']);
        $query->execute();
        $result = $query->get_result();
        $duplicates = $result->fetch_all();
        if (count($duplicates) > 0) {
            header('Location: ../Frontend/Register/Register.html?error=duplicate_username');
            exit();
        }

        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = $conn->prepare('INSERT INTO users (email, password, full_name, username, number, birthdate) VALUES (?, ?, ?, ?, ?, ?)');
        $query->bind_param('ssssis', $_POST['email'], $hashed_password, $_POST['full_name'], $_POST['username'], $_POST['number'], $_POST['birthdate']);
        $query->execute();

        $conn->commit();
        header('Location: ../Frontend/Register/Register.html?status=signup_success');
        exit();
    }
    catch (mysqli_sql_exception $exception)  {
        $conn->rollback();
        header('Location: ../Frontend/Register/Register.html?error=signup_failed');
        exit();
    }
?>