<?php
    include_once('../settings/session.php');
    include_once('../settings/utils.php');
    include_once('./functions.php');

    $id = 0;
    if (isset($_GET['id_project'])) {
        $id = $_GET['id_project'];
        $project = getProject($mysqli, $id);
    }

    if (isset($_POST['amount'])) {
        addTransaction($mysqli, $id, $user['id'], $_POST['amount']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail - Fund Me</title>

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
    <link rel="stylesheet" href="../assets/css/font-awesome/css/all.min.css">    

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../assets/js/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/js/owl-carousel/assets/owl.theme.default.min.css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php
        if (isset($_COOKIE['error'])) {
    ?>
        <script>
        alert("<?= $_COOKIE['error'] ?>")
        </script>
    <?php
        }
    ?>
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
                        <a class="nav-link mx-lg-4" href="#">
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
                            <a class="btn button-primary w-100 btn-lg fs-6" href="../logout/index.php">
                                Login As : <?= $user['first_name'] ?>
                            </a>
                        </li>
                    <?php
                        } else {
                    ?>
                        <li class="nav-item mt-2 mt-lg-0 ms-lg-3">
                            <a class="btn button-primary w-100 btn-lg fs-6" href="../login/index.php">
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
        <div class="pb-5">
            <img src="../assets/images/dummy_detail.png" alt="Detail Project" class="w-100" height="350px">

            <div class="container py-5">
                <div class="row">
                    <div class="col-md-7">
                        <p id="title" class="fs-3">
                            <?= $project['title'] ?>
                        </p>

                        <p id="short-description" class="fw-light fs-6 mt-3" style="color: #6B7588;">
                            <?= $project['short_description'] ?>
                        </p>

                        <p class="mt-5 fs-3">
                            Description
                        </p>

                        <p id="long-description" class="fw-light fs-6 mt-3" style="color: #6B7588;">
                            <?= $project['description'] ?> 
                        </p>

                        <div class="d-flex bd-highlight mt-4">
                            <div class="bd-highlight me-5">
                                <a href="javascript:void(0)" id="business-proposal" style="text-decoration: none;">
                                    <p class="fs-5 pb-3 fw-bold detail-choose" id="business-text" style="color: #3F72AF;">
                                        Business Proposal
                                    </p>
                                </a>
                            </div>
                            <div class="ms-5 bd-highlight text-center" id="goals">
                                <a href="javascript:void(0)" style="text-decoration: none;">
                                    <p class="fs-5 pb-3 fw-bold" id="goals-text" style="color: #3F72AF;">
                                        Goals
                                    </p>
                                </a>
                            </div>
                        </div>

                        <a href="javascript:void(0)" id="list-business" class="d-block" style="text-decoration: none;">
                            <div class="d-flex mt-3">
                                <i class="fa fa-file" style="font-size: 30pt; color: #6B7588"></i>
                                <div class="ms-4">
                                    <p style="margin: 0; color: #6B7588;">
                                        <?= $project['business_proposal_url'] ?>
                                    </p>
                                    <p style="margin: 0; color: #C7C9D9">
                                        1.24 MB
                                    </p>
                                </div>
                            </div>
                        </a>

                        <div class="list-goals d-none w-100 mt-2" id="list-goals">
                            <ul>
                                <li class="mb-4">
                                    First Goals
                                </li>
                                <li class="mb-4">
                                    Second Goals
                                </li>
                                <li class="mb-4">
                                    Third Goals
                                </li>
                                <li class="mb-4">
                                    Fourth Goals
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4 mt-5 mt-lg-0">
                        <div class="card-invest shadow p-4 bg-white">
                            <h3 class="fs-5" style="color: #112D4E;">
                                Make an investment
                            </h3>

                            <p class="fw-light fs-6 mt-4" style="color: #6B7588;">
                                Choose amount
                            </p>

                            <form action="" method="POST">
                                <div id="amount-selection" class="d-flex flex-wrap gap-3 amount-selection">
                                    <div class="flex-grow-1">
                                        <div class="select-amount" id="select-amount-1">
                                            <p class="text-center w-100 py-3 fs-6 fw-bold" style="margin: 0;">
                                                Rp100.000
                                            </p> 
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="select-amount" id="select-amount-2">
                                            <p class="text-center w-100 py-3 fs-6 fw-bold" style="margin: 0;">
                                                Rp200.000
                                            </p> 
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="select-amount" id="select-amount-3">
                                            <p class="text-center text-center w-100 py-3 fs-6 fw-bold" style="margin: 0;">
                                                Rp500.000
                                            </p> 
                                        </div>
                                    </div>
                                </div>

                                <p class="fw-light fs-6 mt-4" style="color: #6B7588;">
                                    or enter amount
                                </p>

                                <input type="number" id="amount-input" name="amount" placeholder="enter amount..." class="form-control form-amount">

                                <?php if ($user) { ?>
                                    <button type="submit" class="btn button-primary w-100 btn-lg fs-6 mt-5 py-2">
                                        Proceed
                                    </button>
                                <?php } else { ?> 
                                    <a class="btn button-primary w-100 btn-lg fs-6 mt-5 py-2 disabled" href="../login/index.php">
                                        Login to continue
                                    </a>
                                <?php } ?>
                            </form>
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
    <script src="../assets/js/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>