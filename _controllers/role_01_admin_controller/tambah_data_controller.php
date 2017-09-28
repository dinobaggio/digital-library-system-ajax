<?php


if($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = array();
    parse_str($_POST['data'], $data);
    echo var_dump($data['lampiran_berkas']);
}




?>