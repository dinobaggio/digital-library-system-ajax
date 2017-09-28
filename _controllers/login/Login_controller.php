<?php

$username = '';
$password = '';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array();
    parse_str($_POST['data'], $data);
    $username = $data['username'];
    $password = $data['password'];
    $loadModel = require_once('../../_models/login_model.php');
    unset($loadModel);
}

?>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../../index.php","_self")
    }
</script>