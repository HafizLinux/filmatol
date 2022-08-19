<?php
    session_start();
    
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
    }

    include '../config.php';

    $db = dbConnect();
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
        background-color: pink;

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
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar -->
<div class="container">
    <div class="mt-4 mb-4">
        <small>
            Halo, <?= $_SESSION['email'];?>
        </small>
    </div>
</div>


<?php
    $sesi = $_SESSION['email'];
    $qtr = "SELECT a.*, b.* FROM (user as a 
            INNER JOIN transaksi as b ON a.idUser = b.idUser)
            WHERE email = '$sesi' ORDER BY no ASC";
    $execqtr = $db->query($qtr);
?>


<div class="container">
    <div class="text-center mt-5 mb-5">
        <h2>Your Ticket's</h2>
    </div>    

    <div class="row">
        <?php foreach($execqtr as $resq):?>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <b>
                            <?= $resq['namaFilm']?>
                        </b>
                        <br>
                        <small>
                        On : <?= $resq['jadwal']?> <br>
                        Jam : <?= $resq['namaBioskop']?> <br>
                        Tiket ID : <?= $resq['idTiket']?> <br>
                        Price : <?= number_format($resq['hargaTiket'], 2, ',','.')?> <br>
                        Transaction at : <?= $resq['tanggalTransaksi']?> <br>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</div>











<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>