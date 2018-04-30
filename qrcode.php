<?php
include '_asset/qrcode/qrlib.php';

if (!empty($_GET['id_upload'])) {
    $id_upload = $_GET['id_upload'];
    
} else {
    $id_upload = '';
}


echo QRcode::png($id_upload);
?>