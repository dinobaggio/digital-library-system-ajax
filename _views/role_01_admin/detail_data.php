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

$ebook = '';
$download = "<button class='w3-button w3-gray' id='download'>download</button>";

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $loadDb = require_once("../../config/dbset.php");
    try {
        $que = "SELECT * FROM data_lampiran WHERE id=$id";
        $tugas = $kon->query($que);
        $data = $tugas->fetch();
        $nama_file = $data['nama_file'];
        $id_upload = $data['id_upload'];
        $tgl_upload = $data['tgl_upload'];
        $kategori = $data['kategori'];
        if ($kategori == 'ebook') {
            $ebook = '2';
            $download = '';
        }
        $tgl_upload = strtotime($tgl_upload);
        $tgl_upload = date("l F Y, H:i:s", $tgl_upload);
        ?>
    <script src="_asset/js/jquery-3.2.1.js"></script>

    <header class="w3-container w3-teal"> 
        <span onclick="$('#id01').fadeOut()" class="w3-button w3-display-topright"><i class="fa fa-remove" ></i></span>
        <h1><?php echo $data['judul'];?></h1>
    </header>
    <div class="" style='display:block'>
        <div id='detail' class='w3-text-black w3-cell' style='padding-left:5%;width:0%'>
            <p>Pengarang : <?php echo $data['pengarang'];?></p>
            <p>Kategori : <?php echo $data['kategori'];?></p>
            <p>Bahasa : <?php echo $data['bahasa'];?></p>
            <p>Penerbit : <?php echo $data['penerbit'] ?></p>
            <p>Tahun Penerbit : <?php echo $data['tahun_penerbit'];?></p>
            <p>Tempat Penerbit: <?php echo $data['tempat_penerbit'];?></p>
            <p>id file: <?php echo $data["id_upload"];?></p>
            <p>Tanggal Upload: <?php echo $tgl_upload?></p>
            <p id="lihatPdf" style="display:none"></p>
            <p id='pDownload' style="display:none"></p>
        </div>
    
        <div id='viewPdf' class='w3-cell' style='height:400px;display: block;margin-top:-25%;margin-left:40%'>
            <span id='tutup' class="w3-text-black w3-button w3-right" style='display:none;margin-top:-5%'><i class="fa fa-remove" ></i></span>
            <div class="w3-center" id='tesObejct' style="display:none;height:100%;width:100%">
                <!--<iframe src="upload/ebook/<?php //echo $nama_file;?>/non_user.pdf#zoom=80" class='data' id="frame" style="display:none;height:600px;width:80%" allowfullscreen webkitallowfullscreen></iframe>-->
            </div>
            <div class='w3-center '>
                <img class="w3-round w3-card-4 w3-button" style='padding:0;' src="upload/imgcilik/<?php echo $nama_file;?>.jpeg" id='imgcilik' width="200" height="225" />
            </div>
        </div>
        
    </div>

    <footer class="w3-container w3-teal" style='margin-top:20%'>
        <p><button class="w3-button w3-gray" id='lihat'>Lihat</button> <?php echo $download?> </p>
    </footer>
    
    
    <script>
    $(document).ready(function(){
        var terlihat = 0;
        $("#lihat").click(function(){
            //$("iframe.data").toggle('slow');
            /*
            $("#tesView").toggle('slow');
            
            $("#imgcilik").toggle('slow');
            $("#tutup").toggle('slow');
            */
            /*
            if (terlihat == 0){
                $("#tesView").show('slow', function(){
                    $('#tesView').attr('data', "pdfjs-1.9.426-dist/web/viewer2.html?file=../../upload/ebook/<?php echo $nama_file;?>/non_user.pdf#zoom=80");
                    console.log('animasi complet')
                });
                
                terlihat = 1;
            } else {
                $("#tesView").hide('slow');
                $('#tesView').attr('data', "");
                terlihat = 0;
            }*/
            if( terlihat == 0 ){
                $('#tesObejct').show('slow', function(){
                    $('#tesObejct').append("<object data='pdfjs-1.9.426-dist/web/viewer<?php echo $ebook?>.html?file=../../upload/ebook/<?php echo $nama_file;?>/full_pdf.pdf#zoom=90' id='tesView' class='tesView' style='margin-left:-10%;padding-right:10%;height:150%;width:115%'></object>");
                });
                
                $("#tutup").show('slow');
                $("#imgcilik").hide('slow');
                terlihat = 1;
                
            } else {
                $('#tesObejct').hide('slow', function(){
                    $('#tesView').remove();
                });
                $("#tutup").hide('slow');
                $("#imgcilik").show('slow');
                terlihat = 0;
            }
        });
        $("#tutup").click(function(){
            //$("iframe.data").toggle('slow');
            //$("#tesView").toggle('slow');
            //$("#imgcilik").toggle('slow');
            //$(this).toggle('slow');
            if( terlihat == 0 ){
                $('#tesObejct').show('slow', function(){
                    $('#tesObejct').append("<object data='pdfjs-1.9.426-dist/web/viewer<?php echo $ebook?>.html?file=../../upload/ebook/<?php echo $nama_file;?>/full_pdf.pdf#zoom=90' id='tesView' class='tesView' style='margin-left:-10%;padding-right:10%;height:150%;width:115%'></object>");
                });
                
                $("#tutup").show('slow');
                $("#imgcilik").hide('slow');
                terlihat = 1;
                
            } else {
                $('#tesObejct').hide('slow', function(){
                    $('#tesView').remove();
                });
                $("#tutup").hide('slow');
                $("#imgcilik").show('slow');
                terlihat = 0;
            }
        });
        $("#imgcilik").click(function(){
            //$("iframe.data").toggle('slow');
            //$("#tesView").toggle('slow');
            //$(this).toggle('slow');
            //$("#tutup").toggle('slow');
            if( terlihat == 0 ){
                $('#tesObejct').show('slow', function(){
                    $('#tesObejct').append("<object data='pdfjs-1.9.426-dist/web/viewer<?php echo $ebook?>.html?file=../../upload/ebook/<?php echo $nama_file;?>/full_pdf.pdf#zoom=90' id='tesView' class='tesView' style='margin-left:-10%;padding-right:10%;height:150%;width:115%'></object>");
                });
                
                $("#tutup").show('slow');
                $("#imgcilik").hide('slow');
                terlihat = 1;
                
            } else {
                $('#tesObejct').hide('slow', function(){
                    $('#tesView').remove();
                });
                $("#tutup").hide('slow');
                $("#imgcilik").show('slow');
                terlihat = 0;
            }
        });
        $("#download").click(function(){
            window.open("_views/role_03_dosen/download_pdf.php?file=<?php echo $nama_file;?>");
        }); 
    });

    </script>
    
    <script>
        /* $.ajax({
            url:'_views/role_02_user/get_pdf.php',
            method : 'get',
            data: { id: "<?php //echo $id_upload;?>"},
            success : function (data) {
                $("#lihatPdf").html(data);
            }
        }) */
    </script>
    <?php
    } catch(PDOException $e) {
        echo "error :".$e->getMessage();
    }

}

?>



<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>