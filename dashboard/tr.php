<?php
    
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
    }
    if (empty($_POST['namaFilm'])) {
        header('Location: index.php');
    }

    

    // SAMPLE HIT API iPaymu v2 PHP //

    $va           = '0000001214893355'; //get on iPaymu dashboard
    $secret       = 'SANDBOX5A9EB3C4-955A-4862-BE0B-5C1FFBABD69E-20220817005006'; //get on iPaymu dashboard

    $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; // for development mode
    // $url          = 'https://my.ipaymu.com/api/v2/payment'; // for production mode
    
    $method       = 'POST'; //method
    
    //Request Body//
    $namaFilm = $_POST['namaFilm'];
    $qty = $_POST['qty'];
    $email = $_POST['email'];
    $noTelp = $_POST['noTelp'];
    $uname = $_POST['username'];

    $body['product']    = array("$namaFilm");
    $body['qty']        = array("$qty");
    $body['price']      = array('35000');
    $body['buyerName']  = "$uname";
    $body['buyerEmail'] = "$email";
    $body['buyerPhone'] = "$noTelp";
    $body['returnUrl']  = 'http://localhost/projects/atol/tubes/dashboard/return.php';
    $body['cancelUrl']  = 'http://localhost/projects/atol/tubes/dashboard/index.php';
    $body['notifyUrl']  = 'http://localhost/projects/atol/tubes/dashboard/index.php';
    $body['referenceId'] = '1234'; //your reference id
    //End Request Body//

    //Generate Signature
    // *Don't change this
    $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
    $requestBody  = strtolower(hash('sha256', $jsonBody));
    $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
    $signature    = hash_hmac('sha256', $stringToSign, $secret);
    $timestamp    = Date('YmdHis');
    //End Generate Signature


    $ch = curl_init($url);

    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        'va: ' . $va,
        'signature: ' . $signature,
        'timestamp: ' . $timestamp
    );

    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_POST, count($body));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $err = curl_error($ch);
    $ret = curl_exec($ch);
    curl_close($ch);

    if($err) {
        echo $err;
    } else {

        //Response
        $ret = json_decode($ret);
        if($ret->Status == 200) {
            $sessionId  = $ret->Data->SessionID;
            $url        =  $ret->Data->Url;
            header('Location:' . $url);
        } else {
            echo $ret;
        }
        //End Response
    }

?>