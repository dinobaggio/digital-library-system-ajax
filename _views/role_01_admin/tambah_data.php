
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

if($_SESSION['role'] != 'admin') {
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


{
    $errId_upload = '';
    $errFile = '';

    $errJudul ='';
    $judul = '';

    $errKategori = '';

    $kategoriDefault = 'selected';
    $ebook = '';
    $jurnal = '';
    $artikel = '';
    $kategori = '';

    $status = 0;

    $errBatas = '';
    $batasan = '';

    $errAbstrak = '';
    $abstrak = '';
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $id_upload = $_POST['id_upload'];
    $loadDb = require_once('../../config/dbset.php');
    $que = "SELECT id_upload FROM data_lampiran WHERE id_upload='$id_upload'";
    $tugas = $kon->prepare($que);
    $tugas->execute();
    $cek_id = $tugas->rowCount();
    if($cek_id == 0) {
        $errId_upload = '';
    } else {
        $errId_upload = 'file sudah terupload dengan id = '.$id_upload;
        $fileDb = null;
        $kon = null;
        $judul = "";
        $kategoriDefault = 'selected';
        $ebook = '';
        $jurnal = '';
        $artikel = '';
        $batasan = '';
        echo "<script>$('#katBatas').hide();</script>";
        echo "<script>$('#loadingGambar').hide();</script>";
        echo "<script>$('#tungguSebentar').hide();</script>";
    }
    $loadDb = null;

    

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

if(empty($_POST['batasan'])) {
    $errBatas = "*batasan ebook untuk non user harus disi";
} else {
    $errBatas = '';
}


$kategori = $_POST['kategori'];
$pengarang = $_POST['pengarang'];
$bahasa = $_POST['bahasa'];
$penerbit = $_POST['penerbit'];
$tahun_penerbit = $_POST['tahun_penerbit'];
$tempat_penerbit = $_POST['tempat_penerbit'];
$info_detail = $_POST['info_detail'];
$batasan = $_POST['batasan'];
$abstrak = $_POST['abstrak'];
$tgl_upload = Date("Y-m-d H:i:s");

if ($kategori == 'jurnal') {
    if (empty($abstrak)) {
        $errAbstrak = "*abstrak harus diisi";
    }
}

    if($judul != '' && 
    $kategori != '' && 
    $errId_upload == '' &&
    $errBatas == '' && 
    $errAbstrak == '') {
        try {
            if($_FILES['lampiran_berkas']['size'] > 0){
                $fileSize = $_FILES['lampiran_berkas']['size'];
                $fileName = $_FILES['lampiran_berkas']['name'];
                $tmpName = $_FILES["lampiran_berkas"]["tmp_name"];
                $fileType = $_FILES["lampiran_berkas"]["type"];
                if($fileSize > 500000000 ) {
                    $errFile = "*file tidak boleh lebih dari 500Mb";
                } else {
                    $errFile = '';

                }
            } else {
                $errFile = "*File harus dipilih";
            }

            if ($errFile == '') {
                $fileDb = require_once('../../config/dbset.php');
                $nama_file = $id_upload."_".$kategori."_".$fileName;
                $nama_file = explode(".", $nama_file);
                unset($nama_file[count($nama_file)-1]);
                $nama_file = implode(".",$nama_file);
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

                $que = "INSERT INTO data_lampiran (judul, pengarang, kategori, bahasa, penerbit, tahun_penerbit, tempat_penerbit, info_detail, abstrak, nama_file, id_upload, tgl_upload)
                VALUES (:judul, :pengarang, :kategori, :bahasa, :penerbit, :tahun_penerbit, :tempat_penerbit, :info_detail, :abstrak, :nama_file, :id_upload, :tgl_upload)";
                $tugas = $kon->prepare($que);
                $tugas->bindParam(':judul', $judul);
                $tugas->bindParam(':pengarang', $pengarang);
                $tugas->bindParam(':kategori', $kategori);
                $tugas->bindParam(':bahasa', $bahasa);
                $tugas->bindParam(':penerbit', $penerbit);
                $tugas->bindParam(':tahun_penerbit', $tahun_penerbit);
                $tugas->bindParam(':tempat_penerbit', $tempat_penerbit);
                $tugas->bindParam(':info_detail', $info_detail);
                $tugas->bindParam(':nama_file', $nama_file);
                $tugas->bindParam(':id_upload', $id_upload);
                $tugas->bindParam(':tgl_upload', $tgl_upload);
                $tugas->bindParam(':abstrak', $abstrak);
                if($tugas->execute()){
                    $id_lampiran = $kon->lastInsertId();
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
                            $tmpt_upload = "upload/ebook/$nama_file";
                            ?> <script>
                            alert('upload sukses dengan id : <?php echo $id_upload?>');
                            window.open('v_qrcode.php?id_upload=<?= $id_upload ?>', '_blank')
                            var abstrak = '<?php echo $abstrak?>';
                            var tmpt_upload = '<?php echo $tmpt_upload?>';
                            
                            if (abstrak != '') {
                                $.ajax({
                                    url:'_views/role_01_admin/abstrak_pdf.php',
                                    method:'POST',
                                    data : { textPdf:abstrak, tmpt_upload:tmpt_upload }
                                }).done(function(data){
                                    console.log('loading abstark2');
                                    $("#resultAbstrak").html(data);
                                    
                                }); 
                            } else {
                                $("#indexAdmin").load('_views/role_01_admin/tambah_data.php');
                            }
                            
                            </script> <?php
                        } else {
                            echo "<script>$('#indexAdmin').html('Error data tidak teruploads');</script>";
                            $fileDb = null;
                            $kon = null;
                            unset($fileDb);
                            unset($kon);
                        }
                        
                    } else {
                        echo "<script>$('#indexAdmin').html('Error data tidak terupload');</script>";
                        $fileDb = null;
                        $kon = null;
                        unset($fileDb);
                        unset($kon);
                    }
                } else {
                    echo "<script>$('#indexAdmin').html('Error memasukan data');</script>";
                    $fileDb = null;
                    $kon = null;
                    unset($fileDb);
                    unset($kon);
                }
                
            }
                
        } catch(PDOException $e) {
            echo "error : ".$e->getMessage();
        }
    }

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

