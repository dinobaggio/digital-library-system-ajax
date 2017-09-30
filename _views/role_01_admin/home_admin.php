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
    $("#logout").click(function(){
        $('#indexAjax').load('_controllers/login/logout_controller.php');
    });
    $("#listData").click(function(){
        $("#indexAdmin").load("_views/role_01_admin/list_data.php");
    });
    $("#tmbhData").click(function(){
        $("#indexAdmin").load('_views/role_01_admin/tambah_data.php');
    });
    $("#tmbhUser").click(function(){
        $("#indexAdmin").load('_views/role_01_admin/tambah_user.php');
    });
});
</script>

<h1>Selamat datang <?php echo $_SESSION['username'];?></h1>
<p>Admin masih dalam pembuatan</p><br/>
<button id="listData" >Lihat List Data</button> 
<button id="tmbhData">Tambah Data</button> 
<button id="tmbhUser">Tambah User</button>
<button id="logout" >Logout</button>

<div id="indexAdmin">


</div>




<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>