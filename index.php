<?php
    include_once('settings/session.php');
    include_once('settings/utils.php');
    include_once('projects/functions.php');

    $projects = getProjects($mysqli);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Fund Me</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/css/font-awesome/css/all.min.css">    

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="./assets/js/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/js/owl-carousel/assets/owl.theme.default.min.css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg px-lg-5 px-2 py-4 py-lg-5 navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <h3>
                    Fund Me
                </h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-4 active" aria-current="page" href="#">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-4" href="/projects">
                            Discover Project
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-4" href="#">
                            About Us
                        </a>
                    </li>
                    <?php
                        if ($is_logged_in) {
                    ?>
                        <li class="nav-item mt-2 mt-lg-0 ms-lg-3">
                            <a class="btn button-primary w-100 btn-lg fs-6" href="./logout/index.php">
                                Login As : <?= $user['first_name'] ?>
                            </a>
                        </li>
                    <?php
                        } else {
                    ?>
                        <li class="nav-item mt-2 mt-lg-0 ms-lg-3">
                            <a class="btn button-primary w-100 btn-lg fs-6" href="./login/index.php">
                                Login
                            </a>
                        </li>
                    <?php 
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main>
        <!-- Heading -->
        <div class="container-fluid py-5">
            <div class="row px-2 px-lg-5 pb-lg-5 py-lg-5 mb-lg-5">
                <div class="col-md-6 d-block d-lg-none">
                    <img src="./assets/images/header.png" alt="Header image" class="mb-5 w-100" style="margin-top: -50px;">
                </div>
                <div class="col-md-6">
                    <h1 class="fs-1 w-100 w-lg-75" style="font-weight: 600;">
                        Investment and Be a Part of the Project Development 
                    </h1>
                    <p class="fs-5 mt-4 mt-lg-4 w-100 w-lg-75" style="color: #8F90A6; font-weight: 300">
                        Let`s make people dreams come true. 
                        You can invest your money through this website and 
                        you will be able to contribute then get your own benefit of the project.
                    </p>
                    <a href="#explore" class="btn button-primary btn-lg fs-6 btn-lg mt-4 mt-lg-5">
                        Get Started
                    </a>
                </div>
                <div class="col-md-6 d-none d-lg-block ps-5 pe-3">
                    <img src="./assets/images/header.png" alt="Header image" class="w-100" style="margin-top: -90px;">
                </div>
            </div>
        </div>

        <!-- Explore -->
        <div class="container-fluid py-5 background-primary mt-lg-5" id="explore">
            <div class="row px-2 px-lg-5 py-lg-5">
                <div class="container">
                    <div class="row">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <p class="text-light fs-3 fw-bold">
                                    Newest Projects
                                </p>
                            </div>
                            <div class="p-2 bd-highlight">
                                <a class="btn button-secondary btn-lg fs-6">
                                    See All
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-lg-4">
                        <div class="col-md-12">
                            <div class="owl-carousel">
                                <?php 
                                    foreach ($projects as $index => $project) {
                                ?>
                                    <div class="card-promos" id="card-promos-<?= $project['id'] ?>", data-id-project="<?= $project['id'] ?>">
                                        <img src="./assets/images/dummy_promos.png" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100" alt="Promo">
                                        <div class="container px-4 pt-4 py-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="fs-4 fw-bold">
                                                        <?= $project['title'] ?>
                                                    </h3>
                                                    <p class="fw-light fs-5 mt-3" style="color: #6B7588;">
                                                        <?= $project['short_description'] ?>
                                                    </p>

                                                    <div class="d-flex bd-highlight">
                                                        <div class="flex-grow-1 bd-highlight">
                                                            <p class="fs-6" style="color: #112D4E;">
                                                                Goals
                                                            </p>
                                                        </div>
                                                        <div class="flex-grow-1 bd-highlight text-end">
                                                            <p class="fs-6" style="color: #112D4E;">
                                                                <?= format_number_currency($project['goal_amount']) ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="progress">
                                                        <div 
                                                            class="progress-bar" 
                                                            role="progressbar" 
                                                            style="width: <?= calculate_percentage($project['current_amount'], $project['goal_amount']) ?>%; background-color: #3F72AF;border-radius:20px" 
                                                            aria-valuenow="<?= calculate_percentage($project['current_amount'], $project['goal_amount']) ?>" 
                                                            aria-valuemin="0" 
                                                            aria-valuemax="100"> <?= calculate_percentage($project['current_amount'], $project['goal_amount']) . ' %' ?>
                                                        </div>
                                                    </div>

                                                    <p class="mt-3 fw-light" style="color: #8F90A6;">
                                                        <i class="fas fa-clock me-2"></i> <?= sub_date_to_day($project['deadline']) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                }
                                ?>
                                <!-- <div class="card-promos" id="card-promos">
                                    <img src="./assets/images/dummy_promos.png" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100" alt="Promo">
                                    <div class="container px-4 pt-4 py-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="fs-4 fw-bold">
                                                    Trash In
                                                </h3>
                                                <p class="fw-light fs-5 mt-3" style="color: #6B7588;">
                                                    We create platform that can make
                                                    the trash can become an e-money.
                                                </p>

                                                <div class="d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Goals
                                                        </p>
                                                    </div>
                                                    <div class="flex-grow-1 bd-highlight text-end">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Rp5.600.000
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="progress">
                                                    <div 
                                                        class="progress-bar" 
                                                        role="progressbar" 
                                                        style="width: 50%; background-color: #3F72AF;border-radius:20px" 
                                                        aria-valuenow="50" 
                                                        aria-valuemin="0" 
                                                        aria-valuemax="100"> 50% 
                                                    </div>
                                                </div>

                                                <p class="mt-3 fw-light" style="color: #8F90A6;">
                                                    <i class="fas fa-clock me-2"></i> 23 Hours Left
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-promos" id="card-promos">
                                    <img src="./assets/images/dummy_promos.png" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100" alt="Promo">
                                    <div class="container px-4 pt-4 py-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="fs-4 fw-bold">
                                                    Trash In
                                                </h3>
                                                <p class="fw-light fs-5 mt-3" style="color: #6B7588;">
                                                    We create platform that can make
                                                    the trash can become an e-money.
                                                </p>

                                                <div class="d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Goals
                                                        </p>
                                                    </div>
                                                    <div class="flex-grow-1 bd-highlight text-end">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Rp5.600.000
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="progress">
                                                    <div 
                                                        class="progress-bar" 
                                                        role="progressbar" 
                                                        style="width: 50%; background-color: #3F72AF;border-radius:20px" 
                                                        aria-valuenow="50" 
                                                        aria-valuemin="0" 
                                                        aria-valuemax="100"> 50% 
                                                    </div>
                                                </div>

                                                <p class="mt-3 fw-light" style="color: #8F90A6;">
                                                    <i class="fas fa-clock me-2"></i> 23 Hours Left
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-promos" id="card-promos">
                                    <img src="./assets/images/dummy_promos.png" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100" alt="Promo">
                                    <div class="container px-4 pt-4 py-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="fs-4 fw-bold">
                                                    Trash In
                                                </h3>
                                                <p class="fw-light fs-5 mt-3" style="color: #6B7588;">
                                                    We create platform that can make
                                                    the trash can become an e-money.
                                                </p>

                                                <div class="d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Goals
                                                        </p>
                                                    </div>
                                                    <div class="flex-grow-1 bd-highlight text-end">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Rp5.600.000
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="progress">
                                                    <div 
                                                        class="progress-bar" 
                                                        role="progressbar" 
                                                        style="width: 50%; background-color: #3F72AF;border-radius:20px" 
                                                        aria-valuenow="50" 
                                                        aria-valuemin="0" 
                                                        aria-valuemax="100"> 50% 
                                                    </div>
                                                </div>

                                                <p class="mt-3 fw-light" style="color: #8F90A6;">
                                                    <i class="fas fa-clock me-2"></i> 23 Hours Left
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-promos" id="card-promos">
                                    <img src="./assets/images/dummy_promos.png" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100" alt="Promo">
                                    <div class="container px-4 pt-4 py-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="fs-4 fw-bold">
                                                    Trash In
                                                </h3>
                                                <p class="fw-light fs-5 mt-3" style="color: #6B7588;">
                                                    We create platform that can make
                                                    the trash can become an e-money.
                                                </p>

                                                <div class="d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Goals
                                                        </p>
                                                    </div>
                                                    <div class="flex-grow-1 bd-highlight text-end">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Rp5.600.000
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="progress">
                                                    <div 
                                                        class="progress-bar" 
                                                        role="progressbar" 
                                                        style="width: 50%; background-color: #3F72AF;border-radius:20px" 
                                                        aria-valuenow="50" 
                                                        aria-valuemin="0" 
                                                        aria-valuemax="100"> 50% 
                                                    </div>
                                                </div>

                                                <p class="mt-3 fw-light" style="color: #8F90A6;">
                                                    <i class="fas fa-clock me-2"></i> 23 Hours Left
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-promos" id="card-promos">
                                    <img src="./assets/images/dummy_promos.png" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100" alt="Promo">
                                    <div class="container px-4 pt-4 py-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="fs-4 fw-bold">
                                                    Trash In
                                                </h3>
                                                <p class="fw-light fs-5 mt-3" style="color: #6B7588;">
                                                    We create platform that can make
                                                    the trash can become an e-money.
                                                </p>

                                                <div class="d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Goals
                                                        </p>
                                                    </div>
                                                    <div class="flex-grow-1 bd-highlight text-end">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Rp5.600.000
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="progress">
                                                    <div 
                                                        class="progress-bar" 
                                                        role="progressbar" 
                                                        style="width: 50%; background-color: #3F72AF;border-radius:20px" 
                                                        aria-valuenow="50" 
                                                        aria-valuemin="0" 
                                                        aria-valuemax="100"> 50% 
                                                    </div>
                                                </div>

                                                <p class="mt-3 fw-light" style="color: #8F90A6;">
                                                    <i class="fas fa-clock me-2"></i> 23 Hours Left
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-promos" id="card-promos">
                                    <img src="./assets/images/dummy_promos.png" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100" alt="Promo">
                                    <div class="container px-4 pt-4 py-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="fs-4 fw-bold">
                                                    Trash In
                                                </h3>
                                                <p class="fw-light fs-5 mt-3" style="color: #6B7588;">
                                                    We create platform that can make
                                                    the trash can become an e-money.
                                                </p>

                                                <div class="d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Goals
                                                        </p>
                                                    </div>
                                                    <div class="flex-grow-1 bd-highlight text-end">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Rp5.600.000
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="progress">
                                                    <div 
                                                        class="progress-bar" 
                                                        role="progressbar" 
                                                        style="width: 50%; background-color: #3F72AF;border-radius:20px" 
                                                        aria-valuenow="50" 
                                                        aria-valuemin="0" 
                                                        aria-valuemax="100"> 50% 
                                                    </div>
                                                </div>

                                                <p class="mt-3 fw-light" style="color: #8F90A6;">
                                                    <i class="fas fa-clock me-2"></i> 23 Hours Left
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-promos" id="card-promos">
                                    <img src="./assets/images/dummy_promos.png" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100" alt="Promo">
                                    <div class="container px-4 pt-4 py-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="fs-4 fw-bold">
                                                    Trash In
                                                </h3>
                                                <p class="fw-light fs-5 mt-3" style="color: #6B7588;">
                                                    We create platform that can make
                                                    the trash can become an e-money.
                                                </p>

                                                <div class="d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Goals
                                                        </p>
                                                    </div>
                                                    <div class="flex-grow-1 bd-highlight text-end">
                                                        <p class="fs-6" style="color: #112D4E;">
                                                            Rp5.600.000
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="progress">
                                                    <div 
                                                        class="progress-bar" 
                                                        role="progressbar" 
                                                        style="width: 50%; background-color: #3F72AF;border-radius:20px" 
                                                        aria-valuenow="50" 
                                                        aria-valuemin="0" 
                                                        aria-valuemax="100"> 50% 
                                                    </div>
                                                </div>

                                                <p class="mt-3 fw-light" style="color: #8F90A6;">
                                                    <i class="fas fa-clock me-2"></i> 23 Hours Left
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="container-fluid pt-5 pb-5 mt-lg-5" id="explore">
            <div class="row px-2 px-lg-5 py-lg-5">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-12 text-center">
                            <p class="fs-2 fw-bold">
                                Why Choose Us
                            </p>
                        </div>
                        <div class="col-md-12 text-center">
                            <p class="fs-5 fw-light" style="color: #879FB0;">
                                Fund Me is commited to helping its project to reach their goals.
                            </p>
                        </div>
                    </div>
                    <div class="row choose-reasons mt-5">
                        <div class="col-6 col-md-3">
                            <img src="./assets/images/reliable.png" alt="Reliable" width="85px" height="85px" />
                            <h6 class="mt-lg-4 mt-2">
                                Reliable
                            </h6>
                            <p class="fs-6">
                                Our platforms allows crowdfunding projects organization and investor to connect together. 
                            </p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="./assets/images/simple.png" alt="Reliable" width="85px" height="85px" />
                            <h6 class="mt-lg-4 mt-2">
                                Simple
                            </h6>
                            <p class="fs-6">
                                It`s easy way to donate the project in our crowdfunding platform.
                            </p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="./assets/images/charity.png" alt="Reliable" width="85px" height="85px" />
                            <h6 class="mt-lg-4 mt-2">
                                Charity and Humanity
                            </h6>
                            <p class="fs-6">
                                Help those who needs the most. Support their idea and creation to reach their goals.
                            </p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="./assets/images/impact.png" alt="Reliable" width="85px" height="85px" />
                            <h6 class="mt-lg-4 mt-2">
                                Make an Impact
                            </h6>
                            <p class="fs-6">
                                Help them to reach their goals. Their project will produce awesome effect.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer py-5 px-3">
        <div class="container-fluid px-2 px-lg-5">
            <div class="row">
                <div class="col-md-7">
                    <p class="text-light fs-4" style="font-weight: 600;">
                        Fund Me
                    </p>
                </div>
                <div class="col-md-3 text-light mt-3 mt-sm-0">
                    <h3 class="fs-6 fw-bold">
                        Address
                    </h3>
                    <p class="fs-6 fw-normal mt-2 mt-lg-4 me-lg-4" style="color: #ADB2B8;">
                        Jl. Raya Cibiru KM 15, Bandung 40393 
                        Jawa Barat
                    </p>
                </div>
                <div class="col-md-2 text-light mt-3 mt-sm-0">
                    <h3 class="fs-6 fw-bold">
                        Contact
                    </h3>
                    <p class="fs-6 fw-normal mt-2 mt-lg-4" style="color: #ADB2B8;">
                        knockout@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="./assets/js/owl-carousel/owl.carousel.min.js"></script>
    <script src="./assets/js/scripts.js"></script>
</body>
</html>