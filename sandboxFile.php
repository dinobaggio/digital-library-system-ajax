<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        /*
        $fileTmp = $_FILES["filen"]["tmp_name"];
        $fp = fopen($fileTmp, 'r');
        $conten = fread($fp, fileSize($fileTmp));
        $conten = addslashes($conten);
        fclose($fp);
        echo $conten;
        */
        //echo base64_encode($conten);
        //echo '<br/>@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br/>';
        //$data = base64_decode($_POST['data']);
        //echo $_POST['data'];
        $data = $_POST['data'];
        file_put_contents( "abstrak.pdf", $data);
    }
?>