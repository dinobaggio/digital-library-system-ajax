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

if($_SESSION['role'] != 'dosen') {
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



<script src="_asset/js/public.js"></script>

<script> 
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
    $("#all").addClass('w3-grey');
    $("#homeDosen").removeClass('w3-black');
    $("#homeDosen").addClass('w3-grey');

    $("#all").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-grey');
        
        $("#homeDosen").removeClass('w3-black');
        $("#homeDosen").addClass('w3-grey');

        $("#ebook").removeClass('w3-grey');
        $("#ebook").addClass('w3-black');

        $("#jurnal").removeClass('w3-grey');
        $("#jurnal").addClass('w3-black');

        $("#artikel").removeClass('w3-grey');
        $("#artikel").addClass('w3-black');

        $("#uploadJurnal").removeClass('w3-grey');
        $("#uploadJurnal").addClass('w3-black');

        $("#lihatJurnal").removeClass('w3-grey');
        $("#lihatJurnal").addClass('w3-black');

        $("#skripsi").removeClass('w3-grey');
        $("#skripsi").addClass('w3-black');
    });

    $("#ebook").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-grey');

        $("#jurnal").removeClass('w3-grey');
        $("#jurnal").addClass('w3-black');

        $("#all").removeClass('w3-grey');
        $("#all").addClass('w3-black');

        $("#artikel").removeClass('w3-grey');
        $("#artikel").addClass('w3-black');

        $("#uploadJurnal").removeClass('w3-grey');
        $("#uploadJurnal").addClass('w3-black');

        $("#lihatJurnal").removeClass('w3-grey');
        $("#lihatJurnal").addClass('w3-black');

        $("#homeDosen").removeClass('w3-grey');
        $("#homeDosen").addClass('w3-black');

        $("#skripsi").removeClass('w3-grey');
        $("#skripsi").addClass('w3-black');
    });

    $("#jurnal").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-grey');

        $("#ebook").removeClass('w3-grey');
        $("#ebook").addClass('w3-black');

        $("#all").removeClass('w3-grey');
        $("#all").addClass('w3-black');

        $("#artikel").removeClass('w3-grey');
        $("#artikel").addClass('w3-black');

        $("#uploadJurnal").removeClass('w3-grey');
        $("#uploadJurnal").addClass('w3-black');

        $("#lihatJurnal").removeClass('w3-grey');
        $("#lihatJurnal").addClass('w3-black');

        $("#homeDosen").removeClass('w3-grey');
        $("#homeDosen").addClass('w3-black');

        $("#skripsi").removeClass('w3-grey');
        $("#skripsi").addClass('w3-black');
    });

    $("#artikel").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-grey');

        $("#ebook").removeClass('w3-grey');
        $("#ebook").addClass('w3-black');

        $("#all").removeClass('w3-grey');
        $("#all").addClass('w3-black');

        $("#jurnal").removeClass('w3-grey');
        $("#jurnal").addClass('w3-black');

        $("#uploadJurnal").removeClass('w3-grey');
        $("#uploadJurnal").addClass('w3-black');

        $("#lihatJurnal").removeClass('w3-grey');
        $("#lihatJurnal").addClass('w3-black');

        $("#homeDosen").removeClass('w3-grey');
        $("#homeDosen").addClass('w3-black');

        $("#skripsi").removeClass('w3-grey');
        $("#skripsi").addClass('w3-black');
    });

    $("#skripsi").click(function(){
        $(this).removeClass('w3-black');
        $(this).addClass('w3-grey');

        $("#ebook").removeClass('w3-grey');
        $("#ebook").addClass('w3-black');

        $("#artikel").removeClass('w3-grey');
        $("#artikel").addClass('w3-black');

        $("#all").removeClass('w3-grey');
        $("#all").addClass('w3-black');

        $("#jurnal").removeClass('w3-grey');
        $("#jurnal").addClass('w3-black');

        $("#uploadJurnal").removeClass('w3-grey');
        $("#uploadJurnal").addClass('w3-black');

        $("#lihatJurnal").removeClass('w3-grey');
        $("#lihatJurnal").addClass('w3-black');

        $("#homeDosen").removeClass('w3-grey');
        $("#homeDosen").addClass('w3-black');
    });

    $("#logout").click(function(){
        $('#indexAjax').load('_controllers/login/logout_controller.php');
    });
    $("#uploadJurnal").click(function(){
        $("#indexDosen").load('_views/role_03_dosen/upload_jurnal.php');
        $("#homeDosen").show("slow");
        $(this).removeClass('w3-black');
        $(this).addClass('w3-grey');

        $("#ebook").hide("slow");
        $("#all").hide("slow");
        $("#jurnal").hide("slow");
        $("#artikel").hide("slow");
        $("#skripsi").hide("slow");

        $("#lihatJurnal").removeClass('w3-grey');
        $("#lihatJurnal").addClass('w3-black');

        $("#ebook").removeClass('w3-grey');
        $("#ebook").addClass('w3-black');

        $("#all").removeClass('w3-grey');
        $("#all").addClass('w3-black');

        $("#jurnal").removeClass('w3-grey');
        $("#jurnal").addClass('w3-black');

        $("#artikel").removeClass('w3-grey');
        $("#artikel").addClass('w3-black');

        $("#homeDosen").removeClass('w3-grey');
        $("#homeDosen").addClass('w3-black');

        $("#skripsi").removeClass('w3-grey');
        $("#skripsi").addClass('w3-black');
    });
    $("#lihatJurnal").click(function(){
        $("#indexDosen").load("_views/role_03_dosen/lihat_data_jurnal.php");
        $("#homeDosen").show("slow");
        $(this).removeClass('w3-black');
        $(this).addClass('w3-grey');

        $("#ebook").hide("slow");
        $("#all").hide("slow");
        $("#jurnal").hide("slow");
        $("#artikel").hide("slow");
        $("#skripsi").hide("slow");

        $("#uploadJurnal").removeClass('w3-grey');
        $("#uploadJurnal").addClass('w3-black');

        $("#ebook").removeClass('w3-grey');
        $("#ebook").addClass('w3-black');

        $("#all").removeClass('w3-grey');
        $("#all").addClass('w3-black');

        $("#jurnal").removeClass('w3-grey');
        $("#jurnal").addClass('w3-black');

        $("#artikel").removeClass('w3-grey');
        $("#artikel").addClass('w3-black');

        $("#homeDosen").removeClass('w3-grey');
        $("#homeDosen").addClass('w3-black');

        $("#skripsi").removeClass('w3-grey');
        $("#skripsi").addClass('w3-black');
    });
    $("#homeDosen").click(function(){
        $("#indexDosen").load("_views/role_03_dosen/list_data.php");
        $(this).removeClass('w3-black');
        $(this).addClass('w3-grey');
        
        $("#all").removeClass('w3-black');
        $("#all").addClass('w3-grey');

        $("#ebook").show("slow");
        $("#all").show("slow");
        $("#jurnal").show("slow");
        $("#artikel").show("slow");
        $("#skripsi").show("slow");
        
        $("#lihatJurnal").removeClass('w3-grey');
        $("#lihatJurnal").addClass('w3-black');
        
        $("#uploadJurnal").removeClass('w3-grey');
        $("#uploadJurnal").addClass('w3-black');

        $("#ebook").removeClass('w3-grey');
        $("#ebook").addClass('w3-black');

        $("#jurnal").removeClass('w3-grey');
        $("#jurnal").addClass('w3-black');

        $("#artikel").removeClass('w3-grey');
        $("#artikel").addClass('w3-black');

        $("#skripsi").removeClass('w3-grey');
        $("#skripsi").addClass('w3-black');
    });
</script>

<div class="w3-container w3-row">
    
    <div class="w3-col l8 s12 w3-margin-bottom w3-animate-left">
    <div id='resultAbstrak'> </div>
        <div id="indexDosen">
            <script>
                $("#indexDosen").load("_views/role_03_dosen/list_data.php");
            </script>
        </div>
    </div>

    <div class="w3-container w3-margin-bottom w3-col l4 w3-animate-right">
        <h1>Selamat datang <?php echo $_SESSION['username'];?></h1>
        <p>Dosen Page</p><br/>
        <button class="tombolKonten" id='homeDosen'>Home</button><br/>
        <button class="tombolKonten" id='uploadJurnal'>Upload Jurnal / Publikasi</button> <br/>
        <button class="tombolKonten" id='lihatJurnal'>Lihat Data Jurnal</button> <br/>
        <button class="tombolKonten" id="logout" >Logout</button> <br/>
    </div>

</div>



<!-- MODAL -->

<div id="id01" class="w3-modal" >
    <div class="w3-modal-content w3-card-4" style='width:90%;height:140%'id="detailData">
    </div>
</div>

<!-- AKHIR MODAL -->

<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>