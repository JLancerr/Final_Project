<?php
    include('./connect.php');

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
        header('Location: ../templates/landing.html?error=login_failed');
        exit();
    }

    if (empty($user_info)) {
        header('Location: ../Login/login.php?error=account_does_not_exist');
        exit();
    }

    if (!password_verify($_POST['password'], $user_info['password'])) {
        header('Location: ../Login/login.php?error=password_error');
        exit();
    }

    session_start();
    $_SESSION['user_id'] = $user_info['user_id'];
    $_SESSION['email'] = $user_info['email'];
    $_SESSION['username'] = $user_info['username'];
    
    header('Location: ../Dashboard/Dashboard.php');
    exit();

?>