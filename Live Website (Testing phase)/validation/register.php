<?php
    include('./connect.php');

    # Error handlings
    if (!$_POST['email'] || !$_POST['password'] || !$_POST['name'] || !$_POST['number'] || !$_POST['birthdate'] || !$_POST['username']) {
        header('Location: ../Register/Register.php?error=missing_inputs');
        exit(); 
    }
    if (strlen($_POST['email']) > 100 || strlen($_POST['password']) > 70 || strlen($_POST['name']) > 50) {
        header('Location: ../Register/Register.php?error=length_exceeded');
        exit(); 
    }

    # Start transaction
    $conn->begin_transaction();
    try {
        // Check Duplicate Accounts
        $query = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $query->bind_param("s", $_POST['email']);
        $query->execute();
        $result = $query->get_result();
        $duplicates = $result->fetch_all();

        # User cannot create account with already existing email or username
        if (count($duplicates) > 0) {
            header('Location: ../Register/Register.php?error=duplicate_email');
            exit();
        }

        // Variables
        $fullname = $_POST['name'];
        $number = $_POST['number'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        # Encrypt the password for security reasons
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        # Create the account and record it in the db
        $query = $conn->prepare('INSERT INTO users (email, password, full_name, username, number, birthdate) VALUES (?, ?, ?, ?, ?, ?)');
        $query->bind_param('ssssss', $email, $hashed_password, $fullname, $username, $number, $birthdate);
        $query->execute();

        # Commit changes to db
        $conn->commit();
        header('Location: ../Login/Login.php?success=signup_success');
        exit();
    }
    # If any errors occur during the transaction, abort
    catch (mysqli_sql_exception $exception)  {
        # Undos all changes done
        $conn->rollback();
        header('Location: ../Register/Register.php?error=signup_failed');
        exit();
    }
?>