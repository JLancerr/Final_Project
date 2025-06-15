<?php 
    // include('./validation/connect.php');
    
    // $query = "SELECT products.game_id, games.currency_name, products.amount, products.price FROM products LEFT JOIN games ON games.game_id = products.game_id;";
    // $queryresult = $conn->query($query);

    // $currencies = [];
    // if ($queryresult->num_rows > 0) {
    //     while($row = $queryresult->fetch_assoc()) {
    //         $currencies[] = $row;
    //     }
    // } else {
    //     echo "No results found.";
    // }

    // foreach ($currencies as $curr) {
    //     echo htmlspecialchars($curr['currency_name']);
    // }
    
                                                        
    header('Location: ./Landing/Landing.php');
    exit();
?>