<?php
session_start();
session_destroy();
?>


<script>

$("#indexAjax").load('_views/login/login.php');
</script>