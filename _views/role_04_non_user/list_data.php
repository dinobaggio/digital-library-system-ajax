<script src="_asset/js/public.js"></script>
<script>
    if(document.getElementById("indexAjax") == null) {
        window.location = '../../index.php';
    }
</script>



<script>

$(document).ready(function(){
    $("#all").click(function(){
        $.ajax({
            url : '_views/role_04_non_user/data_data.php',
            method : 'post',
            data : {data : 'all', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });

    $("#ebook").click(function(){
        $.ajax({
            url : '_views/role_04_non_user/data_data.php',
            method : 'post',
            data : {data : 'ebook', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });
    $("#jurnal").click(function(){
        $.ajax({
            url : '_views/role_04_non_user/data_data.php',
            method : 'post',
            data : {data : 'jurnal', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });
    $("#artikel").click(function(){
        $.ajax({
            url : '_views/role_04_non_user/data_data.php',
            method : 'post',
            data : {data : 'artikel', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });
    $("#skripsi").click(function(){
        $.ajax({
            url : '_views/role_04_non_user/data_data.php',
            method : 'post',
            data : {data : 'skripsi', page : '1' },
            success : function(data){
                $("#indexData").html(data);
            }
        });
    });
});

</script>



<div id='indexData'>

    <script>
    $("#indexData").load('_views/role_04_non_user/data_data.php', { data : 'all', page : '1'});
    </script>

</div>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
    
</script>