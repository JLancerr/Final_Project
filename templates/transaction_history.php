<?php
    include('../php/connect.php');
    session_start();

    $query = $conn->prepare("SELECT 
        t.transaction_id,
        g.game_name,
        p.product_name,
        p.price,
        t.account_id,
        t.purchase_date
    FROM transactions t
    INNER JOIN users u ON t.user_id = u.user_id
    INNER JOIN games g ON t.game_id = g.game_id
    INNER JOIN products p ON t.product_id = p.product_id
    WHERE u.user_id = ?;");

    $query->bind_param("i", $_SESSION['user_id']);
    $query->execute();
    $result = $query->get_result();
    $transaction_history = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Transaction History </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <div>
            User information:
            <br>
            <?php
                echo 'User ID: ' . $_SESSION['user_id'];
                echo '<br>';
                echo 'Email: ' . $_SESSION['email'];
            ?>
        </div>
        <div>
            <br>
            Records:
            <br>
            <?php
            /* Columns in transaction_history
             *   game_name,
             *   product_name,
             *   price,
             *   account_id,
             *   purchase_date
             */
            /* Ikaw na bahala terrence */
                foreach ($transaction_history as $row) {
                    echo "Game: {$row['game_name']} | ";
                    echo "Product: {$row['product_name']} | ";
                    echo "Price: {$row['price']} | ";
                    echo "Account ID: {$row['account_id']} | ";
                    echo "Date: {$row['purchase_date']}";
                    echo "<br>";
                }
                
            ?>
        </div>
    </body>
</html>