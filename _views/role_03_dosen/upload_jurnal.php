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

if($_SESSION['role'] != 'dosen') {
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
date_default_timezone_set("Asia/Bangkok");
$errFileJurnal = '';
$errJudulJurnal = '';
$errAbstrak = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST['judulJurnal'] = sepasiBerlebih($_POST['judulJurnal']);
    $id_upload = $_POST['id_upload'];
    $loadDb = require_once('../../config/dbset.php');
    $que = "SELECT id_upload FROM data_lampiran WHERE id_upload='$id_upload'";
    $tugas = $kon->prepare($que);
    $tugas->execute();
    $cek_id = $tugas->rowCount();
    if($cek_id == 0) {
        $errId_upload = '';
    } else { 
        $errId_upload = "<script>console.log('data sudah terupload dengan id $id_upload')</script>";
    }

    // cek id upload di database disini belum

    if(empty($_POST['judulJurnal'])) {
        $errJudulJurnal = '*Judul Jurnal harus diisi';
    } else {
        $errJudulJurnal = '';
        $judulJurnal = $_POST['judulJurnal'];
    }
    if(empty($_POST['abstrak'])) {
        $errAbstrak = '*Abstrak harus diisi';
    } else {
        $errAbstrak = '';
        $abstrak = $_POST['abstrak'];
    }

    if ($errJudulJurnal == '' && 
        $errAbstrak == '') {
        $kategori = 'jurnal';
        $batasan = 1;

        if($_FILES['fileJurnal']['size'] > 0){
            $fileSize = $_FILES['fileJurnal']['size'];
            $fileName = $_FILES['fileJurnal']['name'];
            $tmpName = $_FILES["fileJurnal"]["tmp_name"];
            $fileType = $_FILES["fileJurnal"]["type"];

            if($fileSize > 500000000 ) {
                $errFileJurnal = "*file jurnal tidak boleh lebih dari 500Mb";
            } else {
                $fileName = explode(".", $fileName);
                unset($fileName[count($fileName)-1]);
                $fileName = implode(".",$fileName);
                $errFileJurnal = '';
            }
        } else {
            $errFileJurnal = "*File harus dipilih";
        }

        if($errFileJurnal == '' && $errId_upload == '') {
            $kategori = 'jurnal';
            $batasan = 1;
            $bahasaJurnal = sepasiBerlebih($_POST['bahasaJurnal']);
            $pengarangJurnal = sepasiBerlebih($_POST['pengarangJurnal']);
            $infoJurnal = sepasiBerlebih($_POST['infoJurnal']);
            $abstrak = sepasiBerlebih($abstrak);
            $tgl_upload = Date("Y-m-d H:i:s");

            $fileDb = require_once('../../config/dbset.php');
            //$tempat_upload = "../../upload/".$id_upload."_".$kategori."_".$fileName;
            $nama_file = $id_upload."_".$kategori."_".$fileName;
            $nama_file = sepasiBerlebih($nama_file);
            $sandbox_upload = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/upload/tempo_file/$nama_file";
            $tempat_upload = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/upload/ebook/$nama_file";
            $rm_folder_file = $sandbox_upload;
            
            if (!file_exists($sandbox_upload)) {
                mkdir($sandbox_upload, 0777, true);
            }

            if (!file_exists($tempat_upload)) {
                mkdir($tempat_upload, 0777, true);
            }

            $que = "INSERT INTO data_lampiran (judul, pengarang, kategori, bahasa, info_detail, abstrak, nama_file, id_upload, tgl_upload)
            VALUES (:judul, :pengarang, :kategori, :bahasa, :info_detail, :abstrak, :nama_file, :id_upload, :tgl_upload)";
            $tugas = $kon->prepare($que);
            $tugas->bindParam(':judul', $judulJurnal);
            $tugas->bindParam(':pengarang', $pengarangJurnal);
            $tugas->bindParam(':kategori', $kategori);
            $tugas->bindParam(':bahasa', $bahasaJurnal);
            $tugas->bindParam(':info_detail', $infoJurnal);
            $tugas->bindParam(':nama_file', $nama_file);
            $tugas->bindParam(':id_upload', $id_upload);
            $tugas->bindParam(':tgl_upload', $tgl_upload);
            $tugas->bindParam(':abstrak', $abstrak);
            if($tugas->execute()) {
                $id_lampiran = $kon->lastInsertId();
                echo "<script>console.log('tes memasukan data')</script>";
                $id_dosen = $_SESSION['username'];
                $que = "INSERT INTO jurnal_dosen (id_dosen, nama_file, bahasa_jurnal, id_jurnal, judul_jurnal, id_data_lampiran, tgl_upload) VALUES (:id_dosen, :nama_file, :bahasa_jurnal, :id_jurnal, :judul_jurnal, :id_data_lampiran, :tgl_upload)";
                $tugas = $kon->prepare($que);
                $tugas->bindParam(':id_dosen', $id_dosen);
                $tugas->bindParam(':nama_file', $nama_file);
                $tugas->bindParam(':bahasa_jurnal', $bahasaJurnal);
                $tugas->bindParam(':id_jurnal', $id_upload);
                $tugas->bindParam(':judul_jurnal', $judulJurnal);
                $tugas->bindParam(':id_data_lampiran', $id_lampiran);
                $tugas->bindParam(':tgl_upload', $tgl_upload);
                //if($tugas->execute($tugas->execute())){
                    if($tugas->execute()) {
                        
                        $tempat_upload = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/upload/ebook/$nama_file/full_pdf.pdf";
                        $moved = move_uploaded_file($tmpName, $tempat_upload);
                       

                        if ($moved) {
                            $target = $tempat_upload."[0]";
                            $im = new imagick($target); 
                            $im->setImageColorspace(255); 
                            $im->setResolution(300, 300);
                            $im->setCompressionQuality(95); 
                            $im->setImageFormat('jpeg');

                            $file = $nama_file.".jpeg";
                            $target = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/upload/imgcilik/$file";
                            $imgcilik = $im->writeImage($target);
                            
                            if($imgcilik) {
                                //$im->clear(); 
                                //$im->destroy();
                                //echo "<script>$('#indexAdmin').load('_views/role_01_admin/detail_data.php', {id:$id_lampiran});</script>";
                                
                                for($i = 0; $i < $batasan; $i++) {
                                    $file = "full_pdf.pdf[$i]";
                                    $target = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/upload/ebook/$nama_file/$file";
                                    $im = new imagick($target);
                                    $im->setImageColorspace(255); 
                                    $im->setResolution(300, 300);
                                    $im->setCompressionQuality(0);
                                    $im->setImageFormat('jpeg');

                                    $file = "$i.jpeg";
                                    $target = $_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/upload/tempo_file/$nama_file/$file";
                                    $imgcilik = $im->writeImage($target);
                                    if ($imgcilik) {
                                        echo "<script>console.log('gambar ($i+1) berhasil dibuat')</script>";
                                        
                                    } else {
                                        echo "<script>console.log('gagal membuat gambar ($i+1)')</script>";
                                    }
                                }
                                // akhir for
                                
                                $im->clear(); 
                                $im->destroy();
                                $images = [];
                                for($i = 0; $i < $batasan; $i++) {
                                    $images[$i] = $rm_folder_file."/$i.jpeg";
                                } 
                                //print_r($images);

                                $pdf = new Imagick($images);
                                $pdf->setImageFormat('pdf');
                                if (!$pdf->writeImages($_SERVER['DOCUMENT_ROOT']."/digital-library-system-ajax/upload/ebook/$nama_file/non_user.pdf", true)) {
                                        die('Could not write!');
                                }
                                $pdf->clear();
                                $pdf->destroy();

                                array_map('unlink', glob($rm_folder_file."/*.*"));
                                rmdir($rm_folder_file); 
                                
                                
                                
                                $fileDb = null;
                                $kon = null;
                                $judul = "";
                                $kategoriDefault = 'selected';
                                $ebook = '';
                                $jurnal = '';
                                $artikel = '';
                                $batasan = '';
                                $tmpt_upload = "upload/ebook/$nama_file";
                                ?> <script>
                                alert('upload sukses dengan id : <?php echo $id_upload?>');
                                window.open('v_qrcode.php?id_upload=<?= $id_upload ?>', '_blank')
                                var abstrak = '<?php echo $abstrak?>';
                                var tmpt_upload = '<?php echo $tmpt_upload?>';
                                console.log(abstrak);
                                console.log(tmpt_upload);
                                
                                if (abstrak != '') {
                                    console.log('loading abstark1');
                                    $.ajax({
                                        url:'_views/role_03_dosen/abstrak_pdf.php',
                                        method:'POST',
                                        data : { textPdf:abstrak, tmpt_upload:tmpt_upload }
                                    }).done(function(data){
                                        console.log('loading abstark2');
                                        $("#resultAbstrak").html(data);
                                        //console.log(data);
                                        //console.log($("#resultAbstrak").html());
                                    }); 
                                } else {
                                    $("#indexDosen").load('_views/role_03_dosen/upload_jurnal.php');
                                }
                                
                                
                                </script> <?php
                            } else {
                                echo "<script>$('#indexDosen').html('Error data tidak teruploads');</script>";
                                $fileDb = null;
                                $kon = null;
                                unset($fileDb);
                                unset($kon);
                            }
                            
                        } else {
                             var_dump($moved); 
                            //echo "<script>$('#indexDosen').html('Error data tidak terupload');</script>";
                             
                            $fileDb = null;
                            $kon = null;
                            unset($fileDb);
                            unset($kon);
                        }
                    } else {
                        echo "<script>$('#indexDosen').html('Error memasukan data dosen');</script>";
                        $fileDb = null;
                        $kon = null;
                        unset($fileDb);
                        unset($kon);
                    }
            } else {
                echo "<script>console.log('data gagal')</script>";
            }
        }
    }
    

}




