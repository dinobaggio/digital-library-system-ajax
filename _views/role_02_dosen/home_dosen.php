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
});
</script>

<h2>Dosen masih dalam pembuatan</h2><br/>
<button id="logout" >Logout</button>

<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>