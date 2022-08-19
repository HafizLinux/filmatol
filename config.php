<?php

    function dbConnect(){
        $conn = mysqli_connect('localhost', 'root', '', 'filmatol');
        if (!$conn) {
            die('Error Koneksi');
        }
        return $conn;
    }

    function apiConnect(){
        $url = "https://api.themoviedb.org/3/discover/movie?api_key=c6749cbd9ed421ab72d28bb87a7a07fd&language=en-US&sort_by=popularity.desc&page=1&primary_release_year=2022&with_original_language=id";
        $file = file_get_contents($url);
        $json = json_decode($file, true);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpcode != 200) {
            header('Location: maintenance.php');
            //die('Error');
        }
        return $json;
    }

    function detailsFilm($id){
        $url = "https://api.themoviedb.org/3/movie/$id?api_key=c6749cbd9ed421ab72d28bb87a7a07fd";
        $file = file_get_contents($url);
        $json = json_decode($file, true);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpcode != 200) {
            header('Location: index.php');
        }
        return $json;
    }
    
    
    


?>