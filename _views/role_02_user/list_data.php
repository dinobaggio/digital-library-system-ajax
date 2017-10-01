<script src="_asset/js/public.js"></script>
<script>

$(document).ready(function(){
    $("#all").click(function(){
        $.ajax({
            url : '_views/role_02_user/data_data.php',
            method : 'post',
            data : {data : 'all', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });

    $("#ebook").click(function(){
        $.ajax({
            url : '_views/role_02_user/data_data.php',
            method : 'post',
            data : {data : 'ebook', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });
    $("#jurnal").click(function(){
        $.ajax({
            url : '_views/role_02_user/data_data.php',
            method : 'post',
            data : {data : 'jurnal', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });
    $("#artikel").click(function(){
        $.ajax({
            url : '_views/role_02_user/data_data.php',
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
<button id='all'>All</button> <button id='ebook'>E-book</button> <button id='jurnal'>Jurnal</button> <button id='artikel'>Artikel</button><br/>
<div id='indexData'>

<script>
$("#indexData").load('_views/role_02_user/data_data.php', { data : 'all', page : '1'});
</script>

</div>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
    
</script>