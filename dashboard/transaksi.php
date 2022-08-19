<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
    }
    if (empty($_POST['namaFilm'])) {
        header('Location: index.php');
    }
    date_default_timezone_set('Asia/Jakarta');

    include '../config.php';
    $db = dbConnect();

    $sesi = $_SESSION['email'];
    $qU = "SELECT * FROM user WHERE email = '$sesi'";
    $execU = $db->query($qU);
    $assocU = $execU->fetch_assoc();
    $assocId = $assocU['idUser'];
    $assocUname = $assocU['username'];
    $assocE = $assocU['email'];
    $assocN = $assocU['noTelp'];

    if (isset($_POST['submit'])) {
        $ssKode = "SSKode-".random_int(4, 500000);
        $harga = "35000";
        $tanggal = date("d-m-Y H:i:s");
        $jadwal = $_POST['jadwal'];
        if (!empty($_POST['set'])) {
            $namaFilm = $_POST['namaFilm'];
            $namaBioskop = $_POST['namaBioskop'];
            $no = 0;
            foreach ($_POST["set"] as $nokursi) {
                $idTiket = "TIXket-".random_int(4, 500000);
                $q = "INSERT INTO transaksi VALUES ('$idTiket', NULL, '$assocId', '$namaFilm', '$jadwal','$namaBioskop', '$nokursi', '$ssKode', '$harga', '$tanggal')";
                $e = $db->query($q);
                $no++;
                //var_dump($q);
            }
            //echo "jumlah tiket = Rp.". $no*35000;
        }else{
            echo "<script>alert('Isi Data Kursi')</script>";
        }
    }

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
                    <a class="nav-link active" aria-current="page" href="">Home</a>
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
        <div class="mt-4">
            <center>
                <h3>
                    <b>Transaksi</b>
                </h3>
            </center>
        </div>

        <div class="mt-5 mb-5">
            <div class="row">
            
            <div class="col-sm-3 mb-3"></div>

            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <center>
                                <b>
                                    <h4>Bayar Tiket</h4>
                                </b>
                            </center>
                            <table class="table mt-5">
                                <tr>
                                    <th>ID Transaksi</th>
                                    <td><?= $ssKode;?></td>
                                </tr>
                                
                                <tr>
                                    <th>Nama Film</th>
                                    <td><?= $namaFilm;?></td>
                                </tr>

                                <tr>
                                    <th>Nama Bioskop</th>
                                    <td><?= $namaBioskop;?></td>
                                </tr>

                                <tr>
                                    <th>Nomor Kursi</th>
                                    <td>
                                        <?php
                                            foreach ($_POST["set"] as $nokursi) {
                                                echo "K".$nokursi." ";
                                            }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td><?= $_SESSION['email']?></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Tiket</th>
                                    <td><?= $no;?> <small>x Rp. 35.000</small> <small> = Rp. <?= number_format($no*35000, 2, ',','.');?></small></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <td><?= $tanggal;?></td>
                                </tr>
                            </table>
                            <form action="tr.php" method="post">
                                <input type="hidden" name="email" value="<?= $_SESSION['email']?>">
                                <input type="hidden" name="namaFilm" value="<?= $namaFilm;?>">
                                <input type="hidden" name="qty" value="<?= $no;?>">
                                <input type="hidden" name="username" value="<?= $assocUname;?>">
                                <input type="hidden" name="noTelp" value="<?= $assocN;?>">
                                <button type="submit" name="submit" class="btn btn-primary">Bayar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-sm-3 mb-3"></div>
            </div>
        </div>
    
    
    
    </div>

    




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