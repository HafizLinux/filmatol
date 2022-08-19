<?php

    session_start();
    
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
    }

    if (empty($_POST['namaFilm'])) {
        header('Location: index.php');
    }
    
    // date_default_timezone_set('Asia/Jakarta');

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Set Kursi</title>
</head>
<body>
    
    <style>
        body{
            background-color: #DF1995;
        }
    </style>

    <div class="container mt-5">
        
        <center>
            <div class="mb-3" style="color: white;">
                <h1>
                    <b><?= $_POST['namaFilm'];?></b>
                </h1>
            </div>
            <div class="mb-3">
                <div class="card" style="width: 780px;height: 50px;">
                    <div class="card-body">
                        <center>
                            Layar
                        </center>
                    </div>
                </div>
            </div>
        </center>

        <form action="transaksi.php" method="post">
            <input type="hidden" name="namaFilm" value="<?= $_POST['namaFilm']?>">
        <div class="row">
            <div class="col-sm-4 mb-3 text-center">
                <div class="row">
                    <?php for ($i=1; $i < 31; $i++):?>
                        <div class="col-sm-2 mb-2">
                            <label for="korsi<?= $i?>">
                                <div style="width: 50px;" class="card pb-2">
                                    <?= $i?>
                                <input type="checkbox" id="korsi<?= $i?>" name="set[]" value="<?= $i?>">
                            </div>
                            </label>
                        </div>
                    <?php endfor;?>
                </div>
            </div>

            <div class="col-sm-3 mb-3 text-center">
                <div class="mb-3">
                    <select name="namaBioskop" class="form-control" required>
                        <option value="CGV">CGV</option>
                        <option value="XXI">XXI</option>
                        <option value="Cineapolis">Cinepolis</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select name="jadwal" class="form-control" required>
                        <option value="15.00">15.00</option>
                        <option value="09.00">09.00</option>
                        <option value="18.00">18.00</option>
                        <option value="13.00">13.00</option>
                        <option value="21.00">21.00</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4 mb-3 text-center">
                <div class="row">
                    <?php for ($i=31; $i < 61; $i++):?>
                        <div class="col-sm-2 mb-2">
                            <label for="korsi<?= $i?>">
                                <div style="width: 50px;" class="card pb-2">
                                <?= $i?>
                                <input type="checkbox" id="korsi<?= $i?>" name="set[]" value="<?= $i?>">
                            </div>
                            </label>
                        </div>
                    <?php endfor;?>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
        
        <div class="mt-2">
            <a href="index.php" class="btn btn-secondary">Back</a>
        </div>

    </div>




</body>
</html>