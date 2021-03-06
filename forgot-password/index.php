<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Fund Me</title>

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
    <link rel="stylesheet" href=".../assets/css/font-awesome/css/all.min.css">    

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../assets/js/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/js/owl-carousel/assets/owl.theme.default.min.css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <style>
      .card-login {
        background: #F5F5F5;
        border-radius: 30px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.15);
      }
    </style>
    
    <!-- <style type="text/css">
      *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      body{
        background: white;
      }
      .row{
        background: #DDE5E9;
        border-radius: 30px;
        box-shadow: 12px 12px 22px grey;
      }
      img{
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
      }
      .btn1{
        border-radius: none;
        outline: none;
        height: 50px;
        width: 100%;
        background-color: #112D4E;
        color: white;
        border-radius: 4px;
        font-weight: bold;
      }
      .btn1:hover{
        background: white;
        border: 1px solid;
        color:  #112D4E;
      }
    </style> -->
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
                    <a class="nav-link mx-lg-4" aria-current="page" href="/">
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
                    <a class="btn button-primary w-100 btn-lg fs-6">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </nav>

  <section class="card-login container my-5">
    <div class="row no-gutters">
      <div class="col-lg-5">
        <img src="../assets/images/img_forget.png" alt="" class="d-none d-lg-block" style="margin-left: 70px;">
      </div>
      <div class="col-lg-7 px-5 pt-5">
        <form style="justify-content: safe center;">
          <div class="form-row">
            <div class="col-lg-12">
              <h3 style="text-align: center;">Forgot your password?</h3>
              <p style="text-align: center; font-size: small; margin-bottom: 100px;">
                You can reset your password here. 
              </p>
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-7" style="margin-left: 130px;">
              <input type="email" placeholder="Email Address" class="form-control my-3 px-4 py-3">
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-7" style="margin-left: 130px;">
              <a class="btn btn-lg button-primary w-100 fs-6 mt-3 mb-5" href="../login/index.php">Reset Password</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../assets/js/scripts.js"></script>
</body>
</html>