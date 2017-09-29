<?php 
define("br", "<br/>", true);

if(isset($_GET["id"])) {
    try {
        $id = $_GET["id"];
        $loadDb = require_once("config/dbset.php");
        $que = "SELECT * FROM upload WHERE id='$id'";
        $tugas = $kon -> query($que);
        $data = $tugas -> fetch();
        $size = $data["file_size"];
        $type = $data["file_type"];
        $name = $data["nama_file"];
        $content = $data["content"];
        
        header("Content-type: $type");
        header("Content-size: $size");
        header("Content-Disposition:attachment;filename=$name");
        echo $content;


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