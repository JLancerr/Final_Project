<?php
    include('./connect.php');

    if (!$_POST['user_id'] || !$_POST['game_id'] || !$_POST['product_id'] || !$_POST['account_id'] || !$_POST['purchase_date']) {
        header('Location: ../templates/home.php?error=transaction_missing_inputs');
        exit(); 
    }
    if (strlen($_POST['account_id']) > 50) {
        header('Location: ../templates/home.php?error=account_id_length_exceeded');
        exit();
    }

    $conn->begin_transaction();
    try {
        $query = $conn->prepare("SELECT price FROM products WHERE product_id = ? AND game_id = ?");
        $query->bind_param("ii", $_POST['product_id'], $_POST['game_id']);
        $query->execute();
        $result = $query->get_result();
        $product_price = $result->fetch_array();
        if (!$product_price) {
            header('Location: ../templates/home.php?error=product_game_incompatible');
            exit();
        }

        # Points system 
        $points_value = 150;
        $reward_points = $product_price[0] / $points_value;

        $query = $conn->prepare("UPDATE users SET points = ? WHERE user_id = ?");
        $query->bind_param("di", $reward_points, $_POST['user_id']);
        $query->execute();

        $query = $conn->prepare("INSERT INTO transactions (user_id, game_id, product_id, account_id, purchase_date, game_amount) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("iiisss", $_POST['user_id'], $_POST['game_id'], $_POST['product_id'], $_POST['account_id'], $_POST['purchase_date'], $_POST['game_amount']);
        $query->execute();

        $conn->commit();
        header('Location: ../Dashboard/Dashboard.php?status=transaction_successful');
        exit();
    }
    catch (mysqli_sql_exception $exception) {
        $conn->rollback();
        header('Location: ../templates/home.php?error=transaction_unsuccessful');
        exit();
    }
?>