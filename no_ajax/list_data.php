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
                <script>
                $(document).ready(function(){
                    $("#all").click(function(){
                        $.ajax({
                            url : '_views/role_01_admin/data_data.php',
                            method : 'post',
                            data : {data : 'all', page : '1' },
                            success : function(data){
                                $("#indexData").html(data);
                            }
                        });
                        $(this).addClass('w3-brown');
                    
                    });

                    $("#ebook").click(function(){
                        $.ajax({
                            url : '_views/role_01_admin/data_data.php',
                            method : 'post',
                            data : {data : 'ebook', page : '1' },
                            success : function(data){
                                $("#indexData").html(data);
                            }
                        });
                    });
                    $("#jurnal").click(function(){
                        $.ajax({
                            url : '_views/role_01_admin/data_data.php',
                            method : 'post',
                            data : {data : 'jurnal', page : '1' },
                            success : function(data){
                                $("#indexData").html(data);
                            }
                        });
                    });
                    $("#artikel").click(function(){
                        $.ajax({
                            url : '_views/role_01_admin/data_data.php',
                            method : 'post',
                            data : {data : 'artikel', page : '1' },
                            success : function(data){
                                $("#indexData").html(data);
                            }
                        });
                    });
                });

                </script>
                <div class='w3-animate-right w3-section' >
                    <h2>List Data</h2>
                    <button id='all' class='tombolKonten w3-white'>All</button> <button id='ebook' class='tombolKonten'>E-book</button> <button id='jurnal' class='tombolKonten'>Jurnal</button> <button id='artikel' class='tombolKonten'>Artikel</button><br/>
                    <div id='indexData'>

                    <script>
                    $("#indexData").load('_views/role_01_admin/data_data.php', { data : 'all', page : '1'});
                    </script>

                    <?php

                    $cari = '';
                    $_SERVER['REQUEST_METHOD'] = "POST";
                    $_POST['data'] = 'all';
                    $_POST['page'] = '1';

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

                    </div>
                </div>

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