<?php

    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
    }
    if (empty($_POST['namaFilm'])) {
        header('Location: index.php');
    }

    $return = $_GET['return'];
    $trx_id = $_GET['trx_id'];
    $status = $_GET['status'];
    $tipe = $_GET['tipe'];
    $via = $_GET['via'];
    $channel = $_GET['channel'];
    $va = $_GET['va'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>Transaksi Notify URL</title>
</head>
<body>


    <table cellpadding="10" border="1">
        <tr>
            <td>Return</td>
            <td><?= $return;?></td>
        </tr>

        <tr>
            <td>TRX ID</td>
            <td><?= $trx_id;?></td>
        </tr>

        <tr>
            <td>Status</td>
            <td><?= $status;?></td>
        </tr>

        <tr>
            <td>Channel</td>
            <td><?= $channel;?></td>
        </tr>

        <tr>
            <td>VA</td>
            <td><?= $va;?></td>
        </tr>
    </table>

    <a href="index.php">Back</a>


    
</body>
</html>