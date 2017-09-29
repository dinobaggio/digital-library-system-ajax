<?php 
define("br", "<br/>", true);

if(isset($_GET["id"])) {
    try {
        $id = $_GET["id"];
        $kon = new PDO("mysql:host=localhost;dbname=belajar", "root", "");
        $que = "SELECT name, type, size, content FROM upload WHERE id='$id'";
        $tugas = $kon -> query($que);
        $data = $tugas -> fetch();
        $size = $data["size"];
        $type = $data["type"];
        $name = $data["name"].$id;
        $content = $data["content"];
        
        header("Content-type: $type");
        header("Content-size: $size");
        /* $type = explode("/", $type);
        header("Content-Disposition: filename=$name.$type[1]"); */
        echo $content;


    } catch (PDOException $e) {
        echo "error: ".$e->getMessage();
    } 
}



?>