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

 $status = 0;
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

        echo $fileSize;
        if($fileSize > 500000000 ) {
            $errFile = "*file tidak boleh lebih dari 500Mb";
        } else {
            /* $fp = fopen($tmpName, "r");
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp); */
            
            //$tempat_upload = "";

        }
    } else {
        $errFile = "*File harus dipilih";
    }


    if($judul != '' && 
    $kategori != '' && 
    $errFile == '') {

        $fileDb = require_once('../../config/dbset.php');

            $que = "INSERT INTO data_lampiran (judul, pengarang, kategori, bahasa, penerbit, tahun_penerbit, tempat_penerbit, info_detail)
            VALUES (:judul, :pengarang, :kategori, :bahasa, :penerbit, :tahun_penerbit, :tempat_penerbit, :info_detail)";
            $tugas = $kon->prepare($que);
            $tugas->bindParam(':judul', $judul);
            $tugas->bindParam(':pengarang', $pengarang);
            $tugas->bindParam(':kategori', $kategori);
            $tugas->bindParam(':bahasa', $bahasa);
            $tugas->bindParam(':penerbit', $penerbit);
            $tugas->bindParam(':tahun_penerbit', $tahun_penerbit);
            $tugas->bindParam(':tempat_penerbit', $tempat_penerbit);
            $tugas->bindParam(':info_detail', $info_detail);
            $tugas->execute();
            $id_lampiran = $kon->lastInsertId();
            $tempat_upload = "../../upload/ID_".$id_lampiran."_".$kategori."_".$fileName;
            $nama_file = "ID_".$id_lampiran."_".$kategori."_".$fileName;
            if(move_uploaded_file($tmpName, $tempat_upload)) {
                $que = "INSERT INTO upload (nama_file, file_size, file_type) VALUES (:nama_file, :file_size, :file_type)";
                $tugas = $kon->prepare($que);
                $tugas->bindParam(':nama_file', $nama_file);
                $tugas->bindParam(':file_size', $fileSize );
                $tugas->bindParam(':file_type', $fileType);
                $tugas->execute();
                $id_upload = $kon->lastInsertId();
                $que = "UPDATE data_lampiran SET nama_file='$nama_file' WHERE id=$id_lampiran";
                $kon->exec($que);
                $que = "UPDATE data_lampiran SET id_upload='$id_upload' WHERE id=$id_lampiran";
                $kon->exec($que);

                $status = 1;

            } else {
                $que = "DELETE FROM data_lampiran WHERE id=$id_lampiran";
                $kon->exec($que);
                $status = 0;
            }
           

        $fileDb = null;
        $kon = null;
        unset($fileDb);
        unset($kon);

       


        if ($status == 1) {
            echo 'data berhasil msk';
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
                ?> <script> $("#indexAdmin").load('_views/role_01_admin/detail_data.php', { id : "<?php echo $id_lampiran;?>" })  </script> <?php
            } else {
                echo "gagal upload file";
            }





         try {
            /* $que = "INSERT INTO upload (nama_file, file_size, file_type, content) VALUES ('$fileName', '$fileSize', '$fileType', '$content' )";
            $kon -> exec($que); */
            /* $que = "INSERT INTO upload (nama_file, file_size, file_type, content) VALUES (:fileName, :fileSize, :fileType, :content)";
            $tugas = $kon->prepare($que);
            $tugas->bindParam(':fileName', $fileName);
            $tugas->bindParam(':fileSize', $fileSize);
            $tugas->bindParam(':fileType', $fileType);
            $tugas->bindParam(':content', $content);
            $tugas->execute(); 
            $id_upload = $kon->lastInsertId(); */

            /* $que = "INSERT INTO data_lampiran (judul, pengarang, kategori, bahasa, penerbit,
            tahun_penerbit, tempat_penerbit, info_detail, id_upload) VALUES ('$judul', 
            '$pengarang', '$kategori', '$bahasa', '$penerbit', '$tahun_penerbit', '$tempat_penerbit', '$info_detail', '$id_upload')"; */

            /* $que = "INSERT INTO data_lampiran (judul, pengarang, kategori, bahasa, penerbit, tahun_penerbit, tempat_penerbit, info_detail)
            VALUES (:judul, :pengarang, :kategori, :bahasa, :penerbit, :tahun_penerbit, :tempat_penerbit, :info_detail)";
            $tugas = $kon->prepare($que);
            $tugas->bindParam(':judul', $judul);
            $tugas->bindParam(':pengarang', $pengarang);
            $tugas->bindParam(':kategori', $kategori);
            $tugas->bindParam(':bahasa', $bahasa);
            $tugas->bindParam(':penerbit', $penerbit);
            $tugas->bindParam(':tahun_penerbit', $tahun_penerbit);
            $tugas->bindParam(':tempat_penerbit', $tempat_penerbit);
            $tugas->bindParam(':info_detail', $info_detail);
            $tugas->execute();
            $id_lampiran = $kon->lastInsertId();
            $tempat_upload = "../../upload/".$id_lampiran."_".$kategori."_".$fileName;
            if (move_uploaded_file($tmpName, $tempat_upload)) {
                $que = "UPDATE data_lampiran SET nama_file=:nama_file WHERE id=$id_lampiran ";
                $tugas = $kon->prepare($que);
                $tugas->bindParam(':nama_file', $nama_file);
                $nama_file = $id_lampiran."_".$kategori."_".$fileName;
                $tugas->execute();
                $que = "INSERT INTO upload (nama_file, file_size, file_type) VALUES ('$nama_file', '$fileSize', '$fileType')";
                $kon->exec($que);
                $id_upload = $kon->lastInsertId();
                $que = "UPDATE data_lampiran SET id_upload=:id_upload WHERE id=$id_lampiran ";
                $tugas = $kon->prepare($que);
                $tugas->bindParam(':id_upload', $id_upload);
                $tugas->execute();
                $status = 1;
                
            } else {
                $que = "DELETE FROM data_lampir WHERE id=$id_lampiran";
                $kon->exec($que);
                $status = 0;
            } */
            
            /* $status = 0;
            if($kon->exec($que)){
                $status = 1;
            } else {
                $status = 0;
            } */           

        } catch (PDOException $e) {
            echo "error: ".$e->getMessage();
        } 
    }

}

