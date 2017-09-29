<?php

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $que = "SELECT * FROM data_lampiran WHERE id='$id'";
        $tugas = $kon->query($que);
        $data = $tugas->fetch(); ?>
    <script src="_asset/js/jquery-3.2.1.js"></script>
    <h1><?php echo $data['judul'];?></h1>
    <p>Pengarang : <?php echo $data['pengarang'];?></p>
    <p>Kategori : <?php echo $data['kategori'];?></p>
    <p>Bahasa : <?php echo $data['bahasa'];?></p>
    <p>Penerbit : <?php echo $data['penerbit'] ?></p>
    <p>Tahun Penerbit : <?php echo $data['tahun_penerbit'];?></p>
    <p>Tempat Penerbit: <?php echo $data['tempat_penerbit'];?></p>
    <p>Info Lainnya : <?php echo $data['info_detail'];?></p>
    <button id='lihat'>Lihat</button> <button id='download'>download</button>
    <p id='pDownload' style="display:none"></p>
    <script>
    $("#lihat").click(function(){
        $("#lihatPdf").toggle('slow');
    });

    $("#download").click(function(){
        window.open("download_pdf.php?id=<?php echo $id;?>", "_self");
    });

    </script><br/>
    <iframe id="lihatPdf" src="get_pdf.php?id=<?php echo $id;?>" style="display:none;height:500px;width:60%" ></iframe>

    <?php
    } catch(PDOException $e) {
        echo "error :".$e->getMessage();
    }

}

?>