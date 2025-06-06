<?php
    include('../php/connect.php');

    if (!$_POST['email'] || !$_POST['password']) {
        header('Location: ../templates/landing.html?error=missing_inputs');
        exit(); 
    }

    $admin_email = "Admin_Monsieur_Neuvillette@gmail.com";
    $admin_password = "AyakaLaosNa";
    if ($_POST['email'] == $admin_email) {
        if ($_POST['password'] == $admin_password) {
            header('Location: ../templates/admin.php');
            exit();
        }
    }

    $query = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $query->bind_param('s', $_POST['email']);
    $query->execute();
    $user_info = $query->get_result()->fetch_assoc();

    if (empty($user_info)) {
        header('Location: ../templates/landing.html?error=login_failed');
        exit();
    }

    if (!password_verify($_POST['password'], $user_info['password'])) {
        header('Location: ../templates/landing.html?error=login_failed');
        exit();
    }

    session_start();
    $_SESSION['user_id'] = $user_info['user_id'];
    $_SESSION['email'] = $user_info['email'];
    $_SESSION['name'] = $user_info['name'];
    
    header('Location: ../templates/home.php');
    exit();
?>