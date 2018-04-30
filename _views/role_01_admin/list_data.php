<script src="_asset/js/public.js"></script>

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


<script>

$(document).ready(function(){
    $("#all").click(function(){
        $.ajax({
            url : '_views/role_01_admin/data_data.php',
            method : 'post',
            data : {data : 'all', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
        $(this).addClass('w3-brown');
    
    });

    $("#ebook").click(function(){
        $.ajax({
            url : '_views/role_01_admin/data_data.php',
            method : 'post',
            data : {data : 'ebook', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });
    $("#jurnal").click(function(){
        $.ajax({
            url : '_views/role_01_admin/data_data.php',
            method : 'post',
            data : {data : 'jurnal', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });
    $("#artikel").click(function(){
        $.ajax({
            url : '_views/role_01_admin/data_data.php',
            method : 'post',
            data : {data : 'artikel', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });
});

</script>
<div class='w3-animate-right w3-section' >
    <h2>List Data</h2>
    <button id='all' class='tombolKonten w3-white'>All</button> <button id='ebook' class='tombolKonten'>E-book</button> <button id='jurnal' class='tombolKonten'>Jurnal</button> <button id='artikel' class='tombolKonten'>Artikel</button><br/>
    <div id='indexData'>

    <script>
    $("#indexData").load('_views/role_01_admin/data_data.php', { data : 'all', page : '1'});
    </script>

    </div>
</div>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>