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
    $("#listData").click(function(){
        $("#indexAdmin").load("_views/role_01_admin/list_data.php");
        $(this).addClass('w3-opacity');
        $("#tmbhData").removeClass('w3-opacity');
        $("#tmbhUser").removeClass('w3-opacity');
    });
    $("#tmbhData").click(function(){
        $("#indexAdmin").load('_views/role_01_admin/tambah_data.php');
        $(this).addClass('w3-opacity');
        $("#listData").removeClass('w3-opacity');
        $("#tmbhUser").removeClass('w3-opacity');
    });
    $("#tmbhUser").click(function(){
        $("#indexAdmin").load('_views/role_01_admin/tambah_user.php');
        $(this).addClass('w3-opacity');
        $("#listData").removeClass('w3-opacity');
        $("#tmbhData").removeClass('w3-opacity');
    });
    
});
</script>

<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card-2" style="z-index:3;width:19%;top:0px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-border-bottom w3-large"><img src="http://sps-perbanas.ac.id/files/Logo.png" style="width:80%;"></button>
  <button onclick="w3_close()" title="Close Sidemenu" class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></button>
  <button class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'" style="display:none;">New Message <i class="w3-padding fa fa-pencil"></i></button>
  <button id="myBtn" onclick="myFunc('Demo1')" class="w3-bar-item w3-button"><i class="fa fa-bars w3-margin-right"></i>Aksi<i class="fa fa-caret-down w3-margin-left"></i></button>
  <div id="Demo1" class="w3-hide w3-animate-left">
    <button class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" id="listData">
      <div class="w3-container">
        <img class="w3-round w3-margin-right" src="_asset/gambar/list_data.png" style="width:7%;"><span class="w3-opacity w3-large">Lihat List Data</span>
      </div>
    </button>
     <button class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" id="tmbhData">
      <div class="w3-container">
        <img class="w3-round w3-margin-right" src="_asset/gambar/tambah_data.png" style="width:7%;"><span class="w3-opacity w3-large">Tambah Data</span>
      </div>
    </button>
    <button class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" id="tmbhUser">
      <div class="w3-container">
        <img class="w3-round w3-margin-right" src="_asset/gambar/tambah_user.png" style="width:7%;"><span class="w3-opacity w3-large">Tambah User</span>
      </div>
    </button>
  </div>
  <button class="w3-bar-item w3-button" id="logout"><i class="fa fa-sign-out w3-margin-right"></i>Logout</button>
</nav>



<script> 
var openInbox = document.getElementById("myBtn");
        openInbox.click();
</script>

<div class="w3-main w3-animate-right" style="margin-left:260px;">
<i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
<a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display='block'" style="display:none;"><i class="fa fa-pencil"></i></a>
<div class='w3-container w3-padding-16 w3-indigo'><h1>Selamat datang <?php echo $_SESSION['username'];?></h1></div>
    <div id="indexAdmin" class="">
    </div>
</div>

<div id="id01" class="w3-modal" style="z-index:4">
    <div class="w3-modal-content w3-animate-zoom" id='detailData'>
    </div>
</div>


<!-- <h1>Selamat datang <?php //echo $_SESSION['username'];?></h1>
<p>Admin masih dalam pembuatan</p><br/>
<button id="listData" >Lihat List Data</button> 
<button id="tmbhData">Tambah Data</button> 
<button id="tmbhUser">Tambah User</button>
<button id="logout" >Logout</button> -->






<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>