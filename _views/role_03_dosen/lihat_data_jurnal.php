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

require_once('../../config/dbset.php');
$id_dosen = $_SESSION['username'];

if (isset($_POST['cariJurnal'])) {
    $cari = array();
    parse_str($_POST['cariJurnal'], $cari);
    $cari = $cari['cariJurnal'];
    
    if ($cari !='') {
        //$que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%'";
        $que = "SELECT * FROM jurnal_dosen WHERE id_dosen='$id_dosen' AND judul_jurnal LIKE '%$cari%' OR id_dosen='$id_dosen' AND nama_file LIKE '%$cari%' OR id_dosen='$id_dosen' AND id_jurnal LIKE '%$cari%'";
        
    } else {
        $que = "SELECT * FROM jurnal_dosen WHERE id_dosen='$id_dosen'";
        
    }
} else {
    $que = "SELECT * FROM jurnal_dosen WHERE id_dosen='$id_dosen'";
    $cari = '';
}

$tugas = $kon->query($que);
$total = $tugas->rowCount();
$banyak_page = 5;
$last_page = ceil($total/$banyak_page);
if($last_page < 1) {
    $last_page = 1;
}

if (!isset($_POST['page'])) {
    $page = 1;
} else {
    $page = $_POST['page'];
}

if ($page <= 0) {
    $page = 1;
}
if ($page > $last_page) {
    $page = $last_page;
}


if ($cari !='') {
    $que = "SELECT * FROM jurnal_dosen WHERE id_dosen='$id_dosen' AND judul_jurnal LIKE '%$cari%' OR id_dosen='$id_dosen' AND nama_file LIKE '%$cari%' OR id_dosen='$id_dosen' AND id_jurnal LIKE '%$cari%' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
} else {
    $que = "SELECT * FROM jurnal_dosen WHERE id_dosen='$id_dosen' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
}

$tugas = $kon->query($que);
unset($fileDb);
unset($kon);


?>

<div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
    <br/>
    <div class="w3-black w3-container">
    <h2>Jurnal / Publikasi yang telah diupload</h2>
    </div>
    <br/>
    <form method="POST" action="javascript:void(0)" id="formCariJurnal">
        <table>
            <tr><td><input type='text' class="w3-input w3-light-grey" placeholder="Cari ... " name='cariJurnal' /></td> <td><input type='submit' class="w3-button w3-grey" value='Cari' /></td></tr>
        </table>
    </form>
    <table class='w3-table w3-container' >
        <thead class="w3-black">
            <tr><th>Judul</th><th>Bahasa</th><th>Detail</th></tr>
        </thead>
        <tbody>
        <?php
            while($baris = $tugas->fetch()) { ?>
                <tr><td><?php echo $baris['judul_jurnal']?></td><td><?php echo $baris['bahasa_jurnal']?></td><td><button name="<?php echo $baris['id_data_lampiran']?>" class='w3-button w3-black' onclick="$('#id01').fadeIn()">Detail</button></td></tr>
                <script>
                    $("[name=<?php echo $baris['id_data_lampiran']?>]").click(function(){
                        $.ajax({
                            url : '_views/role_03_dosen/detail_data.php',
                            method : 'POST',
                            data : { id: "<?php echo $baris['id_data_lampiran'];?>" },
                            success : function(data){
                                $("#detailData").html(data);
                            }
                        });
                    });
            </script>
        <?php  }
        ?>
        </tbody>
    </table>
    </div>
    <div class="w3-container">
        <p></p>
        <div class="w3-row">
            <div class="w3-col m8 s12">
            <script>
            $(document).ready(function(){
                $("#next").click(function(){
                    var cari = "cariJurnal=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_03_dosen/lihat_data_jurnal.php',
                        method : 'post',
                        data : { page : "<?php echo $page+1;?>", cariJurnal:cari},
                        success : function(data){
                            $("#indexDosen").html(data);
                        }
                    });
                    window.scrollTo(0, 0);
                });
                $("#previous").click(function(){
                    var cari = "cariJurnal=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_03_dosen/lihat_data_jurnal.php',
                        method : 'post',
                        data : { data: 'ebook', page : "<?php echo $page-1;?>", cariJurnal:cari},
                        success : function(data){
                            $("#indexDosen").html(data);
                        }
                    });
                    window.scrollTo(0, 0);
                });
            });
        </script>

            <button id='previous' class='tombolKonten'>previous</button> 
            <?php 
            if($last_page != 1) {
                if($page > 1) {
                    for($i = $page-2; $i < $page; $i++) {
                        if($i > 0) {
                            ?>
                                <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                                <script>
                                $("[name=<?php echo $i;?>]").click(function(){
                                    var cari = "cariJurnal=<?php echo $cari;?>";
                                    $.ajax({
                                        url:'_views/role_03_dosen/lihat_data_jurnal.php',
                                        method : 'post',
                                        data : { page : "<?php echo $i;?>", cariJurnal:cari },
                                        success : function(data){
                                            $("#indexDosen").html(data);
                                        }
                                    });
                                    window.scrollTo(0, 0);
                                });
                            </script>
                            <?php
                        }
                    }
                }

                ?>
                <button class='w3-button w3-black' ><?php echo $page; ?></button>
                <?php
                for($i = $page+1; $i <= $last_page; $i++) {
                    ?>
                    <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                    <script>
                        $("[name=<?php echo $i;?>]").click(function(){
                            var cari = "cariJurnal=<?php echo $cari;?>";
                            $.ajax({
                                url:'_views/role_03_dosen/lihat_data_jurnal.php',
                                method : 'post',
                                data : { page : "<?php echo $i;?>", cariJurnal:cari },
                                success : function(data){
                                    $("#indexDosen").html(data);
                                }
                            });
                            window.scrollTo(0, 0);
                        });
                    </script>
                    <?php
                    if($i >= $page+2) {
                        break;
                    }
                }
            }
            
            
            ?> 
            <button id='next' class='tombolKonten'>next</button> 
               <br/><br/>


            </div>
        </div>
    </div>
</div>






<script>
//{ data : 'jurnal', page : '1', cari : cari }
$(document).ready(function () {
    $("#formCariJurnal").submit(function(){
            var cariJurnal = $("[name=cariJurnal]").serialize();
            
            $.ajax({
                url : '_views/role_03_dosen/lihat_data_jurnal.php',
                method : 'POST',
                data : {cariJurnal : cariJurnal, page: 1},
                success : function(data){
                    $("#indexDosen").html(data);
                }
            });
        });
});
        
</script>