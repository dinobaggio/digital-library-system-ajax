<?php 
//is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
?>

<script src="_asset/js/jquery-3.2.1.js"></script>

<textarea name='textPdf'></textarea>
<button id='klik'>
klik
</button>
<div style='margin-left:0%'>
<div id='resultAbstrak' style='display:block;margin-left:0%'></div>
</div>
<script>
$("#klik").click(function(){
    var data = $("[name=textPdf]").val();
    $.ajax({
        url:'sandbox.php',
        method:'POST',
        data : { textPdf:data }
    }).done(function(data){
        $("#resultAbstrak").html(data);
    });
});
</script>