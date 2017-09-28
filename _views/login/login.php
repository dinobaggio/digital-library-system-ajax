<?php
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
<div class="w3-section">
    <form id="formLogin" method="POST" action="javascript:void(0)">
        <table>
            <tr><td>Username: </td><td><input type="text" name="username" value="<?php echo $username;?>" placeholder="Username"></td></tr>
            <tr><td>Password: </td><td><input type="password" name="password" value="<?php echo $password;?>" placeholder="Password"></td></tr>
            <tr><td><input type="submit" value="Login" /></td></tr>
        </table>
    </form>
</div>



<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../../index.php","_self")
    }
</script>