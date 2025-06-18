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
            <link rel="icon" type="image/x-icon" href="../Images/logo.svg">
            <link rel="stylesheet" href="./Landing.css">
            <title>Welcome | TopHub</title>
        </head>
        <body>
            <section class="container-fluid" id="landing">
                <div class="container-fluid p-0">
                    <nav class="navbar navbar-expand-lg p-0" id="header">
                        <a class="navbar-brand d-flex align-items-center mx-3" id="logo" href="#">
					      <img src="../Images/logo.svg" alt="Logo">
                          <h2 class="mx-3 text-white">TopHub</h2>
					    </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-flex justify-content-between" id="mainMenu">
                            <ul class="navbar-nav text-uppercase">
                                <li class="nav-item mx-2">
                                    <a href="#about" class="nav-link text-white">about us</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a href="#service" class="nav-link text-white">services</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="container-fluid d-flex">
                    <div class="col-lg-6 col-sm-12">
                        <img src="../Images/games.svg" class="rounded-4 shadow-4 img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6 col-sm-12 d-flex flex-column justify-content-center" id="landingtext">
                        <h2 class="text-white text-center">Discover Best Games</h2>
                        <p class="text-white text-center">Easily get what you want in an instant</p>
                        <div class="container d-flex justify-content-center">
                            <button class="btn btn-primary me-3" onclick="location.href = '../Register/Register.php';">Top-up Now</button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="splide p-5" id="top-games">
                <div class="top-games-text text-white">
                    <h1>Discover our top games</h1>
                </div>
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide position-relative">
                            <div class="slide-img">
                                <img src="../Images/codm.png" class="rounded-4" alt="Call Of Duty Logo">
                            </div>
                            <h1 class="text-white mx-2">Call Of Duty</h1>
                            <h1 class="text-white position-absolute rankings">01</h1>
                        </li>
                        <li class="splide__slide position-relative">
                            <div class="slide-img">
                                <img src="../Images/ml.jpg" class="rounded-4" alt="Mobile Legends Logo">
                            </div>
                            <h1 class="text-white mx-2">Mobile Legends</h1>
                            <h1 class="text-white position-absolute rankings">02</h1>
                        </li>
                        <li class="splide__slide position-relative">
                            <div class="slide-img">
                                <img src="../Images/genshin.jpeg" class="rounded-4" alt="Genshin Impact Logo">
                            </div>
                            <h1 class="text-white mx-2">Genshin Impact</h1>
                            <h1 class="text-white position-absolute rankings">03</h1>
                        </li>
                        <li class="splide__slide position-relative">
                            <div class="slide-img">
                                <img src="../Images/hok.jpg" class="rounded-4" alt="Honor of Kings Logo">
                            </div>
                            <h1 class="text-white mx-2">Honor Of Kings</h1>
                            <h1 class="text-white position-absolute rankings">04</h1>
                        </li>
                        <li class="splide__slide position-relative">
                            <div class="slide-img">
                                <img src="../Images/pubg.webp" class="rounded-4" alt="PUBG Logo">
                            </div>
                            <h1 class="text-white mx-2">PUBG Mobile</h1>
                            <h1 class="text-white position-absolute rankings">05</h1>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="py-5 bg-dark text-light">
                <div class="container text-center">
                    <h2 class="mb-5 fw-bold">Why Choose Us</h2>
                    <div class="row g-4">
                    
                    <!-- Feature 1 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card bg-dark border-0 h-100">
                        <div class="card-body text-white text-center">
                            <img src="https://img.icons8.com/fluency/48/fast-cart.png" alt="Fast Delivery" class="mb-3">
                            <h5 class="card-title">Instant Delivery</h5>
                            <p class="card-text">Get your top-up within seconds—no waiting, no hassle.</p>
                        </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card bg-dark border-0 h-100">
                        <div class="card-body text-white text-center">
                            <img src="https://img.icons8.com/fluency/48/lock.png" alt="Secure Payment" class="mb-3">
                            <h5 class="card-title">Secure Payment</h5>
                            <p class="card-text">Your transactions are safe with us using trusted methods.</p>
                        </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card bg-dark border-0 h-100">
                        <div class="card-body text-white text-center">
                            <img src="https://img.icons8.com/fluency/48/user-group-man-man.png" alt="Trusted" class="mb-3">
                            <h5 class="card-title">Trusted by Gamers</h5>
                            <p class="card-text">Thousands of players choose us for fast and easy top-ups.</p>
                        </div>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card bg-dark border-0 h-100">
                        <div class="card-body text-white text-center">
                            <img src="https://img.icons8.com/fluency/48/online-support.png" alt="Support" class="mb-3">
                            <h5 class="card-title">24/7 Support</h5>
                            <p class="card-text">Message us anytime—we're always here to help.</p>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>
            </section>
            <section id="about" class="py-5 bg-dark text-light">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Image Side -->
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="../Images/aboutbg.jpg" alt="About TopHub" class="img-fluid rounded shadow-lg">
                        </div>
                        <!-- Text Side -->
                        <div class="col-lg-6 text-center text-lg-start">
                            <h2 class="display-5 fw-bold mb-3">Who We Are</h2>
                            <p class="lead">
                            <strong>TopHub</strong> is your ultimate destination for discovering the most popular and thrilling games in the world. From action-packed shooters to immersive role-playing adventures, we bring the gaming universe to your fingertips.
                            </p>
                            <p>
                            We provide instant, safe, and reliable top-up services for your favorite games like <strong>Genshin Impact</strong>, <strong>Call of Duty Mobile</strong>, and <strong>Mobile Legends</strong>. No delays, no worries—just seamless experiences with the click of a button.
                            </p>
                            <ul class="list-unstyled mt-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Trusted by thousands of gamers</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Fast and secure transactions</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> 24/7 support from our team</li>
                            </ul>
                            <a href="#services" class="btn btn-primary mt-4 px-4 py-2">Explore Our Services</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="">
                <footer class="text-center text-white" style="background-color: #0a4275;">
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
            <script>
                new Splide('#top-games', {
                type   : 'loop',
                padding: '5rem',
                perPage: 3,         // Number of slides per view
                perMove: 1,         // Number of slides to move per interaction
                gap    : '1rem',    // Gap between slides
                autoplay: true,
                pauseOnHover: true,
                breakpoints: {
                    768: {
                    perPage: 1,
                    },
                },
                }).mount();
            </script>
        </body>
    </html>