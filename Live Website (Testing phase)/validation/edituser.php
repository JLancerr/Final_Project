<?php
    include('../validation/connect.php');
    session_start();

    # Error handlings
    if (!$_POST['email'] || !$_POST['full_name'] || !$_POST['birthdate'] || !$_POST['username'] || !$_POST['number']) {
        header('Location: ../Edit/Edit.php?error=missing_inputs');
        exit(); 
    }
    if (strlen($_POST['email']) > 100 || strlen($_POST['full_name']) > 50 || strlen($_POST['username']) > 50) {
        header('Location: ../Edit/Edit.php?error=length_exceeded');
        exit(); 
    }

    # Start transaction
    $conn->begin_transaction();
    try {
        # Check duplicate records with same email or username
        $query = $conn->prepare("SELECT user_id FROM users WHERE (email = ? OR username = ?) AND NOT user_id = ?");
        $query->bind_param("ssi", $_POST['email'], $_POST['username'], $_SESSION['user_id']);
        $query->execute();
        $result = $query->get_result();
        $duplicates = $result->fetch_all();

        # Duplicate emails or usernames are not allowed
        if (count($duplicates) > 0) {
            header('Location: ../Edit/Edit.php?error=duplicate_email_or_username');
            exit();
        }

        # Optionally edit password if inputted by user
        if ($_POST['password'] && $_POST['new_password']) {
            $query = $conn->prepare("SELECT password FROM users WHERE user_id = ?");
            $query->bind_param("i", $_SESSION['user_id']);
            $query->execute();
            $result = $query->get_result();
            $current_password = $result->fetch_assoc()['password'];

            # Before changing password, check if user correctly inputted their old password
            if (password_verify($_POST['password'], $current_password)) {

                # Update password
                $hashed_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                $query = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
                $query->bind_param("si", $hashed_password, $_SESSION['user_id']);
                $query->execute();
            }
            else {
                header('Location: ../Edit/Edit.php?error=password_incorrect');
                exit();
            }
        }

        # Updates user info
        $query = $conn->prepare("UPDATE users SET email = ?, full_name = ?, username = ?, number = ?, birthdate = ? WHERE user_id = ?");
        $query->bind_param("sssisi", $_POST['email'], $_POST['full_name'], $_POST['username'], $_POST['number'], $_POST['birthdate'], $_SESSION['user_id']);
        $query->execute();

        # Commit changes to db
        $conn->commit();
    }
    # If any errors occur during the transaction, abort
    catch (mysqli_sql_exception $exception)  {
        # Undos all changes done
        $conn->rollback();
        header('Location: ../Edit/Edit.php?error=edit_failed');
        exit();
    }

    header('Location: ../Edit/Edit.php?status=edit_success');
    exit();
?>