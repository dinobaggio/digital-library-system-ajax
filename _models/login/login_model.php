<?php

$loadDb = require_once('../../config/dbset.php');
try {

    $que = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
    $tugas = $kon->query($que);
    $tugas->execute();
    $data = $tugas->fetch();
    $login = $tugas->rowCount();
    unset($loadDb);
    unset($kon);
    if ($login == 1) {
        
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];  ?>
        <script>
        $("#indexAjax").load("_views/login/login.php");
        </script>

<?php
    } else {
        $username = '';
        $password = '';
        $errLogin = "* Data tidak ada";
        unset($loadDb);
        unset($kon);
    }
} catch (PDOException $e) {
    echo "error message: ". $e->getMessage();
    unset($loadDb);
    unset($kon);
}


?>




<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self")
    }
</script>