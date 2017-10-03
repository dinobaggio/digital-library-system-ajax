<script src="_asset/js/public.js"></script>
<?php

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $loadDb = require_once("../../config/dbset.php");
    try {
        $que = "SELECT * FROM data_lampiran WHERE id=$id";
        $tugas = $kon->query($que);
        $data = $tugas->fetch();
        $nama_file = $data['nama_file'];
        $id_upload = $data['id_upload'];
        ?>
    <script src="_asset/js/jquery-3.2.1.js"></script>

    <header class="w3-container w3-teal"> 
        <span onclick="$('#id01').fadeOut()" class="w3-button w3-display-topright"><i class="fa fa-remove" ></i></span>
        <h1><?php echo $data['judul'];?></h1>
    </header>
    <div class="w3-container" >
        <div class="w3-center">
            <iframe src="upload/<?php echo $nama_file;?>#zoom=80" class='data' style="display:none;height:600px;width:80%" allowfullscreen webkitallowfullscreen></iframe>
        </div>
        <p>Pengarang : <?php echo $data['pengarang'];?></p>
        <p>Kategori : <?php echo $data['kategori'];?></p>
        <p>Bahasa : <?php echo $data['bahasa'];?></p>
        <p>Penerbit : <?php echo $data['penerbit'] ?></p>
        <p>Tahun Penerbit : <?php echo $data['tahun_penerbit'];?></p>
        <p>Tempat Penerbit: <?php echo $data['tempat_penerbit'];?></p>
        <p>Info Lainnya : <?php echo $data['info_detail'];?></p>
        <p id="lihatPdf" style="display:none"></p>
        <p id='pDownload' style="display:none"></p>
    </div>

    <footer class="w3-container w3-teal">
        <p><button class="w3-button w3-gray" id='lihat'>Lihat</button> <button class="w3-button w3-gray" id='download'>download</button></p>
    </footer>
    
    
    <script>
    $(document).ready(function(){
        $("#lihat").click(function(){
            $("iframe.data").toggle('slow');
        });

        $("#download").click(function(){
            window.open("_views/role_02_user/download_pdf.php?file=<?php echo $nama_file;?>");
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