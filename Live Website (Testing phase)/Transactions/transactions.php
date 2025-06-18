<?php
    include('../validation/connect.php');
    session_start();

    try {
        $query = $conn->prepare("SELECT 
            t.transaction_id,
            g.game_name,
            g.currency_name,
            t.game_amount,
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
    }
    catch (mysqli_sql_exception $exception)  {
        header('Location: ../Frontend/Dashboard/Dashboard.php?error=transactions_error');
        exit();
    }
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../Modules/fontawesome/css/fontawesome.css">
            <link rel="stylesheet" href="../Modules/fontawesome/css/brands.css">
            <link rel="stylesheet" href="../Modules/fontawesome/css/solid.css">
            <link rel="stylesheet" href="../Modules/splide/dist/css/splide.min.css">
            <link rel="stylesheet" href="../Modules/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="./transactions.css">
            <link rel="icon" type="image/x-icon" href="../Images/logo.svg">
            <title>TopHub | Transactions</title>
        </head>
        <body>
            <header>
                <div class="container-fluid p-0">
                    <nav class="navbar navbar-expand-lg p-0" id="header">
                        <a class="navbar-brand d-flex align-items-center mx-3" id="logo" href="#">
					      <img src="../Images/logo.svg" alt="Logo">
                          <h2 class="mx-3 text-white">TopHub</h2>
					    </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="mainMenu">
                            <ul class="navbar-nav text-uppercase d-flex justify-content-between w-100">
                                <li class="nav-item m-3">
                                    <ul class="navbar-nav">
                                        <li class="nav-item mx-2">
                                            <a href="../Dashboard/Dashboard.php" class="nav-link text-white">Home</a>
                                        </li>
                                        <li class="nav-item mx-2">
                                            <a href="#About Us" class="nav-link text-white">About Us</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown mx-5 my-auto">
                                    <button class="btn btn-outline-secondary dropdown-toggle view-profile text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-circle-user"></i>
                                        Username
                                    </button>
                                    <ul class="dropdown-menu show">
                                        <li><p class="dropdown-header">Account Settings</p></li>
                                        <li><a class="dropdown-item" href="../View/View.php">View Account</a></li>
                                        <li><a class="dropdown-item" href="../Edit/Edit.php">Edit Account</a></li>
                                        <li><a class="dropdown-item active" href="../Transactions/Transactions.php">Transactions</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="../validation/logout.php">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <main>
                <div class="effect p-5">
                    <div class="container shadow rounded bg-white p-3 w-75 h-100">
                        <div class="container border-bottom mb-3">
                            <h1>Transaction History</h1>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <?php foreach($transaction_history as $record) {?>
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $record['transaction_id']?>" aria-expanded="true">
                                            <?= $record['purchase_date'] ?>
                                        </button>
                                    </h2>
                                    <div id="<?= $record['transaction_id']?>" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Transaction ID</th>
                                                    <th scope="col">Game Name</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Account ID</th>
                                                    <th scope="col">Purchase Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><?php echo $record['transaction_id']?></th>
                                                        <th scope="row"><?php echo $record['game_name']?></th>
                                                        <th scope="row"><?php echo $record['game_amount'] . " " . $record['currency_name']?></th>
                                                        <th scope="row"><?php echo $record['price']?></th>
                                                        <th scope="row"><?php echo $record['account_id']?></th>
                                                        <th scope="row"><?php echo $record['purchase_date']?></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script src="../Modules/popper/popper.min.js"></script>
            <script src="../Modules/bootstrap/js/bootstrap.min.js"></script>
        </body>
    </html>