?>


<script>
$(document).ready(function(){
    $("#formJurnal").submit(function(){
        var formJurnal = new FormData(this);
        $('#loadingGambar').show();
        $('#tungguSebentar').show();
        $('#manipulasi').show();
        $.ajax({
            url : '_views/role_03_dosen/upload_jurnal.php',
            method : 'post',
            beforeSubmit : function() { 
                    $("#formJurnal").clearForm(); 
                },
            data : formJurnal,
            contentType : false,
            cache : false,
            processData : false,
            success : function (data) {
                $("#indexDosen").html(data);
                formJurnal = null;
            }
        });
    });
});


</script>

<div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
    <br/>
    <div class="w3-black w3-container">
    <h2>Upload Jurnal / Publikasi </h2>
    </div>
    <form id="formJurnal" action="javascript:void(0)" method="POST">
        <table>
            <tr><td><b>Judul : </b></td><td><input type="text" placeholder="Isikan Judul ..." name="judulJurnal"  /></td><td><span class="error"><?php echo $errJudulJurnal?></span></td></tr>
            <tr><td><b>Bahasa : </b></td><td><input type="text" placeholder="Isikan Bahasa ..." name="bahasaJurnal" /></td></tr>
            <tr><td><b>Pengarang : </b></td><td><input type="text"   placeholder="Isikan Pengarang ..." name="pengarangJurnal" /></td></tr>
            <!-- rencana hidden value id pengarang <input type="hidden" value="ID DOSEN" > -->
            <tr><td><b>Abstrak : </b></td><td><textarea name='abstrak' rows='4' cols='30' placeholder='Masukan Abstrak ...'></textarea></td><td><span class='error' ><?php echo $errAbstrak?></span></td></tr>
            <tr><td><b>Info Detail: </b></td><td><textarea name="infoJurnal" placeholder="Info dan Detail ..."></textarea></td></tr>
            <tr><td><b>Lampiran : </b></td><td><input type="file" class="w3-input w3-button" accept=".pdf" name="fileJurnal" /></td><td><span class="error"><?php echo $errFileJurnal?></span></td></tr>
            <tr></tr>
            <input type="hidden" name="id_upload" value="<?php echo randomString(5); ?>" />
            <tr><td><button class="w3-button w3-black" >Simpan!</button></td></tr>
        </table>
    </form>
    </div>
    <div class="w3-container">
        <p></p>
        <div class="w3-row">
            <div class="w3-col m8 s12">
                <p></p>
            </div>
        </div>
    </div>

    <img src='_asset/gambar/loading.gif' class='w3-opacity-min' id='loadingGambar' width='185%' height='800' style='display:none;position:absolute;top:0px;left:-30%;top:-30%;z-index: 3;' />
    <div class="w3-black w3-container" id='tungguSebentar' style="display:none;position:absolute;z-index:4;top:-20%;text-align: center;left:60%;">Prosess Upload sedang berjalan ...</div>
    <div id='manipulasi' class='w3-black' style='width:130%;height:800px;display:none;position:absolute;left:-30%;top:-40%;z-index:-1;' >asdf </div>
</div>




<?php
function sepasiBerlebih ($string) {
    $string = preg_replace('/\s+/', ' ', $string);
    $string = trim($string);
    return $string;
}

function randomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



?>