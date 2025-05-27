<?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'topup_db');

    # Cost is all in Pesos
    $games_products = [             
        'Genshin Impact' => [
            'currency_name' => 'Genesis Crystals',
            'products' => [ # Cost => Genesis Crystals Amount  
                60 => 55,
                330 => 280,
                1090 => 830,
                2240 => 1670,
                3880 => 2800,
                8080 => 5500
            ]
        ],
        'Mobile Legends' => [
            'currency_name' => 'Diamonds',
            'products' => [ # Cost => Diamonds Amount  
                56 => 47.5,
                112 => 95,
                223 => 190,
                336 => 285,
                570 => 475,
                1163 => 950,
                2398 => 1900,
                6042 => 4750
            ]
        ]
    ];
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
        <a href='../templates/transaction_history.php'>
            Check Transaction History
        </a>
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
            <br>
            Games:
            <br>
            <?php
                $result = $conn->query('SELECT * FROM games');
                $games = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($games as $game_info) {
                    $game_name = $game_info['game_name'];
                    $game_id = $game_info['game_id'];

                    echo "
                    <br>
                    <br>
                    Game name: $game_name
                    <br>
                    Game id: $game_id";

                    $currency_name = $games_products[$game_name]['currency_name'];
                    echo "
                    <div>
                        Currency Name: $currency_name
                    </div>

                    <form method='get' action='../php/process_transaction.php'>
                        <select name='amount'>";

                    foreach ($games_products[$game_name]['products'] as $amount => $cost) {
                        echo "<option value='$amount'> Amount: $amount Cost: $cost </option>";
                    }

                    $user_id = $_SESSION['user_id'];
                    echo "
                        <input name='user_id' value='$user_id' type='hidden'>
                        <input name='game_id' value='$game_id' type='hidden'>
                        <input name='account_id' type='text' placeholder='Account ID'>
                        <input type='submit'>
                        </select>
                    </form>";
                }
            ?>
        </div>
    </body>
</html>