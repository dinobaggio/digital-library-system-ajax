<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        //$dbLoad = require_once('../../config/dbset.php');
        $kon = new PDO ("mysql:host=localhost;dbname=digital_library_system_belajar", "root", ""); 
        $que = "SELECT nama_file FROM data_lampiran WHERE id='$id'";
        $tugas = $kon->prepare($que);
        $tugas->execute();
        $data = $tugas->fetch();
        $nama_file = $data['nama_file'];
        //echo $nama_file;
    
        $target = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/upload/$nama_file"."[0]";
        $im = new Imagick($target);
        $im->setImageFormat('jpg');
        header('Content-Type: image/jpeg');
        echo $im;
    } else {
        $target = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/_asset/gambar/non content.jpg";
        $im = new Imagick($target);
        $im->setImageFormat('jpg');
        header('Content-Type: image/jpeg');
        echo $im;
    }

} else {
    $target = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/_asset/gambar/non content.jpg";
    $im = new Imagick($target);
    $im->setImageFormat('jpg');
    header('Content-Type: image/jpeg');
    echo $im;
}


?>