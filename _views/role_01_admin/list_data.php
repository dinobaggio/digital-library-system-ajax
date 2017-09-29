<script src="_asset/js/public.js"></script>
<script>

$(document).ready(function(){

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

<h2>List data masih dalam pengembagan</h2>
<button id='ebook'>E-book</button> <button id='jurnal'>Jurnal</button> <button id='artikel'>Artikel</button><br/>
<div id='indexData'>

<script>
$("#indexData").load('_views/role_01_admin/data_data.php');
</script>

</div>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
    
</script>