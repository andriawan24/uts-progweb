<?php
    include('../settings/session.php');
    include('functions.php');

    $_ERROR = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $is_valid = true;

        if (!$_POST['first_name']) {
            $_ERROR['first_name'] = "First name cannot empty";
            $is_valid = false;
        }

        if (!$_POST['last_name']) {
            $_ERROR['last_name'] = "Last name cannot empty";
            $is_valid = false;
        }

        if (!$_POST['username']) {
            $_ERROR['username'] = "Username cannot empty";
            $is_valid = false;
        }

        if (!$_POST['email']) {
            $_ERROR['email'] = "Email cannot empty";
            $is_valid = false;
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_ERROR['email'] = "Email is not valid";
            $is_valid = false;
        }

        if (!$_POST['password']) {
            $_ERROR['password'] = "Password cannot empty";
            $is_valid = false;
        }

        if (!$_POST['password_confirmation']) {
            $_ERROR['password_confirmation'] = "Password confirmation cannot empty";
            $is_valid = false;
        }

        if (!isset($_POST['gender']) || !$_POST['gender']) {
            $_ERROR['gender'] = "Gender cannot empty";
            $is_valid = false;
        }

        if ($is_valid) {
            $user = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'gender' => $_POST['gender'],
            ];

            register($user, $mysqli);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Fund Me</title>

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
    <style>
        .card-register {
            background: #F5F5F5;
            padding: 10px 40px 10px 40px;
            border-radius: 30px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
        }

        .card-register .title {
            font-size: 28px;
            color: #3A3A3C;
            position:  relative;
            text-align: center;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .card-register .subtitle {
            font-size: 14px;
            color: #8F90A6;
            position: relative;
            margin-bottom: 35px;
            text-align: center;
        }

        .card-register form .userInput {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .card-register form .userInput .inputBox {
            margin-bottom: 25px;
            width: calc(100% /2 - 20px);
        }

        .details {
            margin-bottom: 10px;
            display: block;
            font-size: 16px;
            color: #3A3A3C;
        }

        .card-register .userInput .inputBox input {
            height: 55px;
            width: 100%;
            border-radius: 6px;
            border: 2px solid #DDE5E9;
            padding-left: 30px;
            font-size: 14px;
            color: #3A3A3C;
        }

        .card-register form .genderUser .genderTitle {
            font-size: 16px;
            color: #3A3A3C;
        }

        .category {
            width: 30%;
            display: flex;
            justify-content: space-between;
            margin: 20px 20px 35px 0px;
        }

        .category label{
            display: flex;
            cursor: pointer;
        }

        .rb {
            height: 18px;
            width: 18px;
            background: #F2F2F5;
            border-radius: 50%;
            margin-right: 15px;
            border: 2px solid #C7C9D9;
        }

        #rb1:checked ~ .category label .one,
        #rb2:checked ~ .category label .two {
            border-color: #d9d9d9;
            background: #112D4E;
        }

        form input[type="radio"]{
            display: none;
        }

        form .button {
            height: 50px;
            margin: 0px 30px 50px 0px;
        }

        form .button input {
            height: 100%;
            width: 100%;
            color: #fff;
            background: #112D4E;
            font-size: 16px;
            border-radius: 6px;
            border: none;
        }

        form .button input:hover {
            background: #3F72AF;
        }

        .linkToLogin {
            display: flex;
            justify-content: center;
        }

        .linkToLogin .login {
            margin-left: 5px;
        }
    </style>
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
                        <a class="nav-link mx-lg-4" aria-current="page" href="./index.html">
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
                    <li class="nav-item mt-2 mt-lg-0 ms-lg-3">
                        <a class="btn button-primary w-100 btn-lg fs-6" href="../login/index.php/">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container card-register my-5 py-4">
        <div class="title"><b>Register</b></div>
        <div class="subtitle">Fill the blank input below here to sign up</div>
        <form action="" method="POST">
            <!-- Title and Input User --> 
            <div class="userInput">
                <div class="inputBox">
                    <span class="details">First Name</span>
                    <input type="text" name="first_name" placeholder="Enter your first name...">
                    <?php 
                        if (isset($_ERROR['first_name'])) {
                    ?>
                        <p class="text-danger">
                            <?= $_ERROR['first_name'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="inputBox">
                    <span class="details">Last Name</span>
                    <input type="text" name="last_name" placeholder="Enter your last name...">
                    <?php 
                        if (isset($_ERROR['last_name'])) {
                    ?>
                        <p class="text-danger">
                            <?= $_ERROR['last_name'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="inputBox">
                    <span class="details">Username</span>
                    <input type="text" name="username" placeholder="Enter your username...">
                    <?php 
                        if (isset($_ERROR['username'])) {
                    ?>
                        <p class="text-danger">
                            <?= $_ERROR['username'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="inputBox">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Enter your email...">
                    <?php 
                        if (isset($_ERROR['email'])) {
                    ?>
                        <p class="text-danger">
                            <?= $_ERROR['email'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="inputBox">
                    <span class="details">Password</span>
                    <input type="password" name="password" placeholder="Enter your password...">
                    <?php 
                        if (isset($_ERROR['password'])) {
                    ?>
                        <p class="text-danger">
                            <?= $_ERROR['password'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="inputBox">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="password_confirmation" placeholder="Confirm your password...">
                    <?php 
                        if (isset($_ERROR['password_confirmation'])) {
                    ?>
                        <p class="text-danger">
                            <?= $_ERROR['password_confirmation'] ?>
                        </p>
                    <?php } ?>
                </div>
            </div>

            <!--User Gender Radiobutton -->
            <div class="genderUser">
                <input type="radio" name="gender" value="l" id="rb1">
                <input type="radio" name="gender" id="rb2" value="p">
                <span class="genderTitle">Gender</span>
                <div class="category">
                    <label for="rb1">
                        <span class="rb one"></span>
                            <span class="gender">Male</span>
                    </label>
                    <label for="rb2">
                        <span class="rb two"></span>
                            <span class="gender">Female</span>
                    </label>
                </div>
                <?php 
                    if (isset($_ERROR['gender'])) {
                ?>
                    <p class="text-danger">
                        <?= $_ERROR['gender'] ?>
                    </p>
                <?php } ?>
            </div>

            <div class="button">
                <button type="submit" class="btn btn-lg button-primary w-100 fs-6 mt-3 mb-5">
                    Register
                </button>
            </div>

            <div class="linkToLogin">
                <span class="text">Already have an account? Please </span>
                <span class="login"> <a style="text-decoration: none;" href="/login/index.php"> Sign In </a> </span>
            </div>
        </div>
        </form>
    </div>

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
    <script src="../assets/js/scripts.js"></script>
</body>
</html>