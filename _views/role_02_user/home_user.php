<?php
session_start();


if(!isset($_SESSION['username']) && !isset($_SESSION['role']) ) { ?>

<script>
$("indexAjax").load('_views/login/login.php');

</script>

<?php

}


?>



<script src="_asset/js/public.js"></script>

<script> 
$(document).ready(function(){
    $("#lihatData").click(function(){
        $("#indexUser").load("_views/role_02_user/list_data.php");
    });
    $("#logout").click(function(){
        $('#indexAjax').load('_controllers/login/logout_controller.php');
    });
});
</script>

<h1>Selamat datang <?php echo $_SESSION['username'];?></h1>
<p>User masih dalam pembuatan</p><br/>
<button id='lihatData'>Lihat list data</button> <button id="logout" >Logout</button> 

<div id="indexUser">

</div>

<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>