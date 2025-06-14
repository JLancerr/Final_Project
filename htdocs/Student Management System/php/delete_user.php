<?php
    include('../php/connect.php');
    session_start();

    if (!$_POST['user_id']) {
        header('Location: ../templates/home.php?error=deletion_failed');
        exit(); 
    }

    # Delete the user
    $query = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    $query->bind_param("i", $_POST['user_id']);
    $query->execute();

    # Delete the user's transactions
    $query = $conn->prepare("DELETE FROM transactions WHERE user_id = ?");
    $query->bind_param("i", $_POST['user_id']);
    $query->execute();

    $_SESSION = [];
    session_destroy();
    header('Location: ../templates/landing.html?status=account_deleted');
    exit();
?>