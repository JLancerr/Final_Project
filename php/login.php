<?php
    $conn = new mysqli('localhost', 'root', '', 'topup_db');

    $query = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $query->bind_param('s', $_POST['email']);
    $query->execute();
    $user_info = $query->get_result()->fetch_assoc();

    session_start();
    $_SESSION['user_id'] = $user_info['user_id'];
    $_SESSION['email'] = $user_info['email'];
    $_SESSION['password'] = $user_info['password'];
    
    header('Location: ../templates/home.php');
    exit();
?>