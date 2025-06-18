<?php
    include('./connect.php');

    # Error handlings
    if (!$_POST['user_id'] || !$_POST['game_id'] || !$_POST['product_id'] || !$_POST['account_id'] || !$_POST['purchase_date']) {
        header('Location: ../Dashboard/Dashboard.php?error=transaction_missing_inputs');
        exit(); 
    }
    if (strlen($_POST['account_id']) > 50) {
        header('Location: ../Dashboard/Dashboard.php?error=account_id_length_exceeded');
        exit();
    }

    # Digits are the only chars allows in account ids
    if (!ctype_digit($_POST['account_id'])) {
        header('Location: ../Dashboard/Dashboard.php?error=account_id_digits_only');
        exit();
    }

    # Start transaction
    $conn->begin_transaction();
    try {
        # Retrieve product purchased by user
        $query = $conn->prepare("SELECT price FROM products WHERE product_id = ? AND game_id = ?");
        $query->bind_param("ii", $_POST['product_id'], $_POST['game_id']);
        $query->execute();
        $result = $query->get_result();
        $product_price = $result->fetch_array();

        # Error handling if somehow the game does not feature the product
        if (!$product_price) {
            header('Location: ../Dashboard/Dashboard.php?error=product_game_incompatible');
            exit();
        }

        # Points system 
        $points_value = 150;
        $reward_points = $product_price[0] / $points_value;

        # Update user's points amount
        $query = $conn->prepare("UPDATE users SET points = ? WHERE user_id = ?");
        $query->bind_param("di", $reward_points, $_POST['user_id']);
        $query->execute();

        # Record the transaction in the db
        $query = $conn->prepare("INSERT INTO transactions (user_id, game_id, product_id, account_id, purchase_date, game_amount) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("iiisss", $_POST['user_id'], $_POST['game_id'], $_POST['product_id'], $_POST['account_id'], $_POST['purchase_date'], $_POST['game_amount']);
        $query->execute();

        # Commit changes to db
        $conn->commit();

        header('Location: ../Dashboard/Dashboard.php?status=transaction_successful');
        exit();
    }
    # If any errors occur during the transaction, abort
    catch (mysqli_sql_exception $exception) {
        # Undos all changes done
        $conn->rollback();
        header('Location: ../Dashboard/Dashboard.php?error=transaction_unsuccessful');
        exit();
    }
?>