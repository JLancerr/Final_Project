<?php
    $conn = new mysqli('localhost', 'root', '', 'topup_db');

    $query = $conn->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
    $query->bind_param('ss', $_POST['email'], $_POST['password']);
    $query->execute();

    header('Location: ../index.php');
    exit();
?>