<?php
session_start();
$loadController = require_once('../../_controllers/login/login_controller.php');
unset($loadController);


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
<script src="_asset/js/public.js"></script>
<?php

if(isset($_SESSION['username']) && isset($_SESSION['role'])) {
   switch($_SESSION['role']) {
       case $_SESSION['role'] == 'admin' : ?>

         <script>
            $("body").removeClass("w3-brown");
            $("body").addClass("w3-teal");
            $("#indexAjax").load("_views/role_01_admin/home_admin.php");
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
        <form id="formLogin" method="POST" action="javascript:void(0)">
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







<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("index.php","_self")
    }
</script>