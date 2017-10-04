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





function cekIdUpload($table, $kolom) {
    global $kon;
    $string = randomString(5);
    $que = "SELECT $kolom FROM $table WHERE $kolom='$string'";
    $tugas = $kon->prepare($que);
    $tugas->execute();
    $cek = $tugas->rowCount();
    if($cek == 0) {
        return $string;
    } else {
        return 1;
    }
}

?>


 
<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../index.php","_self")
    }
</script> 