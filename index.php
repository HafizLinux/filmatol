<?php
    include 'config.php';
    $api = apiConnect();
    $results = $api['results'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>TL21</title>
</head>
<body>
<!-- Style -->
<style>
    .card{
        border-style: none;
    }
</style>
<!-- Style -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
    <a class="navbar-brand" href="#">
        <img src="https://go-tix.id/images/gotix-image-brand.svg" width="50%">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar -->

<!-- Carousel -->
<div class="container mt-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="https://cms.cinepolis.co.id/Gallery/CNT//Page/Banner/ba4b01b03cf744f0a5c8ee7e16e31ba6.jpg" style="height: 450px;" class="d-block w-100">
        </div>
        <div class="carousel-item">
        <img src="https://cms.cinepolis.co.id/Gallery/CNT//Page/Banner/93668a4504274eb3ae576088274ab6a5.jpg" style="height: 450px;" class="d-block w-100">
        </div>
        <div class="carousel-item">
        <img src="https://cms.cinepolis.co.id/Gallery/CNT//Page/Banner/30a8ead328e04ac4ada354bf53b1b0f1.jpg" style="height: 450px;" class="d-block w-100">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true" style="color: black;"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>
<!-- Carousel -->

<!-- Judul -->
<div class="container">
    <div class="mt-4">
        <h1>
            <b>
                Now Playing
            </b>
        </h1>
    </div>
</div>
<!-- Judul -->

<!-- Isi2 -->
<div class="mt-2">
    <div class="container">
        <div class="row">
            <?php foreach($results as $data):?>
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body">

                        <div class="maintxt">
                            <img src="https://image.tmdb.org/t/p/w500<?= $data['poster_path']?>" style="border-radius: 20px;" width="100%">
                        </div>
                        
                        <div class="mt-3">
                            <center>
                                <a href="detail.php?id=<?= $data['id']?>" style="border-radius: 15px;background-color: #DF1995;color:white;" class="btn"><b>Buy Ticket</b></a>
                            </center>
                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- Isi2 -->
    
<!-- Footer -->
<footer style="background-color: #DF1995;">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-sm-4" style="color: white;">
                <img src="https://go-tix.id/images/gotix_footer.svg" width="50%"> <br> <br>
                <small>
                    GoTix is a movie & event discovery <br>   
                    with on-demand ticket order services. <br>
                    Now you can buy your tickets easily <br>
                    through GoTix!
                </small>
                <br>
                <br>
                <p>
                    <b>
                        <a style="color: white;text-decoration: none;" href="mailto:hafizherla18@gmail.com">hafizherla18@gmail.com</a>
                    </b>
                </p>
            </div>
            <div class="col-sm-4" style="color: white;">
                <h3>
                    <b>Metode Pembayaran</b>
                </h3>
                <br>
                <img src="https://ipaymu.com/wp-content/themes/ipaymu_v2/assets/img/logo/ipaymu_logo_white_240x60.png" width="50%">
            </div>
            <div class="col-sm-4" style="color: white;">
                <h3>
                    <b>Supported By</b>
                </h3>
                <br>
                <br>
                <img src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_2-d537fb228cf3ded904ef09b136fe3fec72548ebc1fea3fbbd1ad9e36364db38b.svg" width="50%">

            </div>
        </div>
    </div>
</footer>
<!-- Footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

