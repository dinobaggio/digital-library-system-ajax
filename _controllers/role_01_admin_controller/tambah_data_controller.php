<?php
{
 $errFile = '';

 $errJudul ='';
 $judul = '';

 $errKategori = '';

 $kategoriDefault = 'selected';
 $ebook = '';
 $jurnal = '';
 $artikel = '';
}

if($_SERVER['REQUEST_METHOD'] == "POST") {

if(empty($_POST['judul'])){
    $errJudul = '*judul tidak boleh kosong';
} else {
    $judul = $_POST['judul'];
}

if(empty($_POST['kategori'])) {
    $errKategori = '*kategori harus dipilih';
} else {
    $kategori = $_POST['kategori'];
    switch($kategori) {
        case $kategori == 'ebook' :
        $ebook = 'selected';
        $kategoriDefault = '';
        $jurnal = '';
        $artikel = '';
        break;
        case $kategori == 'jurnal' :
        $jurnal = 'selected';
        $ebook = '';
        $artikel = '';
        $kategoriDefault = '';
        break;
        case $kategori == 'artikel' :
        $artikel = 'selected';
        $jurnal = '';
        $ebook = '';
        $kategoriDefault = '';
        break;
        default :
        $kategoriDefault = 'selected';
        $jurnal = '';
        $ebook = '';
        $artikel = '';
    }
}

$kategori = $_POST['kategori'];
$pengarang = $_POST['pengarang'];
$bahasa = $_POST['bahasa'];
$penerbit = $_POST['penerbit'];
$tahun_penerbit = $_POST['tahun_penerbit'];
$tempat_penerbit = $_POST['tempat_penerbit'];
$info_detail = $_POST['info_detail'];

    if($_FILES['lampiran_berkas']['size'] > 0){
        $fileSize = $_FILES['lampiran_berkas']['size'];
        $fileName = $_FILES['lampiran_berkas']['name'];
        $tmpName = $_FILES["lampiran_berkas"]["tmp_name"];
        $fileType = $_FILES["lampiran_berkas"]["type"];
        if($fileSize > 2000000 ) {
            $errFile = "*file tidak boleh lebih dari 2Mb";
        } else {
            $fp = fopen($tmpName, "r");
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp);
        }
    } else {
        $errFile = "*File harus dipilih";
    }


    if($judul != '' && 
    $kategori != '' && 
    $errFile == '') {
        $fileDb = require_once('../../config/dbset.php');
        try {
            $que = "INSERT INTO upload (nama_file, file_size, file_type, content) VALUES ('$fileName', '$fileSize', '$fileType', '$content' )";
            $kon -> exec($que);
            /* $que = "INSERT INTO upload (nama_file, file_size, file_type, content) VALUES (:fileName, :fileSize, :fileType, :content)";
            $tugas = $kon->prepare($que);
            $tugas->bindParam(':fileName', $fileName);
            $tugas->bindParam(':fileSize', $fileSize);
            $tugas->bindParam(':fileType', $fileType);
            $tugas->bindParam(':content', $content);
            $tugas->execute(); */
            $id_upload = $kon->lastInsertId();
            $que = "INSERT INTO data_lampiran (judul, pengarang, kategori, bahasa, penerbit,
            tahun_penerbit, tempat_penerbit, info_detail, id_upload) VALUES ('$judul', 
            '$pengarang', '$kategori', '$bahasa', '$penerbit', '$tahun_penerbit', '$tempat_penerbit', '$info_detail', '$id_upload')";
            $status = 0;
            if($kon->exec($que)){
                $status = 1;
            } else {
                $status = 0;
            }
            $id_lampiran = $kon->lastInsertId();
            unset($fileDb);
            unset($kon); 
            
            if ($status == 1) {
            ?>
            
             <script>
             $("#indexAdmin").html('tunggu sebentar ...');
                setTimeout(function(){
                    $.ajax({
                        url : '_views/role_01_admin/detail_data.php',
                        method : 'POST',
                        data : { id : "<?php echo $id_upload;?>" },
                        success : function(data){
                            $("#indexAdmin").html(data);
                        }
                    });
                }, 0);
            </script> 
            
            
<?php
            }

        } catch (PDOException $e) {
            echo "error: ".$e->getMessage();
        }
    }



}






?>






<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>