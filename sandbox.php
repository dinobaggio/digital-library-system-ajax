<?php

$text = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['textPdf'])) {
            $text = $_POST['textPdf'];
        }
}



?>

    <div id='pdfData'>
        <div style='width:75%;margin-left:12.5%'>
            <h1 style='text-align:center;' >Abstrak</h1>
            <p id='textPdf' style='text-align: justify;' >
            <?php echo $text;?>
            </p>
    </div>

        <script src='_asset/js/jspdf.debug.js'></script>
        <script src='_asset/js/html2pdf.js'></script>
        <script>
            var pdf = new jsPDF('p', 'pt', 'letter');
            var canvas = pdf.canvas;
            var width = 600;
            var data = '';
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
                    dataFile(data);
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

<script>
function dataFile (data) {
    //$("#pdfData").hide();
    $.ajax({
        url: "sandboxFile.php",
        method:'post',
        data: {data: data}
    }).done(function(){
        alert('sukses');
    });
}
</script>
	