<script src="_asset/js/public.js"></script>
<script>
    $(document).ready(function(){
        $("#formData").submit(function(){
            $('#loadingGambar').show();
            $('#tungguSebentar').show();
            $("#manipulasi").show();
            $('#katBatas').hide();
            var formData = new FormData(this);
            $.ajax({
                url : '_views/role_01_admin/tambah_data.php',
                method : 'post',
                beforeSubmit:  function() {
                    $(this).clearForm();    //Call the reset before the ajax call starts
                },
                data : formData,
                contentType : false,
                cache : false,
                processData : false,
                success : function (data) {
                    $("#indexAdmin").html(data);
                    formData = null;
                }
            }).done(function(data){
                
            });
        });

        
    });

function selekKategori(value) {
    if (value == "ebook") {
        $("#batasan").val("");
        $("#katBatas").show("slow", function () {
            var val = $("#batasan").val();
            console.log(val);
        });
        $("#abstrak").hide('slow', function(){
            $("#isiAbs").val("");
        });
    } else if (value == "jurnal") {
        $("#katBatas").hide("slow", function () {
            $("#batasan").val("1");
            var val = $("#batasan").val();
            console.log(val);
        });
        $("#abstrak").show('slow', function(){});

    } else if (value == "artikel") {
        $("#katBatas").hide('slow', function(){
            $("#batasan").val("1");
            var val = $("#batasan").val();
            console.log(val);
        });
        $("#abstrak").hide('slow', function(){
            $("#isiAbs").val("");
        });
    } else {
        $("#batasan").val("");
        $("#isiAbs").val("");
        $("#katBatas").hide("slow");
        $("#abstrak").hide("slow");
        console.log($("#batasan").val());
    }
}    


</script>

