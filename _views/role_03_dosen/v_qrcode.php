<?php 

if (!empty($_GET['id_upload'])) {
    $id_upload = $_GET['id_upload'];
} else {
    $id_upload = '';
}
?>


<div align="center" >
    <img src="qrcode.php?id_upload=<?= $id_upload ?>" alt="QRCode">
    <p><strong>ID Upload:</strong> <?= $id_upload ?></p>
</div>
