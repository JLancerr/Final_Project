<?php
    include('../php/connect.php');

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
        $query = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $query->bind_param("s", $_POST['email']);
        $query->execute();
        $result = $query->get_result();
        $duplicates = $result->fetch_all();
        if (count($duplicates) > 0) {
            header('Location: ../templates/landing.html?error=duplicate_email');
            exit();
        }

        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = $conn->prepare('INSERT INTO users (email, password, name) VALUES (?, ?, ?)');
        $query->bind_param('sss', $_POST['email'], $hashed_password, $_POST['name']);
        $query->execute();

        $conn->commit();
        header('Location: ../templates/landing.html?status=signup_success');
        exit();
    }
    catch (mysqli_sql_exception $exception)  {
        $conn->rollback();
        header('Location: ../templates/landing.html?error=signup_failed');
        exit();
    }
?>