?>

<script src="_asset/js/public.js"></script>
<script>
    $(document).ready(function(){
        $("#formData").submit(function(){
            var formData = new FormData(this);
            $.ajax({
                url : '_views/role_01_admin/tambah_data.php',
                method : 'post',
                data : formData,
                contentType : false,
                cache : false,
                processData : false,
                success : function(data){
                    $("#indexAdmin").html(data);
                }
            });
        });

    });

</script>

<div class="w3-animate-right w3-section">
    <h2>Tambah Data</h2>
    <form method="post" action="javascript:void(0)" id="formData">
    <span class='error w3-opacity'><b>file yang diperbolehkan hanya pdf saja</b></span>
        <table>
            <tr><td>Judul: </td><td><input type="text" name="judul" value="<?php echo $judul;?>" placeholder="Judul ..." /></td><td><span class='error'><?php echo $errJudul;?></span></td></tr>
            <tr><td>kategori: </td><td>
                <select name="kategori">
                    <option value="" <?php echo $kategoriDefault;?> >Masukan Kategori ...</option>
                    <option value="ebook" <?php echo $ebook;?> >E-Book</option>
                    <option value="jurnal" <?php echo $jurnal;?> >Jurnal</option>
                    <option value="artikel" <?php echo $artikel;?> >Artikel</option>
                </select>
            </td><td><span class='error'><?php echo $errKategori;?></span></td></tr>
            <tr><td>Pengarang: </td><td><input type="text" name="pengarang" value="" placeholder="Pengarang ..." /></td></tr>
            <tr><td>Bahasa: </td><td><input type="text" name="bahasa" value="" placeholder="Bahasa ..." /></td></tr>
            <tr><td>Penerbit: </td><td><input type="text" name="penerbit" value="" placeholder="Penerbit ..." /></td></tr>
            <tr><td>Tahun Penerbit: </td><td><input type="text" name="tahun_penerbit" value="" placeholder="Tahun Penerbit ..." /></td></tr>
            <tr><td>Tempat Penerbit: </td><td><input type="text" name="tempat_penerbit" value="" placeholder="Tempat Penerbit ..." /></td></tr>
            <tr><td>Info Detail Spesifik: </td><td><textarea name="info_detail" placeholder"Info dan Detail ..."></textarea></td></tr>
            <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
            <tr><td>Lampiran Berkas: </td><td><input type="file" name="lampiran_berkas" accept=".pdf"/></td><td><span class='error'><?php echo $errFile;?></span></td></tr>
            <tr><td><input type="submit" value="Simpan"></td><td></td></tr>
        </table>
    </form>
</div>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>