<?php
    include('../php/connect.php');
    session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Home </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <a href='../php/logout.php'>
            Logout
        </a>
        <br>
        <a href='../templates/transaction_history.php'>
            Check Transaction History
        </a>
        <div>
            User information:
            <br>
            <?php
                echo "
                <form method='post' action='../php/edit_user.php'>
                    <input name='user_id' value='{$_SESSION['user_id']}' type='hidden'>
                    Email: <input name='email' value='{$_SESSION['email']}' required>
                    <br>
                    Name: <input name='name' value='{$_SESSION['name']}' required>
                    <br>
                    Password: <input name='password' required>
                    <input type='submit'>
                </form>
                <form method='post' action='../php/delete_user.php'>
                    <input name='user_id' value='{$_SESSION['user_id']}' type='hidden'>
                    <input value='Delete User?' type='submit'>
                </form>
                ";
            ?>
        </div>

        <div>
            <br>
            Games:
            <br>
            <?php
                $result = $conn->query('SELECT * FROM games');
                $games = $result->fetch_all(MYSQLI_ASSOC);

                foreach ($games as $game_info) {
                    $game_name = $game_info['game_name'];
                    $game_id = $game_info['game_id'];

                    $statement = $conn->prepare('SELECT * FROM products WHERE game_id = ?');
                    $statement->bind_param('i', $game_id);
                    $statement->execute();
                    $result = $statement->get_result();
                    $products = $result->fetch_all(MYSQLI_ASSOC);

                    echo "
                    <br>
                    <br>
                    Game name: $game_name
                    <br>
                    Game id: $game_id";

                    echo "
                    <form method='post' action='../php/process_transaction.php'>
                        <select name='product_id'>";

                    foreach ($products as $product_info) {
                        $product_id = $product_info['product_id'];
                        $product_name = $product_info['product_name'];
                        $price = $product_info['price'];
                        echo "<option value='$product_id'> Amount: $product_name || Cost: $price </option>";
                    }

                    $user_id = $_SESSION['user_id'];
                    $purchase_date = date('Y-m-d'); 
                    echo "
                        <input name='user_id' value='$user_id' type='hidden'>
                        <input name='game_id' value='$game_id' type='hidden'>
                        <input name='purchase_date' value='$purchase_date' type='hidden'>
                        <input name='account_id' type='text' placeholder='Account ID' required>
                        <input type='submit'>
                        </select>
                    </form>";
                }
            ?>
        </div>
    </body>
</html>