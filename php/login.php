<?php
    include('../php/connect.php');

    if (!$_POST['username'] || !$_POST['password']) {
        header('Location: ../Frontend/Login/Login.html?error=missing_inputs');
        exit(); 
    }


    $admin_email = "admin@gmail.com";
    $admin_password = "Ayucka";
    if ($_POST['username'] == $admin_email) {
        if ($_POST['password'] == $admin_password) {
            header('Location: ../templates/admin.php'); 
            exit();
        }
    }

    $conn->begin_transaction();
    
    try {
        $query = $conn->prepare('SELECT * FROM users WHERE username = ?');
        $query->bind_param('s', $_POST['username']);
        $query->execute();
        $user_info = $query->get_result()->fetch_assoc();
        $conn->commit();
    }
    catch (mysqli_sql_exception $exception)  {
        $conn->rollback();
        header('Location: ../Frontend/Login/Login.html?error=login_failed');
        exit();
    }

    if (empty($user_info)) {
        header('Location: ../Frontend/Login/Login.html?error=login_failed');
        exit();
    }

    if (!password_verify($_POST['password'], $user_info['password'])) {
        header('Location: ../Frontend/Login/Login.html?error=login_failed');
        exit();
    }

    session_start();
    $_SESSION['user_id'] = $user_info['user_id'];
    
    header('Location: ../Frontend/Dashboard/Dashboard.php');
    exit();

?>