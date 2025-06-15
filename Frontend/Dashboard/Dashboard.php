<?php
    include("../../php/connect.php");
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
            <link rel="stylesheet" href="./Dashboard.css">
            <title>TopHub</title>
        </head>
        <body>
            <section class="header">
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
                                    <ul class="dropdown-menu">
                                        <li><p class="dropdown-header">Account Settings</p></li>
                                        <li><a class="dropdown-item" href="../View/View.php">View Account</a></li>
                                        <li><a class="dropdown-item" href="../Edit/Edit.php">Edit Account</a></li>
                                        <li><a class="dropdown-item" href="../Transactions/Transactions.php">Transactions</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="../../php/logout.php">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </section>
            <section class="searchbar mx-auto">
                <div id="searchbar" class="my-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Games" aria-label="Search Games" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </section>
            <!-- <section class="body-head mx-auto">
                <div id="body-head">
                    <h1 class="text-white" style="font-weight: 800;">Discover New Promos</h1>
                </div>
            </section> -->
            <section class="newarrivals mx-auto">
                <div id="image-carousel" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide p-3" id="genshin"
                                style="
                                    background: linear-gradient(rgba(0, 0, 0, 0.5), 
                                    rgba(0, 0, 0, 0.5)), 
                                    url('../Images/genshin.jpg');"
                                >
                                <h2 class="text-white" style="font-weight: 800;">Autumn Sale 40% off genesis crystals</h2>
                                <div>
                                    <button class="btn btn-primary">
                                        Top-up Now
                                    </button>
                                </div>
                            </li>
                            <li class="splide__slide p-3" id="mlbb"
                                style="
                                    background: linear-gradient(rgba(0, 0, 0, 0.5), 
                                    rgba(0, 0, 0, 0.5)), 
                                    url('../Images/mlbg.jpg');"
                            >
                                <h2 class="text-white" style="font-weight: 800;">New Arrival Lightborn Squad Diamonds 50% off</h2>
                                <div>
                                    <button class="btn btn-primary">
                                        Top-up Now
                                    </button>
                                </div>
                            </li>
                            <li class="splide__slide p-3" id="codm"
                                style="
                                    background: linear-gradient(rgba(0, 0, 0, 0.5), 
                                    rgba(0, 0, 0, 0.5)), 
                                    url('../Images/codm.webp');"
                            >
                                <h2 class="text-white" style="font-weight: 800;">Excalibur Rifle 30% off first purchase</h2>
                                <div>
                                    <button class="btn btn-primary">
                                        Top-up Now
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="games m-5">
                <h2 class="text-white mx-4" style="font-weight: 800;">Games</h2>
                <div class="game-cards">
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col">
                            <div class="card">
                                <img src="../Images/genshin.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Genshin Impact</h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#genshinmodal">
                                        Top Up
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="../Images/valorant.avif" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Valorant</h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#valorantmodal">
                                        Top Up
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="../Images/mlgames.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Mobile Legends</h5>
                                    <a href="#" class="btn btn-primary">Top Up</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="../Images/codmgames.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Call Of Duty</h5>
                                    <a href="#" class="btn btn-primary">Top Up</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="../Images/wildriftgames.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Wild Rift</h5>
                                    <a href="#" class="btn btn-primary">Top Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="featured m-5 border-top">
                <h2 class="text-white" style="font-weight: 800;">Featured Game</h2>
                <div class="article d-flex">
                    <div class="image">
                        <img src="../Images/codmmap.webp">
                    </div>
                    <div class="text mx-4">
                        <h2 class="text-white" style="font-weight: 800;">COD Mobile Season 5: New Multiplayer Map and Mode</h2>
                        <h6 class="text-white">Tropical Vision will drop players into the Apocalypse map, first seen in Call of Duty: Black Ops Cold War. This close-quarters map is built for intense gunfights with the center lane seeing most of the action. There are also multiple interior spaces creating opportunities to ambush unsuspecting enemies. The center lane has the village on one side and the temple on the other, letting players flank enemies with ease.</h6>
                    </div>
                </div>
            </section>
            <section class="Modals">
                <!-- Genshin Impact Modal -->
                <div class="modal fade" id="genshinmodal" tabindex="-1" aria-labelledby="genshinmodallabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header px-0">
                                <img src="../Images/genshinmodal.png" class="img-fluid">
                            </div>
                            <div class="modal-body">
                                <h2 style="font-weight: 800;">Genshin Impact Genesis Crystals</h2>
                                <div class="first-step">
                                    <p>1. Input UID and Server</p>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Input UID" aria-label="Text input with dropdown button">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Choose Server</option>
                                            <option value="1">Asia</option>
                                            <option value="2">Europe</option>
                                            <option value="3">America</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="second-step mb-3">
                                    <p>2. Choose Product</p>
                                    <div class="products">
                                        <div class="row g-3 mb-3">
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">50 Genesis Crystals</span>
                                                        <span class="text-secondary">40php</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">100 Genesis Crystals</span>
                                                        <span class="text-secondary">80php</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">200 Genesis Crystals</span>
                                                        <span class="text-secondary">120php</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">1000 Genesis Crystals</span>
                                                        <span class="text-secondary">600php</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">2500 Genesis Crystals</span>
                                                        <span class="text-secondary">1500php</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">5000 Genesis Crystals</span>
                                                        <span class="text-secondary">3500php</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="third-step">
                                    <p>3. Choose Payment Method</p>
                                    <div class="payments">
                                        <div class="row g-3 mb-3">
                                            <div class="col payment">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/gcash.png" style="width: 50px; height: 50px;">
                                                    <div class="d-flex align-items-center justify-content-center mx-4">
                                                        <span style="font-weight: 700;">GCash</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col payment">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/cc.png" style="width: 50px; height: 50px;">
                                                    <div class="d-flex align-items-center justify-content-center ms-4">
                                                        <span style="font-weight: 700;">Credit Card</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Proceed to Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Valorant Modal -->
                <div class="modal fade" id="valorantmodal" tabindex="-1" aria-labelledby="valorantmodallabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header px-0">
                                <img src="../Images/valorantmodal.jpg" class="img-fluid">
                            </div>
                            <div class="modal-body">
                                <h2 style="font-weight: 800;">Valorant Riot Points</h2>
                                <div class="first-step">
                                    <p>1. Input Riot ID</p>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Input Riot ID" aria-label="Text input with dropdown button">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Choose Server</option>
                                            <option value="1">Asia</option>
                                            <option value="2">Europe</option>
                                            <option value="3">America</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="second-step mb-3">
                                    <p>2. Choose Product</p>
                                    <div class="products">
                                        <div class="row g-3 mb-3">
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/riotpoints.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">50 Genesis Crystals</span>
                                                        <span class="text-secondary">40php</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">100 Genesis Crystals</span>
                                                        <span class="text-secondary">80php</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">200 Genesis Crystals</span>
                                                        <span class="text-secondary">120php</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">1000 Genesis Crystals</span>
                                                        <span class="text-secondary">600php</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">2500 Genesis Crystals</span>
                                                        <span class="text-secondary">1500php</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col product">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/genesiscrystals.png" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <span style="font-weight: 700;">5000 Genesis Crystals</span>
                                                        <span class="text-secondary">3500php</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="third-step">
                                    <p>3. Choose Payment Method</p>
                                    <div class="payments">
                                        <div class="row g-3 mb-3">
                                            <div class="col payment">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/gcash.png" style="width: 50px; height: 50px;">
                                                    <div class="d-flex align-items-center justify-content-center mx-4">
                                                        <span style="font-weight: 700;">GCash</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col payment">
                                                <div class="d-flex border rounded p-2 w-100">
                                                    <img src="../Images/cc.png" style="width: 50px; height: 50px;">
                                                    <div class="d-flex align-items-center justify-content-center ms-4">
                                                        <span style="font-weight: 700;">Credit Card</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Proceed to Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="">
                <footer class="text-center text-white" style="background-color: #2d3047;">
                    <div class="container p-4 pb-0">
                        <section class="">
                            <p class="d-flex justify-content-center align-items-center">
                            <span class="me-3">Top up now for affordable price!</span>
                            <button type="button" class="btn btn-outline-light btn-rounded">
                                Top Up
                            </button>
                            </p>
                        </section>
                    </div>
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2025 Copyright:
                    <a class="text-white" href="#">TopHub.com</a>
                    </div>
                </footer>
            </section>
            <script src="../Modules/popper/popper.min.js"></script>
            <script src="../Modules/bootstrap/js/bootstrap.min.js"></script>
            <script src="../Modules/splide/dist/js/splide.min.js"></script>
            <script src="./Dashboard.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    new Splide('#image-carousel').mount();
                });
            </script>
        </body>
    </html>