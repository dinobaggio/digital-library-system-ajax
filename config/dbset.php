<?php

$host = 'localhost';
$userdb = 'root';
$passdb = '';
$dbname = 'digital_library_system_belajar';

try {
    $kon = new PDO("mysql:host=$host;dbname=$dbname", $userdb, $passdb);
    $kon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "error: ".$e->getMessage();
}

?>


 
<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../index.php","_self")
    }
</script> 