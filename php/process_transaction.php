<?php
    include('../php/connect.php');

    if (!$_POST['user_id'] || !$_POST['game_id'] || !$_POST['product_id'] || !$_POST['account_id'] || !$_POST['purchase_date']) {
        header('Location: ../templates/home.php?error=transaction_missing_inputs');
        exit(); 
    }
    if (strlen($_POST['account_id']) > 50) {
        header('Location: ../templates/home.php?error=account_id_length_exceeded');
        exit();
    }
    $query = $conn->prepare("INSERT INTO transactions (user_id, game_id, product_id, account_id, purchase_date) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param("iiiss", $_POST['user_id'], $_POST['game_id'], $_POST['product_id'], $_POST['account_id'], $_POST['purchase_date']);
    $query->execute();

    header('Location: ../templates/home.php?status=transaction_successful');
    exit();
?>