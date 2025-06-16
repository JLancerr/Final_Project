<?php
    include('../php/connect.php');

    $result = $conn->query("SELECT 
        t.transaction_id,
        u.name,
        u.user_id,
        u.email,
        g.game_name,
        p.product_name,
        p.price,
        t.account_id,
        t.purchase_date
    FROM transactions t
    INNER JOIN users u ON t.user_id = u.user_id
    INNER JOIN games g ON t.game_id = g.game_id
    INNER JOIN products p ON t.product_id = p.product_id;");
    $all_transactions = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <div>
            <?php
                foreach ($all_transactions as $row) {
                    foreach ($row as $key => $value) {
                        if (!$value) {
                            echo "$key: NULL | ";
                        }
                        else {
                            echo "$key: $value | ";
                        }
                    }
                    echo "<br>";
                }
            ?>
        </div>
    </body>
</html>