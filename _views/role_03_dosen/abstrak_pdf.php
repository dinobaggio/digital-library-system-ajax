<?php

//$text = '';
//$tmpt_upload = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['textPdf'])) {
            $text = $_POST['textPdf'];
            $tmpt_upload = $_POST['tmpt_upload'];
        }
}



?>

    <div id='pdfData' class='w3-text-black' style='position:absolute;z-index:-2'>
        <div style='display:block;width:75%;margin-left:12.5%;margin-top:-15%'>
            <h1 style='text-align:center;' >Abstrak</h1>
            <p id='textPdf' style='text-align: justify;' >
            <?php echo $text;?>
            </p>
        </div>
    
        
        <script>
        $("#manipulasi").show();
            var pdf = new jsPDF('p', 'pt', 'letter');
            var canvas = pdf.canvas;
            var width = 600;
            var data = '';
            var tmpt_upload = '<?php echo $tmpt_upload ?>';
            //canvas.width=8.5*72;
            document.getElementById('pdfData').style.width=width + "px";

            html2canvas(document.getElementById('pdfData'), {
                canvas:canvas,
                onrendered: function(canvas) {
                    //var iframe = document.createElement('iframe');
                    //iframe.setAttribute('style', 'position:absolute;top:0;right:0;height:100%; width:600px');
                    //document.getElementById('pdfData').appendChild(iframe);
                    //iframe.src = pdf.output('datauristring');
                    //document.getElementById('dataFile').value = pdf.output();
                    //document.getElementById('spanData').innerHTML = pdf.output();
                    data = pdf.output();
                    dataFile(data, tmpt_upload);
                    //console.log(data);
                    //console.log(data);
                    //console.log(pdf.output('datauristring'));
                    //console.log(pdf.output());
                    //var div = document.createElement('pre');
                    //div.innerText=pdf.output();
                    //document.body.appendChild(div);
                }
            });
        </script>
    </div>
<button id='back' >back</button>

<script>
function dataFile (data, tmpt_upload) {
    //$("#pdfData").hide();
    $.ajax({
        url: "_views/role_03_dosen/pros_abstrak.php",
        method:'post',
        data: {
            data: data, 
            tmpt_upload:tmpt_upload
        }
    }).done(function(datas){
        $("#pdfData").hide();
        $("#manipulasi").hide();
        console.log('loading abstark3 done!');
        console.log(tmpt_upload);
        $("#resultAbstrak").html("");
        $("#indexDosen").load('_views/role_03_dosen/upload_jurnal.php');
    }).fail(function(err){
        console.log(err);
        console.log('error');
    });
}
$("#back").click(function(){
    $("#indexDosen").load('_views/role_03_dosen/upload_jurnal.php');
});
</script>
	

