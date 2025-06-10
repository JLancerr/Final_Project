<?php
    include('../php/connect.php');
    session_start();

    if (!$_POST['email'] || !$_POST['password'] || !$_POST['name']) {
        header('Location: ../templates/home.php?error=missing_inputs');
        exit(); 
    }

    if (strlen($_POST['email']) > 100 || strlen($_POST['password']) > 70 || strlen($_POST['name']) > 50) {
        header('Location: ../templates/home.php?error=length_exceeded');
        exit(); 
    }

    $conn->begin_transaction();
    try {
        $query = $conn->prepare("SELECT user_id FROM users WHERE email = ? AND NOT user_id = ?");
        $query->bind_param("si", $_POST['email'], $_POST['user_id']);
        $query->execute();
        $result = $query->get_result();
        $duplicates = $result->fetch_all();
        if (count($duplicates) > 0) {
            header('Location: ../templates/home.php?error=duplicate_email');
            exit();
        }

        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = $conn->prepare("UPDATE users SET email = ?, password = ?, name = ? WHERE user_id = ?");
        $query->bind_param("sssi", $_POST['email'], $hashed_password, $_POST['name'], $_POST['user_id']);
        $query->execute();
        $conn->commit();
    }
    catch (mysqli_sql_exception $exception)  {
        $conn->rollback();
        header('Location: ../templates/home.php?error=edit_failed');
        exit();
    }

    $_SESSION['email'] = $_POST['email'];
    $_SESSION['name'] = $_POST['name'];

    header('Location: ../templates/home.php?status=edit_success');
    exit();
?>