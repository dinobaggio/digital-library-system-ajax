<script src="_asset/js/public.js"></script>


<?php
session_start();

if(!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    session_destroy();
    //echo "<script>window.location = '../../index.php'</script>";
    ?> 
    
    <script>
        if (document.getElementById("indexAjax") == null ){
            window.location = '';
        } else {
            window.location = '';
        }
    </script>
    
    
    <?php
} else { 

if($_SESSION['role'] != 'user') {
    session_destroy(); ?> <script>window.location = '';</script> <?php
}

?>
    
    <script>
        if(document.getElementById("indexAjax") == null) {
            window.location = '';
        }
    </script>

    <?php
}

?>


<?php 
define("br", "<br/>", true);

if(isset($_GET["id"])) {
    try {
        $id = $_GET["id"];
        $loadDb = require_once("../../config/dbset.php");
        $que = "SELECT * FROM upload WHERE id='$id'";
        $tugas = $kon -> query($que);
        $data = $tugas -> fetch();
        $size = $data["file_size"];
        $type = $data["file_type"];
        $name = $data["nama_file"];
        $content = $data["content"];
        
        header("Content-type: $type");
        header("Content-size: $size");
        header("Content-Disposition: filename=$name"); ?>
        
        <object data="data:<?php echo $type;?>;base64,<?php echo base64_encode($content);?>" type="<?php echo $type;?>" style="height:600px;width:80%"></object>
        
        <?php


    } catch (PDOException $e) {
        echo "error: ".$e->getMessage();
    } 
}

// http://www.php-mysql-tutorial.com/wikis/mysql-tutorials/uploading-files-to-mysql-database.aspx

?>



<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>