<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Digital Library By Dino</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <noscript>
            <p>website ini membutuhkan javascript, nyalakan javascript anda</p>
        </noscript>
        <style>
        @media print
        {
        iframe {display:none;}
        body {display: none;}
        }
        </style>

        <link href="../_asset/css/w3css.css" rel="stylesheet" />
        <link href="../_asset/css/font_awesome/css/font-awesome.css" rel="stylesheet" />
        <script src="../_asset/js/jquery-3.2.1.js"></script>
        <script src='../_asset/js/jspdf.debug.js'></script>
        <script src='../_asset/js/html2pdf.js'></script>
        <script>
            $(document).ready(function(){
                $("#dinobaggio").click(function(){
                    window.open("https://dinobaggio.github.io");
                });
            });
        </script>
        <script src="../_asset/js/public.js">// public JS </script>
    </head>
    <body>
    <!-- <h1>Digital Library System by Dinobaggio</h1>
    <br/><button id="dinobaggio">dinobaggio.github.io</button> <br/> -->
    <div id="indexAjax"> 
        <!-- proses seluruh aplikasi disini -->
        <script>
            $("body").removeClass("w3-teal");
            $("body").addClass("w3-brown");
        </script>

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



        <script>
        $(document).ready(function(){
            $("#logout").click(function(){
                $('#indexAjax').load('_controllers/login/logout_controller.php');
            });
            $("#listData").click(function(){
                $("#indexAdmin").load("_views/role_01_admin/list_data.php");
                $(this).addClass('w3-opacity');
                $("#tmbhData").removeClass('w3-opacity');
                $("#tmbhUser").removeClass('w3-opacity');
            });
            $("#tmbhData").click(function(){
                $("#indexAdmin").load('_views/role_01_admin/tambah_data.php');
                $(this).addClass('w3-opacity');
                $("#listData").removeClass('w3-opacity');
                $("#tmbhUser").removeClass('w3-opacity');
            });
            $("#tmbhUser").click(function(){
                $("#indexAdmin").load('_views/role_01_admin/tambah_user.php');
                $(this).addClass('w3-opacity');
                $("#listData").removeClass('w3-opacity');
                $("#tmbhData").removeClass('w3-opacity');
            });
            
        });
        </script>

        <nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card-2" style="z-index:3;width:18%;top:0px;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-border-bottom w3-large"><img src="http://sps-perbanas.ac.id/files/Logo.png" style="width:80%;"></button>
        <button onclick="w3_close()" title="Close Sidemenu" class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></button>
        <button class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'" style="display:none;">New Message <i class="w3-padding fa fa-pencil"></i></button>
        <button id="myBtn" onclick="myFunc('Demo1')" class="w3-bar-item w3-button"><i class="fa fa-bars w3-margin-right"></i>Aksi<i class="fa fa-caret-down w3-margin-left"></i></button>
        <div id="Demo1" class="w3-hide w3-animate-left">
            <button class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" id="listData" onclick="list_data()">
            <div class="w3-container">
                <img class="w3-round w3-margin-right" src="../_asset/gambar/list_data.png" style="width:7%;"><span class="w3-opacity w3-large">Lihat List Data</span>
            </div>
            </button>
            <button class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" id="tmbhData" onclick="tambah_data()">
            <div class="w3-container">
                <img class="w3-round w3-margin-right" src="../_asset/gambar/tambah_data.png" style="width:7%;"><span class="w3-opacity w3-large">Tambah Data</span>
            </div>
            </button>
            <button class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" id="tmbhUser" onclick="tambah_user()">
            <div class="w3-container">
                <img class="w3-round w3-margin-right" src="../_asset/gambar/tambah_user.png" style="width:7%;"><span class="w3-opacity w3-large">Tambah User</span>
            </div>
            </button>
        </div>
        <button class="w3-bar-item w3-button" id="logout" onclick="logout()"><i class="fa fa-sign-out w3-margin-right"></i>Logout</button>
        </nav>



        <script> 
        var openInbox = document.getElementById("myBtn");
        openInbox.click();
        function list_data() {
            window.location = "list_data.php"
        }
        function tambah_data() {
            window.location = "tambah_data.php";
        }
        function tambah_user() {
            window.location = "tambah_user.php";
        }
        function logout() {
            window.location = "logout.php";
        }
        </script>

        <div class="w3-main w3-animate-right" style="margin-left:260px;">
        <i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
        <a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display='block'" style="display:none;"><i class="fa fa-pencil"></i></a>
        <div class='w3-container w3-padding-16 w3-indigo'><h1>Selamat datang <?php echo $_SESSION['username'];?></h1></div>
        <div id='resultAbstrak'> </div>
            <div id="indexAdmin" class="">
            <h1>INI TAMBAH DATA</h1>

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
                $loadDb = require_once('../config/dbset.php');
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
                                /* $fp = fopen($tmpName, "r");
                                $content = fread($fp, filesize($tmpName));
                                $content = addslashes($content);
                                fclose($fp); */
                                
                                //$tempat_upload = "";
                                $errFile = '';

                            }
                        } else {
                            $errFile = "*File harus dipilih";
                        }

                        if ($errFile == '') {
                            $fileDb = require_once('../config/dbset.php');
                            //$tempat_upload = "../../upload/".$id_upload."_".$kategori."_".$fileName;
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
                                        
                                        var abstrak = '<?php echo $abstrak?>';
                                        var tmpt_upload = '<?php echo $tmpt_upload?>';
                                        console.log(abstrak);
                                        console.log(tmpt_upload);
                                        
                                        if (abstrak != '') {
                                            console.log('loading abstark1');
                                            
                                            $.ajax({
                                                url:'../_views/role_01_admin/abstrak_pdf.php',
                                                method:'POST',
                                                data : { textPdf:abstrak, tmpt_upload:tmpt_upload }
                                            }).done(function(data){
                                                console.log('loading abstark2');
                                                $("#resultAbstrak").html(data);
                                                //console.log(data);
                                                //console.log($("#resultAbstrak").html());
                                            }); 
                                        } else {
                                            $("#indexAdmin").load('_views/role_01_admin/tambah_data.php');
                                            window.location = 'tambah_data.php';
                                        }
                                        //$("#indexAdmin").load('_views/role_01_admin/tambah_data.php');
                                        
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
                <form method="post"  action="tambah_data.php" enctype="multipart/form-data" id="formData">
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
            </div>
        </div>
        <div id="id01" class="w3-modal" >
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style='width:90%;height:140%'id="detailData">
        </div>
        </div>
    </div>



    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        function myFunc(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show"; 
                x.previousElementSibling.className += " w3-grey";
            } else { 
                x.className = x.className.replace(" w3-show", "");
                x.previousElementSibling.className = 
                x.previousElementSibling.className.replace(" w3-grey", "");
            }
        }

        openMail("Borge")
        function openMail(personName) {
            var i;
            var x = document.getElementsByClassName("person");
            for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
            }
            x = document.getElementsByClassName("test");
            for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" w3-light-grey", "");
            }
            document.getElementById(personName).style.display = "block";
            event.currentTarget.className += " w3-light-grey";
        }
    </script>

    <script>
        var openTab = document.getElementById("firstTab");
        openTab.click();
    </script>

    </body>
</html>