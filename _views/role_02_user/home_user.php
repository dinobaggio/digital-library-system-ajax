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
    $("#lihatData").click(function(){
        $("#indexUser").load("_views/role_02_user/list_data.php");
    });
    $("#logout").click(function(){
        $('#indexAjax').load('_controllers/login/logout_controller.php');
    });
});
</script>

<header class="w3-container w3-center w3-animate-top w3-padding-16 w3-indigo ">
    <h2>User Page</h2>
    <button id='all' class='tombolKonten'>All</button> <button id='ebook' class='tombolKonten'>E-book</button> <button id='jurnal' class='tombolKonten'>Jurnal</button> <button id='artikel' class='tombolKonten'>Artikel</button>
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
    });
</script>

<div class="w3-container w3-row">
    
    <div class="w3-col l8 s12 w3-margin-bottom w3-animate-left">
        <div id="indexUser">
            <script>
                $("#indexUser").load("_views/role_02_user/list_data.php");
            </script>
        </div>
    </div>

    <div class="w3-container w3-margin-bottom w3-col l4 w3-animate-right">
        <h1>Selamat datang <?php echo $_SESSION['username'];?></h1>
        <p>User Page</p><br/>
        <button class="tombolKonten" id="logout" >Logout</button>
    </div>

</div>



<!-- MODAL -->

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4" id="detailData">
    </div>
</div>

<!-- AKHIR MODAL -->

<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>