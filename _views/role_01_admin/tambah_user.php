<?php

$errPassword = '';
$password = '';

$errRePassword = '';
$rePassword = '';

$errUsername = '';
$username = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array();
    parse_str($_POST['data'], $data);
    $username = $data['username'];
    $password = $data['password'];
    $rePassword = $data['rePassword'];
    if(empty($data['username'])) {
        $errUsername = '*username harus diisi';
    } else {
        $username = $data['username'];
        $loadDb = require_once('../../config/dbset.php');
        $que = "SELECT username FROM pengguna WHERE username='$username'";
        $tugas = $kon->query($que);
        $tugas->execute();
        $user = $tugas->rowCount();
        $loadDb = null;
        if($user == 1) {
            $errUsername = '*user sudah ada silahkan gunakan yang lain';
        } else {
            $username = $data['username'];
            $errUsername = '';
        }
    }

    if(empty($data['password'])) {
        $errPassword = '*password harus diisi';
    }

    if(empty($data['rePassword'])) {
        $errRePassword = '*password ulang harus diisi';
    } else {
        if ($data['password'] !== $data['rePassword']) {
            $errRePassword = '*password ulang tidak sama';
        } else {
            $password = $data['password'];
        }
    }

    if ($username != '' &&
    $password != '' &&
    $errPassword == '' &&
    $errRePassword == '' &&
    $errUsername == '') {
        $dbLoad = require_once('../../config/dbset.php');
        $que = "INSERT INTO pengguna (username, password, role) VALUES (:username, :password, :role)";
        $tugas = $kon->prepare($que);
        $tugas->bindParam(':username', $username);
        $tugas->bindParam(':password', $password);
        $tugas->bindParam(':role', $role);
        $password = md5($password);
        $role = 'user';
        if($tugas->execute()) {
            echo "sukses memasukan data";
            $username = '';
            $password = empty($password);
            $rePassword = empty($rePassword);
        }
        unset($dbLoad);
        unset($kon);
    }


}

?>



<script src="_asset/js/public.js"></script>
<script>
    $(document).ready(function(){
        $('#formUser').submit(function(){
            $.ajax({
                url : '_views/role_01_admin/tambah_user.php',
                method : 'POST',
                data : { data : $(this).serialize() },
                success : function(data) {
                    $("#indexAdmin").html(data);
                }
            });
        });
    });

</script>


<h2>Tambah User masih dalam proses pengembangan</h2>

<form id='formUser' action='javascript:void(0)'>
<table>
<tr><td>Username : </td><td><input type='text' name='username' value="<?php echo $username;?>" placeholder='Username ...' /><span><?php echo $errUsername; ?></span></td></tr>
<tr><td>Password : </td><td><input type='password' name='password' value="<?php echo $password;?>" placeholder='Password ...' /><span><?php echo $errPassword; ?></span></td></tr>
<tr><td>Ulangi Password : </td><td><input type='password' name='rePassword' value="<?php echo $rePassword;?>" placeholder='Password ...' /><span><?php echo $errRePassword;?></span></td></tr>
<tr><td><input type='submit' value='simpan!'></td></tr>

</table>
</form>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>