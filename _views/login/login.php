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
           data: { data: $(this).serialize() },
           success: function(data){
               $("#indexAjax").html(data);
           }
       });
    });
});
</script>
<script src="_asset/js/public.js"></script>
<?php

if(isset($_SESSION['username']) && isset($_SESSION['role'])) {
   switch($_SESSION['role']) {
       case $_SESSION['role'] == 'admin' : ?>

         <script>
            $("#indexAjax").load("_views/role_01_admin/home_admin.php");
        </script>   
 
<?php
       break;
       case $_SESSION['role'] == 'user' : ?>

         <script>
            $("#indexAjax").load("_views/role_02_user/home_user.php");
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

<div class="w3-section">
    <form id="formLogin" method="POST" action="javascript:void(0)">
        <table>
            <tr><td>Username: </td><td><input type="text" name="username" value="<?php echo $username;?>" placeholder="Username"></td></tr>
            <tr><td>Password: </td><td><input type="password" name="password" value="<?php echo $password;?>" placeholder="Password"></td></tr>
            <tr><td><input type="submit" value="Login" /></td><td><span class="w3-text-red"><?php echo $errLogin;?></span></td></tr>
        </table>
    </form>
</div>


<?php
}
?>







<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("index.php","_self")
    }
</script>