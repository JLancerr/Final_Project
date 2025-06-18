<?php
    include('./connect.php');

    # Start transaction
    $conn->begin_transaction();
    try {
        # Retrieve user account 
        $query = $conn->prepare('SELECT * FROM users WHERE username = ?');
        $query->bind_param('s', $_POST['username']);
        $query->execute();
        $user_info = $query->get_result()->fetch_assoc();

        # Commit changes to db
        $conn->commit();
    }
    # If any errors occur during the transaction, abort
    catch (mysqli_sql_exception $exception)  {
        # Undos all changes done
        $conn->rollback();
        header('Location: ../Login/login.php?error=login_failed');
        exit();
    }

    # Check if user exists in the db
    if (empty($user_info)) {
        header('Location: ../Login/login.php?error=account_does_not_exist');
        exit();
    }

    # Check if input password matches the db password
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