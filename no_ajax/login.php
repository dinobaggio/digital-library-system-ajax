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

$username = '';
$password = '';
$errLogin = '';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];
    $username = $data['username'];
    $password = $data['password'];
    if (empty($username) || empty($password)) {
        $username = '';
        $password = '';
        $errLogin = '* data tidak boleh kosong';
    } else {
        $password = md5($password);
        $loadDb = require_once('../config/dbset.php');
        try {

            $que = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
            $tugas = $kon->query($que);
            $tugas->execute();
            $data = $tugas->fetch();
            $login = $tugas->rowCount();
            unset($loadDb);
            unset($kon);
            if ($login == 1) {
                
                $_SESSION['username'] = $data['username'];
                $_SESSION['role'] = $data['role']; 
                header("Location: login.php");
            } else {
                $username = '';
                $password = '';
                $errLogin = "* Data tidak ada";
                unset($loadDb);
                unset($kon);
            }
        } catch (PDOException $e) {
            echo "error message: ". $e->getMessage();
            unset($loadDb);
            unset($kon);
        }


        
    }
}




?>


<script>
$(document).ready(function(){
    $("#formLogin").submit(function(){
       $.ajax({
           url:'_views/login/login.php',
           method: 'POST',
           cache: false,
           data: { data: $(this).serialize() },
           success: function(data){
               $("#indexAjax").html(data);
           }
       });
    });
    $("[name=username]").focus();
    $("#kembali").click(function(){
        $("body").removeClass("w3-teal");
        $("body").addClass("w3-brown");
        $("#indexAjax").load("_views/role_04_non_user/home_non_user.php");
    });
});
</script>
<script src="../_asset/js/public.js"></script>
<?php

if(isset($_SESSION['username']) && isset($_SESSION['role'])) {
   switch($_SESSION['role']) {
       case $_SESSION['role'] == 'admin' : ?>

         <script>
            $("body").removeClass("w3-brown");
            $("body").addClass("w3-teal");
            window.location = "homepage_admin.php";
        </script>   
 
            <?php
                break;
                case $_SESSION['role'] == 'user' : ?>

                    <script>
                        $("body").removeClass("w3-brown");
                        $("body").addClass("w3-cyan");
                        $("#indexAjax").load("_views/role_02_user/home_user.php");
                    </script>   
            
            <?php
                break;
                case $_SESSION['role'] == 'dosen' : ?>
                    <script>
                        $("body").removeClass("w3-brown");
                        $("body").addClass("w3-khaki");
                        $("#indexAjax").load("_views/role_03_dosen/home_dosen.php");
                    </script>
                <?php
                break;
                default :
                $username = '';
                $password = '';
                $errLogin = '*Data tidak ada';
            }

            } else { 
                
                
                ?>

            <div id='login' class="w3-modal" style="z-index:4">
                <div class="w3-modal-content w3-animate-zoom" style='width:500px;'>
                    <div colspan='2' class="w3-container w3-indigo" ><h3 class="w3-left">Login </h3><button id="kembali" class="w3-button w3-red w3-right" style="margin-top:1%">Kembali</button></div>
                    <form id="formLogin" method="POST" action="login.php">
                        <table class='w3-border' >
                            <tr><td></td><td></td><td rowspan='3' align='center' style='width:40%;'><img  src='_asset/gambar/Logo_Perbanas.png' style='width:50%' alt='avatar' /></td></tr>
                            <tr><td>Username: </td><td><input type="text" name="username" value="<?php echo $username;?>" placeholder="Username"></td></tr>
                            <tr><td>Password: </td><td><input type="password" name="password" value="<?php echo $password;?>" placeholder="Password"></td></tr>
                            <tr><td><input type="submit" value="Login" /></td><td><span class="error"><?php echo $errLogin;?></span></td></tr>
                        </table> 
                    </form>
                    
                </div>

            </div>

            <script>
            $("body").removeClass("w3-brown");
            $("body").removeClass("w3-cyan");
            $("body").removeClass("w3-teal");
            $("body").removeClass("w3-khaki");
            $("#login").show();

            </script>

            <?php
            }
            ?>
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





