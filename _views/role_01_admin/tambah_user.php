<?php
session_start();

if(!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    session_destroy();
    //echo "<script>window.location = '../../index.php'</script>";
    ?> 
    
    <script>
        if (document.getElementById("indexAjax") == null ){
            window.location = '';
        } else {
            window.location = '';
        }
    </script>
    
    
    <?php
} else { 

if($_SESSION['role'] != 'admin') {
    session_destroy(); ?> <script>window.location = '';</script> <?php
}

?>
    
    <script>
        if(document.getElementById("indexAjax") == null) {
            window.location = '';
        }
    </script>

    <?php
}

?>


<?php

$errPassword = '';
$password = '';

$errRePassword = '';
$rePassword = '';

$errUsername = '';
$username = '';

$errRole = '';
$roleDefault = 'selected';
$roleUser = '';
$roleDosen = '';

$full_nama = '';
$errFull_nama = '';

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

    if(empty($data['role'])) {
        $errRole = "*Role harus dipilih";
    } else {
        $role = $data['role'];
        switch($role) {
            case $role == 'user' :
            $roleDefault = '';
            $roleUser = 'selected';
            $roleDosen = '';
            break;
            case $role == 'dosen' :
            $roleDefault = '';
            $roleUser = '';
            $roleDosen = 'selected';
            break;
            default :
            $roleDefault = 'selected';
            $roleUser = '';
            $roleDosen = '';
        }
    }

    if(empty($data['full_nama'])) {
        $errFull_nama = "*Harap isi full nama";
    } else {
        $full_nama = $data['full_nama'];
    }

    if ($username != '' &&
    $password != '' &&
    $errPassword == '' &&
    $errRePassword == '' &&
    $errUsername == '' &&
    $errRole == ''&&
    $errFull_nama == '') {
        $dbLoad = require_once('../../config/dbset.php');
        $que = "INSERT INTO pengguna (username, password, role, full_nama) VALUES (:username, :password, :role, :full_nama)";
        $tugas = $kon->prepare($que);
        $tugas->bindParam(':username', $username);
        $tugas->bindParam(':password', $password);
        $tugas->bindParam(':role', $role);
        $tugas->bindParam(':full_nama', $full_nama);
        $password = md5($password);
        //$role = 'user';
        if($tugas->execute()) {
            echo "sukses memasukan data";
            $full_nama = '';
            $username = '';
            $password = empty($password);
            $rePassword = empty($rePassword);
        }
        unset($dbLoad);
        unset($kon);
        ?>
        <script>
            alert('berhasil membuat user');
            $('#indexAdmin').load('_views/role_01_admin/tambah_user.php');
        </script>
        <?php
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

<div class='w3-animate-right w3-section'>
    <h2>Tambah User</h2>

    <form id='formUser' action='javascript:void(0)'>
    <table>
        <tr><td>Full Nama: </td><td><input type="text" name="full_nama" value="<?php echo $full_nama?>" placeholder="Full Nama" /></td><td><span class='error' ><?php echo $errFull_nama?></span></td></tr>
        <tr><td>Username : </td><td><input type='text' name='username' value="<?php echo $username;?>" placeholder='Username ...' /></td><td><span class='error'><?php echo $errUsername; ?></span></td></tr>
        <tr><td>Password : </td><td><input type='password' name='password' value="<?php echo $password;?>" placeholder='Password ...' /></td><td><span class='error'><?php echo $errPassword; ?></span></td></tr>
        <tr><td>Ulangi Password : </td><td><input type='password' name='rePassword' value="<?php echo $rePassword;?>" placeholder='Password ...' /></td><td><span class='error'><?php echo $errRePassword;?></span></td></tr>
        <tr><td>Role : </td><td>
        <select id="role" name='role' >
            <option value="" <?php echo $roleDefault?> >Masukan role ...</option>
            <option value="user" <?php echo $roleUser?> >User</option>
            <option value="dosen" <?php echo $roleDosen?> >Dosen</option>
        </select>
        </td><td><span class="error" ><?php echo $errRole?></span></td></tr>
        <tr><td><input type='submit' value='simpan!'></td></tr>
    </table>
    </form>
</div>

<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>