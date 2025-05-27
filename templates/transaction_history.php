<?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'topup_db');

    $query = $conn->prepare("SELECT * FROM transactions WHERE user_id = ?");
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
                echo 'Email: ' . $_SESSION['email'];
                echo '<br>';
                echo 'Password: ' . $_SESSION['password'];
            ?>
        </div>

        <div>
            <?php
                foreach ($transaction_history as $row) {
                    foreach ($row as $cell) {
                        if ($cell) {
                            echo "$cell ";
                        }
                        else {
                            echo "NULL ";
                        }
                    }
                    echo "<br>";
                }
            ?>
        </div>
    </body>
</html>