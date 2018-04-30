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

$cari = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(isset($_POST['cari'])) {
        $cari = array();
        parse_str($_POST['cari'], $cari);
        $cari = $cari['cari'];
        if($cari != '' ) {
            $cari = $cari;
        } else {
            $cari = '';
        }
    } else {
        $cari = '';
    }

/* EBOOKTAB */

    if($_POST['data'] == 'ebook') {
        $sub = 'ebook';
        $title = 'E-Book';
    } else if ($_POST['data'] == 'jurnal') {
        $sub = 'jurnal';
        $title = 'Jurnal';
    } else if ($_POST['data'] == 'artikel') {
        $sub = 'artikel';
        $title = 'Artikel';
    } else if($_POST['data'] == 'all') { 
        $sub = 'all';
        $title = 'All';
    } else if ($_POST['data'] == 'skripsi') {
        $sub = 'skripsi';
        $title = 'Skripsi';
    }

    ?>
    
    <script>
        $(document).ready(function(){
            $("#formCari").submit(function(){
                var cari = $("[name=cari]").serialize();
                $.ajax({
                    url : '_views/role_01_admin/data_data.php',
                    method : 'POST',
                    data : { data : '<?php echo $sub?>', page : '1', cari : cari },
                    success : function(data){
                        $("#indexData").html(data);
                    }
                });
            });
        });
    </script>
    <br/>
    <form class="w3-right" action='javascript:void(0)' id="formCari" >
        <table>
            <tr><td><input type='text' name='cari' value='<?php echo $cari;?>'/></td> <td><input type='submit' value='Cari' /></td></tr>
        </table>
    </form>
    
    
        <?php
            $fileDb = require_once('../../config/dbset.php');
            if (isset($_POST['cari'])) {
                $cari = array();
                parse_str($_POST['cari'], $cari);
                $cari = $cari['cari'];
                if ($cari !='') {
                    if ($sub == 'all') {
                        $que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%' OR nama_file LIKE '%$cari%' OR id_upload LIKE '%$cari%' ORDER BY tgl_upload DESC";
                    } else {
                        $que = "SELECT * FROM data_lampiran WHERE kategori='$sub' AND judul LIKE '%$cari%' OR kategori='$sub' AND nama_file LIKE '%$cari%' OR kategori='$sub' AND id_upload LIKE '%$cari%' ORDER BY tgl_upload DESC";
                    }
                    
                } else {
                    if ($sub == 'all') {
                        $que = "SELECT * FROM data_lampiran ORDER BY tgl_upload DESC";
                    } else {
                        $que = "SELECT * FROM data_lampiran WHERE kategori='$sub' ORDER BY tgl_upload DESC";
                    }
                }
            } else {
                if ($sub == 'all') {
                    $que = "SELECT * FROM data_lampiran ORDER BY tgl_upload DESC";
                } else {
                    $que = "SELECT * FROM data_lampiran WHERE kategori='$sub' ORDER BY tgl_upload DESC";
                }
                
            }
            
            $tugas = $kon->query($que);
            $total = $tugas->rowCount();
            $banyak_page = 5;
            $last_page = ceil($total/$banyak_page);
            if($last_page < 1) {
                $last_page = 1;
            }
            $page = $_POST['page'];
            if ($page <= 0) {
                $page = 1;
            }
            if ($page > $last_page) {
                $page = $last_page;
            }
            if (isset($_POST['cari'])) {
                
                $cari = array();
                parse_str($_POST['cari'], $cari);
                $cari = $cari['cari'];
                if ($cari != '') {
                    if ($sub == 'all') {
                        $que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%' OR nama_file LIKE '%$cari%' OR id_upload LIKE '%$cari%' ORDER BY tgl_upload DESC LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                    } else {
                        $que = "SELECT * FROM data_lampiran WHERE kategori='$sub' AND judul LIKE '%$cari%' OR kategori='$sub' AND nama_file LIKE '%$cari%' OR kategori='$sub' AND id_upload LIKE '%$cari%' ORDER BY tgl_upload DESC LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                    }
                    
                } else {
                    if ($sub == 'all') {
                        $que = "SELECT * FROM data_lampiran ORDER BY tgl_upload DESC LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                    } else {
                        $que = "SELECT * FROM data_lampiran WHERE kategori='$sub' ORDER BY tgl_upload DESC LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                    }
                }
            } else {
                if ($sub == 'all') {
                    $que = "SELECT * FROM data_lampiran ORDER BY tgl_upload DESC LIMIT  ".($page - 1) * $banyak_page.", ".$banyak_page;
                } else {
                    $que = "SELECT * FROM data_lampiran WHERE kategori='$sub' ORDER BY tgl_upload DESC LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                }
                
            }
            $tugas = $kon->query($que);
            unset($fileDb);
            unset($kon);
            echo "<div class='w3-responsive' style='width:99%'>";
            echo "<table class='w3-table w3-container' >";
            echo "<tr class='w3-black w3-opacity'><th>Judul</th><th>Pengarang</th><th>Kategori</th><th>Bahasa</th><th>Penerbit</th><th>Detail</th></tr>";
            while($baris = $tugas->fetch()) { ?>
    
                <tr>
                <td><?php echo $baris['judul'];?></td>
                <td><?php echo $baris['pengarang'];?></td>
                <td><?php echo $baris['kategori'];?></td>
                <td><?php echo $baris['bahasa'];?></td>
                <td><?php echo $baris['penerbit'];?></td>
                <td><button name="<?php echo $baris['id'];?>" class='tombolKonten'>Detail</button></td>
                </tr>
                <script>
                    $("[name=<?php echo $baris['id']?>]").click(function(){
                        $("#id01").show();
                        $.ajax({
                            url : '_views/role_01_admin/detail_data.php',
                            method : 'POST',
                            data : { id: "<?php echo $baris['id'];?>" },
                            success : function(data){
                                //$("#indexData").html(data);
                                $("#detailData").html(data);
                            }
                        });
                    });
                </script>
                
            
                
        <?php    }
    
            echo "</table> <br/>"; ?>
            
            <script>
                $(document).ready(function(){
                    $("#next").click(function(){
                        var cari = "cari=<?php echo $cari;?>";
                        $.ajax({
                            url:'_views/role_01_admin/data_data.php',
                            method : 'post',
                            data : { data: '<?php echo $sub?>', page : "<?php echo $page+1;?>", cari:cari},
                            success : function(data){
                                $("#indexData").html(data);
                            }
                        });
                        window.scrollTo(0, 0);
                    });
                    $("#previous").click(function(){
                        var cari = "cari=<?php echo $cari;?>";
                        $.ajax({
                            url:'_views/role_01_admin/data_data.php',
                            method : 'post',
                            data : { data: '<?php echo $sub?>', page : "<?php echo $page-1;?>", cari:cari},
                            success : function(data){
                                $("#indexData").html(data);
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
                                    var cari = "cari=<?php echo $cari;?>";
                                    $.ajax({
                                        url:'_views/role_01_admin/data_data.php',
                                        method : 'post',
                                        data : { data: '<?php echo $sub?>', page : "<?php echo $i;?>", cari:cari },
                                        success : function(data){
                                            $("#indexData").html(data);
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
                            var cari = "cari=<?php echo $cari;?>";
                            $.ajax({
                                url:'_views/role_01_admin/data_data.php',
                                method : 'post',
                                data : { data: '<?php echo $sub?>', page : "<?php echo $i;?>", cari:cari },
                                success : function(data){
                                    $("#indexData").html(data);
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
            <?php
} else {

    echo "halo pak";
}




?>



<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>