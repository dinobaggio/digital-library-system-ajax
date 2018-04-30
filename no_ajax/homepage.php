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
    <!-- home_non_user -->
        <!-- proses seluruh aplikasi disini -->
        <header class="w3-container w3-center w3-animate-top w3-padding-16 w3-indigo ">
    <h2>Digital Library FTI - Perbanas Institute</h2>
    <button id='all' class='tombolKonten'>All</button> 
    <button id='ebook' class='tombolKonten'>E-book</button> 
    <button id='jurnal' class='tombolKonten'>Jurnal</button> 
    <button id='artikel' class='tombolKonten'>Artikel</button> 
    <button id='skripsi' class='tombolKonten'>Skripsi</button>
    <br/>
</header>

<script>
    $("#all").removeClass('w3-black');
    $("#all").addClass('w3-gray');

    $("#all").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#ebook").removeClass('w3-gray');
        $("#ebook").addClass('w3-black');

        $("#jurnal").removeClass('w3-gray');
        $("#jurnal").addClass('w3-black');

        $("#artikel").removeClass('w3-gray');
        $("#artikel").addClass('w3-black');

        $("#skripsi").removeClass('w3-gray');
        $("#skripsi").addClass('w3-black');
    });

    $("#ebook").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#jurnal").removeClass('w3-gray');
        $("#jurnal").addClass('w3-black');

        $("#all").removeClass('w3-gray');
        $("#all").addClass('w3-black');

        $("#artikel").removeClass('w3-gray');
        $("#artikel").addClass('w3-black');

        $("#skripsi").removeClass('w3-gray');
        $("#skripsi").addClass('w3-black');
    });

    $("#jurnal").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#ebook").removeClass('w3-gray');
        $("#ebook").addClass('w3-black');

        $("#all").removeClass('w3-gray');
        $("#all").addClass('w3-black');

        $("#artikel").removeClass('w3-gray');
        $("#artikel").addClass('w3-black');

        $("#skripsi").removeClass('w3-gray');
        $("#skripsi").addClass('w3-black');
    });

    $("#artikel").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#ebook").removeClass('w3-gray');
        $("#ebook").addClass('w3-black');

        $("#all").removeClass('w3-gray');
        $("#all").addClass('w3-black');

        $("#jurnal").removeClass('w3-gray');
        $("#jurnal").addClass('w3-black');

        $("#skripsi").removeClass('w3-gray');
        $("#skripsi").addClass('w3-black');
    });

    $("#skripsi").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#ebook").removeClass('w3-gray');
        $("#ebook").addClass('w3-black');

        $("#artikel").removeClass('w3-gray');
        $("#artikel").addClass('w3-black');

        $("#all").removeClass('w3-gray');
        $("#all").addClass('w3-black');

        $("#jurnal").removeClass('w3-gray');
        $("#jurnal").addClass('w3-black');
    });
</script>

<div class="w3-container w3-row">
    
    <div class="w3-col l8 s12 w3-margin-bottom w3-animate-left">
        <div id="indexNonUser">
        <!-- list_data -->
            
            <script>
                if(document.getElementById("indexAjax") == null) {
                    window.location = '../../index.php';
                }
            </script>



            <script>

            $(document).ready(function(){
                $("#all").click(function(){
                    $.ajax({
                        url : '_views/role_04_non_user/data_data.php',
                        method : 'post',
                        data : {data : 'all', page : '1' },
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });

                $("#ebook").click(function(){
                    $.ajax({
                        url : '_views/role_04_non_user/data_data.php',
                        method : 'post',
                        data : {data : 'ebook', page : '1' },
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#jurnal").click(function(){
                    $.ajax({
                        url : '_views/role_04_non_user/data_data.php',
                        method : 'post',
                        data : {data : 'jurnal', page : '1' },
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#artikel").click(function(){
                    $.ajax({
                        url : '_views/role_04_non_user/data_data.php',
                        method : 'post',
                        data : {data : 'artikel', page : '1' },
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#skripsi").click(function(){
                    $.ajax({
                        url : '_views/role_04_non_user/data_data.php',
                        method : 'post',
                        data : {data : 'skripsi', page : '1' },
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
            });

            </script>



            <div id='indexData'>

                <script>
                $("#indexData").load('_views/role_04_non_user/data_data.php', { data : 'all', page : '1'});
                </script>

                
                    <?php

                    $cari = '';
                    $_SERVER['REQUEST_METHOD'] = "POST";
                    $_POST['data'] = "all";

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
                                        url : '_views/role_04_non_user/data_data.php',
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
                                $fileDb = require_once('../config/dbset.php');
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
                                $page = 1;
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
                                echo "<h3>$title</h3>";
                                while($baris = $tugas->fetch()) { 
                                    $nama_file = $baris['nama_file'];
                                    ?>
                                    <div class="w3-card-4 w3-margin w3-white">
                                        <div class="w3-container">
                                            <h3><b><?php echo $baris['judul'];?></b></h3>
                                            <img class="w3-round w3-card-4" src="../upload/imgcilik/<?php echo $nama_file;?>.jpeg"  width="200" height="225" />
                                            <h5><b>pengarang:</b> <?php echo $baris['pengarang'];?> <br/><b>kategori:</b> <?php echo $baris['kategori'];?></h5>
                                        </div>
                                        <div class="w3-container">
                                            <p><?php echo $baris['info_detail'];?></p>
                                            <div class="w3-row">
                                                <div class="w3-col m8 s12">
                                                    <p><button class="w3-padding-large tombolKonten w3-border" onclick="$('#id01').fadeIn()"
                                                    name="<?php echo $baris['id'];?>" ><b>Detail</b></button></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <script>
                                        $("[name=<?php echo $baris['id']?>]").click(function(){
                                            $.ajax({
                                                url : '_views/role_04_non_user/detail_data.php',
                                                method : 'POST',
                                                data : { id: "<?php echo $baris['id'];?>" },
                                                success : function(data){
                                                    $("#detailData").html(data);
                                                }
                                            });
                                        });
                                    </script>
                                    
                                
                                    
                            <?php    }
                        
                                //echo "</table>"; ?>
                                
                                <script>
                                    $(document).ready(function(){
                                        $("#next").click(function(){
                                            var cari = "cari=<?php echo $cari;?>";
                                            $.ajax({
                                                url:'_views/role_04_non_user/data_data.php',
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
                                                url:'_views/role_04_non_user/data_data.php',
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
                                                            url:'_views/role_04_non_user/data_data.php',
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
                                                    url:'_views/role_04_non_user/data_data.php',
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


            </div>


            <script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
                if (document.getElementById("indexAjax") == null) {
                    window.open("../../index.php","_self");
                }
                
            </script>
        </div>
    </div>

    <div class="w3-container w3-margin-bottom w3-col l4 w3-animate-right">
        <h1>Digital Library</h1>
        <p>Silahkan Login</p>
        <p>Untuk akses lebih lanjut</p><br/>
        <button class="tombolKonten" id="login" onclick="login()">Login</button>
    </div>

</div>



<!-- MODAL -->

<div id="id01" class="w3-modal" >
    <div class="w3-modal-content w3-card-4" style='width:90%;height:140%'id="detailData">
    </div>
</div>



        <script>
            $("body").removeClass("w3-teal");
            $("body").addClass("w3-brown");
            function login() {
                window.location = 'login.php';
            }
        </script>
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