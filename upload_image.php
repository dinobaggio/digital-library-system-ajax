<?php
define("br", "<br/>", true);

$fileName = $tmpName = $fileSize = $fileType = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_FILES['userfile']['size'] > 0 ) {
        $tmpName = $_FILES["userfile"]["tmp_name"];
        $fileSize = $_FILES["userfile"]["size"];
        $fileType = $_FILES["userfile"]["type"];
        
        $fp = fopen($tmpName, "r");
        $content = fread($fp, filesize($tmpName));
        $content = addslashes($content);
        fclose($fp);
        
        try {
            $kon = new PDO("mysql:host=localhost;dbname=belajar", "root", "");
            $que = "SELECT id FROM upload ORDER BY id DESC LIMIT 1";
            $tugas = $kon -> query($que);
            $total = $tugas -> rowCount();
            if ($total == 0) {
                $lastId = 0;
            } else {
                $que = "SELECT id FROM upload ORDER BY id DESC LIMIT 1";
                $data = $tugas -> fetch();
                $lastId = $data['id'];
            }
            
            $fileName = "image_id_".$lastId;
            $que = "INSERT INTO upload (name, type, size, content) VALUES ('$fileName', '$fileType', '$fileSize', '$content' )";
            $kon -> exec($que);
        } catch (PDOException $e) {
            echo "error: ".$e->getMessage();
        }
    }
}



?>


<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<input type="hidden" name="MAX_FILE_SIZE" value="2000000" /><br/>
<input type="file" name="userfile" id="userfile" accept="image/*" /><br/>
<input type="submit" name="upload" id="upload" value="Upload" />
</form>
<p>
<?php
echo $fileName.br;
echo $tmpName.br;
echo $fileSize.br;
echo $fileType.br;
$nama = "&#60;fadho'il&#62;";
echo addslashes($nama).br;
echo stripslashes($nama).br;
try {
    $kon = new PDO("mysql:host=localhost;dbname=belajar", "root", "");
    $que = "SELECT type FROM upload WHERE id='1'";
    $tugas = $kon->query($que);
    $data = $tugas -> fetch();
    $type = $data["type"];
    echo $type.br;
    $type = explode("/", $type);
    echo $type[1].br;
    $que = "SELECT id FROM upload ORDER BY id DESC LIMIT 1";
    $tugas = $kon -> query($que);
    $total = $tugas -> rowCount();
    echo $total;
    

    
} catch(PDOException $e){
    echo "error: ".$e->getMessage();
}

?>
<br/>
<img src="get_image.php?id=1" alt="ts"/>
</P>