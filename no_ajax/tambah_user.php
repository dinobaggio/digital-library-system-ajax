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
            <?php

                $errPassword = '';
                $password = '';

                $errRePassword = '';
                $rePassword = '';

                $errUsername = '';
                $username = '';

                $errRole = '';
                $roleDefault = 'selected';
                $roleUser = '';
                $roleDosen = '';

                $full_nama = '';
                $errFull_nama = '';

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $data = [
                        'username' => $_POST['username'],
                        'password' => $_POST['password'],
                        'rePassword' => $_POST['rePassword'],
                        'role' => $_POST['role'],
                        'full_nama' => $_POST['full_nama']
                    ];
                    
                    $username = $data['username'];
                    $password = $data['password'];
                    $rePassword = $data['rePassword'];
                    if(empty($data['username'])) {
                        $errUsername = '*username harus diisi';
                    } else {
                        $username = $data['username'];
                        $loadDb = require_once('../config/dbset.php');
                        $que = "SELECT username FROM pengguna WHERE username='$username'";
                        $tugas = $kon->query($que);
                        $tugas->execute();
                        $user = $tugas->rowCount();
                        $loadDb = null;
                        if($user == 1) {
                            $errUsername = '*user sudah ada silahkan gunakan yang lain';
                        } else {
                            $username = $data['username'];
                            $errUsername = '';
                        }
                    }

                    if(empty($data['password'])) {
                        $errPassword = '*password harus diisi';
                    }

                    if(empty($data['rePassword'])) {
                        $errRePassword = '*password ulang harus diisi';
                    } else {
                        if ($data['password'] !== $data['rePassword']) {
                            $errRePassword = '*password ulang tidak sama';
                        } else {
                            $password = $data['password'];
                        }
                    }

                    if(empty($data['role'])) {
                        $errRole = "*Role harus dipilih";
                    } else {
                        $role = $data['role'];
                        switch($role) {
                            case $role == 'user' :
                            $roleDefault = '';
                            $roleUser = 'selected';
                            $roleDosen = '';
                            break;
                            case $role == 'dosen' :
                            $roleDefault = '';
                            $roleUser = '';
                            $roleDosen = 'selected';
                            break;
                            default :
                            $roleDefault = 'selected';
                            $roleUser = '';
                            $roleDosen = '';
                        }
                    }

                    if(empty($data['full_nama'])) {
                        $errFull_nama = "*Harap isi full nama";
                    } else {
                        $full_nama = $data['full_nama'];
                    }

                    if ($username != '' &&
                    $password != '' &&
                    $errPassword == '' &&
                    $errRePassword == '' &&
                    $errUsername == '' &&
                    $errRole == ''&&
                    $errFull_nama == '') {
                        $dbLoad = require_once('../config/dbset.php');
                        $que = "INSERT INTO pengguna (username, password, role, full_nama) VALUES (:username, :password, :role, :full_nama)";
                        $tugas = $kon->prepare($que);
                        $tugas->bindParam(':username', $username);
                        $tugas->bindParam(':password', $password);
                        $tugas->bindParam(':role', $role);
                        $tugas->bindParam(':full_nama', $full_nama);
                        $password = md5($password);
                        //$role = 'user';
                        if($tugas->execute()) {
                            echo "sukses memasukan data";
                            $full_nama = '';
                            $username = '';
                            $password = empty($password);
                            $rePassword = empty($rePassword);
                        }
                        unset($dbLoad);
                        unset($kon);
                        ?>
                        <script>
                            alert('berhasil membuat user');
                            $('#indexAdmin').load('_views/role_01_admin/tambah_user.php');
                            window.location = 'tambah_user.php';
                        </script>
                        <?php
                    }


                }

                ?>



                <script src="_asset/js/public.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#formUser').submit(function(){
                            $.ajax({
                                url : '_views/role_01_admin/tambah_user.php',
                                method : 'POST',
                                data : { data : $(this).serialize() },
                                success : function(data) {
                                    $("#indexAdmin").html(data);
                                }
                            });
                        });
                    });

                </script>

                <div class='w3-animate-right w3-section'>
                    <h2>Tambah User</h2>

                    <form id='formUser' method="POST" action='tambah_user.php'>
                    <table>
                        <tr><td>Full Nama: </td><td><input type="text" name="full_nama" value="<?php echo $full_nama?>" placeholder="Full Nama" /></td><td><span class='error' ><?php echo $errFull_nama?></span></td></tr>
                        <tr><td>Username : </td><td><input type='text' name='username' value="<?php echo $username;?>" placeholder='Username ...' /></td><td><span class='error'><?php echo $errUsername; ?></span></td></tr>
                        <tr><td>Password : </td><td><input type='password' name='password' value="<?php echo $password;?>" placeholder='Password ...' /></td><td><span class='error'><?php echo $errPassword; ?></span></td></tr>
                        <tr><td>Ulangi Password : </td><td><input type='password' name='rePassword' value="<?php echo $rePassword;?>" placeholder='Password ...' /></td><td><span class='error'><?php echo $errRePassword;?></span></td></tr>
                        <tr><td>Role : </td><td>
                        <select id="role" name='role' >
                            <option value="" <?php echo $roleDefault?> >Masukan role ...</option>
                            <option value="user" <?php echo $roleUser?> >User</option>
                            <option value="dosen" <?php echo $roleDosen?> >Dosen</option>
                        </select>
                        </td><td><span class="error" ><?php echo $errRole?></span></td></tr>
                        <tr><td><input type='submit' value='simpan!'></td></tr>
                    </table>
                    </form>
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