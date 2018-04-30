<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['role']) ){
    $role = $_SESSION['role'];
    switch($role) {
        case $role == "admin" :
        ?><script>
        $("#indexAjax").load("_views/role_01_admin/home_admin.php");
        $("body").removeClass("w3-grey");
        $("body").addClass("w3-teal");
        </script><?php
        break;
        case $role == "user" :
        ?><script>
        $("#indexAjax").load("_views/role_02_user/home_user.php");
        $("body").removeClass("w3-grey");
        $("body").addClass("w3-cyan");
        </script><?php
        break;
        case $role == "dosen" :
        ?><script>
        $("#indexAjax").load("_views/role_03_dosen/home_dosen.php");
        $("body").removeClass("w3-grey");
        $("body").addClass("w3-khaki");
        </script><?php
        break;
        default :
        ?> <script> $("#indexAjax").load("_views/role_04_non_user/home_non_user.php"); </script> <?php
    }
    

} else {





?>

<script src="_asset/js/public.js"></script>

<script> 
$(document).ready(function(){
    $("#lihatData").click(function(){
        //$("#indexUser").load("_views/role_02_user/list_data.php");
    });
    $("#logout").click(function(){
        $('#indexAjax').load('_controllers/login/logout_controller.php');
    });
    $("#login").click(function(){
        $('#indexAjax').load('_views/login/login.php');
    });
});
</script>

<header class="w3-container w3-center w3-animate-top w3-padding-16 w3-indigo ">
    <h2>Digital Library FTI - Perbanas Institute</h2>
    <button id='all' class='tombolKonten'>All</button> 
    <button id='ebook' class='tombolKonten'>E-book</button> 
    <button id='jurnal' class='tombolKonten'>Jurnal</button> 
    <button id='artikel' class='tombolKonten'>Artikel</button> 
    <button id='skripsi' class='tombolKonten'>Skripsi</button>
    <br/>
</header>

<script>
    $("#all").removeClass('w3-black');
    $("#all").addClass('w3-gray');

    $("#all").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#ebook").removeClass('w3-gray');
        $("#ebook").addClass('w3-black');

        $("#jurnal").removeClass('w3-gray');
        $("#jurnal").addClass('w3-black');

        $("#artikel").removeClass('w3-gray');
        $("#artikel").addClass('w3-black');

        $("#skripsi").removeClass('w3-gray');
        $("#skripsi").addClass('w3-black');
    });

    $("#ebook").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#jurnal").removeClass('w3-gray');
        $("#jurnal").addClass('w3-black');

        $("#all").removeClass('w3-gray');
        $("#all").addClass('w3-black');

        $("#artikel").removeClass('w3-gray');
        $("#artikel").addClass('w3-black');

        $("#skripsi").removeClass('w3-gray');
        $("#skripsi").addClass('w3-black');
    });

    $("#jurnal").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#ebook").removeClass('w3-gray');
        $("#ebook").addClass('w3-black');

        $("#all").removeClass('w3-gray');
        $("#all").addClass('w3-black');

        $("#artikel").removeClass('w3-gray');
        $("#artikel").addClass('w3-black');

        $("#skripsi").removeClass('w3-gray');
        $("#skripsi").addClass('w3-black');
    });

    $("#artikel").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#ebook").removeClass('w3-gray');
        $("#ebook").addClass('w3-black');

        $("#all").removeClass('w3-gray');
        $("#all").addClass('w3-black');

        $("#jurnal").removeClass('w3-gray');
        $("#jurnal").addClass('w3-black');

        $("#skripsi").removeClass('w3-gray');
        $("#skripsi").addClass('w3-black');
    });

    $("#skripsi").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-gray');

        $("#ebook").removeClass('w3-gray');
        $("#ebook").addClass('w3-black');

        $("#artikel").removeClass('w3-gray');
        $("#artikel").addClass('w3-black');

        $("#all").removeClass('w3-gray');
        $("#all").addClass('w3-black');

        $("#jurnal").removeClass('w3-gray');
        $("#jurnal").addClass('w3-black');
    });
</script>

<div class="w3-container w3-row">
    
    <div class="w3-col l8 s12 w3-margin-bottom w3-animate-left">
        <div id="indexNonUser">
            <script>
                $("#indexNonUser").load("_views/role_04_non_user/list_data.php");
            </script>
        </div>
    </div>

    <div class="w3-container w3-margin-bottom w3-col l4 w3-animate-right">
        <h1>Digital Library</h1>
        <p>Silahkan Login</p>
        <p>Untuk akses lebih lanjut</p><br/>
        <button class="tombolKonten" id="login">Login</button>
    </div>

</div>



<!-- MODAL -->

<div id="id01" class="w3-modal" >
    <div class="w3-modal-content w3-card-4" style='width:90%;height:140%'id="detailData">
    </div>
</div>

<?php
}


?>

<!-- AKHIR MODAL -->

<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>


