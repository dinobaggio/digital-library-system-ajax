<?php

$id = 3;
//require_once('config/dbset.php');
$kon = new PDO ("mysql:host=localhost;dbname=digital_library_system_belajar", "root", ""); 
$que = "SELECT nama_file FROM data_lampiran WHERE id='$id'";
$tugas = $kon->prepare($que);
$tugas->execute();
$data = $tugas->fetch();
$nama_file = $data['nama_file'];


$target = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/upload/$nama_file"."[0]";
//$target = "upload/fOm6u_ebook_ebook-codeigniter.pdf[0]";
$im = new Imagick($target);
$im->setImageFormat('jpg');
header('Content-Type: image/jpeg');
echo $im;

?>