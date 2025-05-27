<?php
    $conn = new mysqli('localhost', 'root', '', 'topup_db');

    $query = $conn->prepare("INSERT INTO transactions (user_id, game_id, account_id, amount) VALUES (?, ?, ?, ?)");
    $query->bind_param("iisi", $_GET['user_id'], $_GET['game_id'], $_GET['account_id'], $_GET['amount']);
    $query->execute();

    header('Location: ../templates/home.php');
?>