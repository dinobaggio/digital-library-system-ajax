<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Digital Library By Dino</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="_asset/css/w3css.css" rel="stylesheet" />
        <script src="_asset/js/jquery-3.2.1.js"></script>
        <script>
            $(document).ready(function(){
                $("#dinobaggio").click(function(){
                    window.open("https://dinobaggio.github.io");
                });
            });
        </script>
        <script src="_asset/js/public.js">// public JS </script>
    </head>
    <body class="w3-container w3-section">
    <h1>Digital Library System by Dinobaggio</h1>
    <br/><button id="dinobaggio">dinobaggio.github.io</button> <br/>
    <div id="indexAjax"> 
        <!-- proses seluruh aplikasi disini -->
        <script>
            $("#indexAjax").load('_views/login/login.php');
        </script>
    </div>
    </body>
</html>