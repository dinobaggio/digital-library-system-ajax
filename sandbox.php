<?php
$str = "fil123.pdf";
$str = explode(".", $str);
unset($str[count($str)-1]);
$str = implode(".",$str);
print_r($str);
?>