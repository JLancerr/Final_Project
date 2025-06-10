<?php
    include('../php/connect.php');
    session_start();

    if (!$_POST['user_id']) {
        header('Location: ../templates/home.php?error=deletion_failed');
        exit(); 
    }

    $conn->begin_transaction();
    try {
        # Delete the user
        $query = $conn->prepare("DELETE FROM users WHERE user_id = ?");
        $query->bind_param("i", $_POST['user_id']);
        $query->execute();

        # Delete the user's transactions
        $query = $conn->prepare("DELETE FROM transactions WHERE user_id = ?");
        $query->bind_param("i", $_POST['user_id']);
        $query->execute();
        $conn->commit();
    }
    catch (mysqli_sql_exception $exception)  {
        $conn->rollback();
        header('Location: ../templates/home.php?error=deletion_failed');
        exit();
    }

    $_SESSION = [];
    session_destroy();
    header('Location: ../templates/landing.html?status=account_deleted');
    exit();
?>