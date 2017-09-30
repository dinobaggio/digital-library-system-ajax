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
        $("#indexUser").load("_views/role_01_admin/list_data.php");
    });
    $("#logout").click(function(){
        $('#indexAjax').load('_controllers/login/logout_controller.php');
    });
});
</script>

<h2>User masih dalam pembuatan</h2><br/>
<button id='lihatData'>Lihat list data</button> <button id="logout" >Logout</button> 

<div id="indexUser">

</div>

<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>