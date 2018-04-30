<?php
session_start();
session_destroy();
?>


<script>
    $("body").removeClass("w3-teal");
    $("body").removeClass("w3-cyan");
    $("body").removeClass("w3-khaki");
    $("body").addClass("w3-brown");
    $("#indexAjax").load('_views/role_04_non_user/home_non_user.php');
</script>