<div id="divData" class="w3-animate-right w3-section w3-text-center">
    <h2>Tambah Data</h2>
    <form method="post"  action="javascript:void(0)" id="formData">
    <span class='error w3-opacity'><b>file yang diperbolehkan hanya pdf saja</b></span>
        <table>
            <tr><td>Judul: </td><td><input type="text" name="judul" value="<?php echo $judul ?>" placeholder="Judul ..." /></td><td><span class='error'><?php echo $errJudul;?></span></td></tr>
            <tr><td>kategori: </td><td>
                <select id="kategori" name="kategori" onchange="selekKategori(this.value)">
                    <option value="" <?php echo $kategoriDefault;?> >Masukan Kategori ...</option>
                    <option value="ebook" <?php echo $ebook;?> >E-Book</option>
                    <option value="jurnal" <?php echo $jurnal;?> >Jurnal</option>
                    <option value="artikel" <?php echo $artikel;?> >Artikel</option>
                </select>
            </td><td><span class='error'><?php echo $errKategori;?></span></td></tr>
            <tr id="katBatas" style="display:none" ><td>Batasan : </td><td><input id="batasan" name="batasan" type="number" placeholder="Batasan Untuk Non User"></td><td><span class="error"><?php echo $errBatas ?></span></td></tr>
            <tr id='abstrak' style="display:none"><td>Abstrak: </td><td><textarea id='isiAbs' name="abstrak" placeholder='masukan abstrak'  rows='4' cols='30'></textarea></td><td><span class='error' ><?php echo $errAbstrak?></span></td></tr>
            <tr><td>Pengarang: </td><td><input type="text" name="pengarang" value="" placeholder="Pengarang ..." /></td></tr>
            <tr><td>Bahasa: </td><td><input type="text" name="bahasa" value="" placeholder="Bahasa ..." /></td></tr>
            <tr><td>Penerbit: </td><td><input type="text" name="penerbit" value="" placeholder="Penerbit ..." /></td></tr>
            <tr><td>Tahun Penerbit: </td><td><input type="text" name="tahun_penerbit" value="" placeholder="Tahun Penerbit ..." /></td></tr>
            <tr><td>Tempat Penerbit: </td><td><input type="text" name="tempat_penerbit" value="" placeholder="Tempat Penerbit ..." /></td></tr>
            <tr><td>Info Detail Spesifik: </td><td><textarea name="info_detail" placeholder="Info dan Detail ..." rows='4' cols='30'></textarea></td></tr>
            <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
            <tr><td>Lampiran Berkas: </td><td><input type="file" name="lampiran_berkas" accept=".pdf"/></td><td><span class='error'><?php echo $errFile;?></span></td></tr>
            <input type="hidden" name="id_upload" value="<?php echo randomString(5); ?>" />
            <tr><td><input type="submit" value="Simpan"></td><td><span class='error'><?php echo $errId_upload;?></span></td></tr>
        </table>
    </form>
    <img src='_asset/gambar/loading.gif' class='w3-opacity-min' id='loadingGambar' width='130%' height='800' style='display:none;position:absolute;top:0px;left:-30%;top:-30%;z-index: 3;' />
    <div class="w3-black w3-container" id='tungguSebentar' style="display:none;position:absolute;z-index:4;top:-20%;text-align: center;left:25%;">Prosess Upload sedang berjalan ...</br> bila batasan Besar proses akan lebih lama...</div>
    <div id='manipulasi' class='w3-black' style='width:130%;height:800px;display:none;position:absolute;left:-30%;top:-40%;z-index:-1;' >asdf </div>
</div>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }

    var kategori = '<?php echo $kategori?>';
        if (kategori == '') {
            $("#batasan").val("");
            $("#katBatas").hide();
        } else if  (kategori == 'ebook') {
            $("#batasan").val(<?php echo $batasan ?>);
            $("#katBatas").show("slow", function () {
                var val = $("#batasan").val();
                console.log(val);
            });
            $("#abstrak").hide('slow');
        }else if (kategori == 'jurnal') {
            $("#katBatas").hide("slow", function () {
                $("#batasan").val("1");
                var val = $("#batasan").val();
                console.log(val);
            });
            $("#isiAbs").val("<?php echo $abstrak?>");
            $("#abstrak").show('slow', function(){
                
            });
        } else if (kategori == 'artikel'){
            $("#katBatas").hide("slow", function () {
                $("#batasan").val("1");
                var val = $("#batasan").val();
                console.log(val);
            });
            $('#abstrak').hide('slow', function(){
                $('#isiAbs').val("");
            });
        } else {
            $("#batasan").val("1");
            $("#isiAbs").val("");
            $("#katBatas").hide("slow");
            $("#abstrak").hide('slow');
            console.log($("#batasan").val());
        }
</script>


<?php
function sepasiBerlebih ($string) {
    $string = preg_replace('/\s+/', ' ', $string);
    $string = trim($string);
    return $string;
}


?>