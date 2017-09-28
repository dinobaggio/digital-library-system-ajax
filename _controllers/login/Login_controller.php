<?php

$username = '';
$password = '';
$errLogin = '';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array();
    parse_str($_POST['data'], $data);
    $username = $data['username'];
    $password = $data['password'];
    if (empty($username) || empty($password)) {
        $username = '';
        $password = '';
        $errLogin = '* data tidak boleh kosong';
    } else {
        $password = md5($password);
        $loadModel = require_once('../../_models/login/login_model.php');
        unset($loadModel);
    }
}

?>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>