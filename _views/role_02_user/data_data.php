<script src="_asset/js/public.js"></script>
<?php

$cari = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(isset($_POST['cari'])) {
        $cari = array();
        parse_str($_POST['cari'], $cari);
        $cari = $cari['cari'];
        if($cari != '' ) {
            $cari = $cari;
        } else {
            $cari = '';
        }
    } else {
        $cari = '';
    }

/* EBOOKTAB */

    if($_POST['data'] == 'ebook') { ?>

<script>
    $(document).ready(function(){
        $("#formCari").submit(function(){
            var cari = $("[name=cari]").serialize();
            $.ajax({
                url : '_views/role_02_user/data_data.php',
                method : 'POST',
                data : { data : 'ebook', page : '1', cari : cari },
                success : function(data){
                    $("#indexData").html(data);
                }
            });
        });
    });
</script>
<br/>
<form class="w3-right" action='javascript:void(0)' id="formCari" >
    <table>
        <tr><td><input type='text' name='cari' value='<?php echo $cari;?>'/></td> <td><input type='submit' value='Cari' /></td></tr>
    </table>
</form>


    <?php
        $fileDb = require_once('../../config/dbset.php');
        
        //$kon = new PDO("mysql:host=localhost;dbname=dummy", "root", "");
        if (isset($_POST['cari'])) {
            $cari = array();
            parse_str($_POST['cari'], $cari);
            $cari = $cari['cari'];
            if ($cari !='') {
                //$que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%'";
                $que = "SELECT * FROM data_lampiran WHERE kategori='ebook' AND judul LIKE '%$cari%' OR kategori='ebook' AND nama_file LIKE '%$cari%'";
            } else {
                //$que = "SELECT * FROM data_lampiran";
                $que = "SELECT * FROM data_lampiran WHERE kategori='ebook'";
            }
        } else {
            //$que = "SELECT * FROM data_lampiran";
            $que = "SELECT * FROM data_lampiran WHERE kategori='ebook'";
        }
        
        $tugas = $kon->query($que);
        $total = $tugas->rowCount();
        $banyak_page = 5;
        $last_page = ceil($total/$banyak_page);
        if($last_page < 1) {
            $last_page = 1;
        }
        $page = $_POST['page'];
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $last_page) {
            $page = $last_page;
        }
        
        //$que = "SELECT * FROM data_lampiran WHERE kategori='ebook' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        if (isset($_POST['cari'])) {
            $cari = array();
            parse_str($_POST['cari'], $cari);
            $cari = $cari['cari'];
            if ($cari != '') {
                //$que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                $que = "SELECT * FROM data_lampiran WHERE kategori='ebook' AND judul LIKE '%$cari%' OR kategori='ebook' AND nama_file LIKE '%$cari%' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            } else {
                //$que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                $que = "SELECT * FROM data_lampiran WHERE kategori='ebook' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            }
        } else {
            //$que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            $que = "SELECT * FROM data_lampiran WHERE kategori='ebook' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        }
        $tugas = $kon->query($que);
        unset($fileDb);
        unset($kon);
        echo "<h3>E-Book</h3>";
        //echo "<table>";
        //echo "<tr><th>Judul</th><th>Pengarang</th><th>Kategori</th><th>Penerbit</th><th>Tahun Penerbit</th><th>Tempat Penerbit</th><th>Info Lain</th><th>Detail</th></tr>";
        while($baris = $tugas->fetch()) { ?>
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container">
                    <h3><b><?php echo $baris['judul'];?></b></h3>
                    <h5><b>pengarang:</b> <?php echo $baris['pengarang'];?> <br/><b>kategori:</b> <?php echo $baris['kategori'];?></h5>
                </div>
                <div class="w3-container">
                    <p><?php echo $baris['info_detail'];?></p>
                    <div class="w3-row">
                        <div class="w3-col m8 s12">
                            <p><button class="w3-padding-large tombolKonten w3-border" onclick="$('#id01').fadeIn()"
                             name="<?php echo $baris['id'];?>" ><b>Detail</b></button></p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $("[name=<?php echo $baris['id']?>]").click(function(){
                    $.ajax({
                        url : '_views/role_02_user/detail_data.php',
                        method : 'POST',
                        data : { id: "<?php echo $baris['id'];?>" },
                        success : function(data){
                            $("#detailData").html(data);
                        }
                    });
                });
            </script>
            
        
            
    <?php    }

        //echo "</table>"; ?>
        
        <script>
            $(document).ready(function(){
                $("#next").click(function(){
                    var cari = "cari=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_02_user/data_data.php',
                        method : 'post',
                        data : { data: 'ebook', page : "<?php echo $page+1;?>", cari:cari},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#previous").click(function(){
                    var cari = "cari=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_02_user/data_data.php',
                        method : 'post',
                        data : { data: 'ebook', page : "<?php echo $page-1;?>", cari:cari},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
            });
        </script>

        <button id='previous' class='tombolKonten'>previous</button> 
        <?php 
        if($last_page != 1) {
            if($page > 1) {
                for($i = $page-2; $i < $page; $i++) {
                    if($i > 0) {
                        ?>
                            <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                            <script>
                            $("[name=<?php echo $i;?>]").click(function(){
                                var cari = "cari=<?php echo $cari;?>";
                                $.ajax({
                                    url:'_views/role_02_user/data_data.php',
                                    method : 'post',
                                    data : { data: 'ebook', page : "<?php echo $i;?>", cari:cari },
                                    success : function(data){
                                        $("#indexData").html(data);
                                    }
                                });
                            });
                        </script>
                        <?php
                    }
                }
            }

            ?>
            <button class='w3-button w3-black' ><?php echo $page; ?></button>
            <?php
            for($i = $page+1; $i <= $last_page; $i++) {
                ?>
                <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                <script>
                    $("[name=<?php echo $i;?>]").click(function(){
                        var cari = "cari=<?php echo $cari;?>";
                        $.ajax({
                            url:'_views/role_02_user/data_data.php',
                            method : 'post',
                            data : { data: 'ebook', page : "<?php echo $i;?>", cari:cari },
                            success : function(data){
                                $("#indexData").html(data);
                            }
                        });
                    });
                </script>
                <?php
                if($i >= $page+2) {
                    break;
                }
            }
        }
        
        
        ?> 
        <button id='next' class='tombolKonten'>next</button> 
        
        
        
        <?php
    }


/* JURNALTAB */
    if($_POST['data'] == 'jurnal') { ?>

<script>
    $(document).ready(function(){
        $("#formCari").submit(function(){
            var cari = $("[name=cari]").serialize();
            $.ajax({
                url : '_views/role_02_user/data_data.php',
                method : 'POST',
                data : { data : 'jurnal', page : '1', cari : cari },
                success : function(data){
                    $("#indexData").html(data);
                }
            });
        });
    });
</script>
<br/>
<form class="w3-right" action='javascript:void(0)' id="formCari" >
    <table>
        <tr><td><input type='text' name='cari' value='<?php echo $cari;?>'/></td> <td><input type='submit' value='Cari' /></td></tr>
    </table>
</form>


    <?php
        $fileDb = require_once('../../config/dbset.php');
        
        //$kon = new PDO("mysql:host=localhost;dbname=dummy", "root", "");
        if (isset($_POST['cari'])) {
            $cari = array();
            parse_str($_POST['cari'], $cari);
            $cari = $cari['cari'];
            if ($cari !='') {
                //$que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%'";
                $que = "SELECT * FROM data_lampiran WHERE kategori='jurnal' AND judul LIKE '%$cari%' OR kategori='jurnal' AND nama_file LIKE '%$cari%'";
            } else {
                //$que = "SELECT * FROM data_lampiran";
                $que = "SELECT * FROM data_lampiran WHERE kategori='jurnal'";
            }
        } else {
            //$que = "SELECT * FROM data_lampiran";
            $que = "SELECT * FROM data_lampiran WHERE kategori='jurnal'";
        }
        
        $tugas = $kon->query($que);
        $total = $tugas->rowCount();
        $banyak_page = 5;
        $last_page = ceil($total/$banyak_page);
        if($last_page < 1) {
            $last_page = 1;
        }
        $page = $_POST['page'];
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $last_page) {
            $page = $last_page;
        }
        
        //$que = "SELECT * FROM data_lampiran WHERE kategori='jurnal' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        if (isset($_POST['cari'])) {
            $cari = array();
            parse_str($_POST['cari'], $cari);
            $cari = $cari['cari'];
            if ($cari != '') {
                //$que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                $que = "SELECT * FROM data_lampiran WHERE kategori='jurnal' AND judul LIKE '%$cari%' OR kategori='jurnal' AND nama_file LIKE '%$cari%' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            } else {
                //$que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                $que = "SELECT * FROM data_lampiran WHERE kategori='jurnal' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            }
        } else {
            //$que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            $que = "SELECT * FROM data_lampiran WHERE kategori='jurnal' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        }
        $tugas = $kon->query($que);
        unset($fileDb);
        unset($kon);
        echo "<h3>Jurnal</h3>";
        //echo "<table>";
        //echo "<tr><th>Judul</th><th>Pengarang</th><th>Kategori</th><th>Penerbit</th><th>Tahun Penerbit</th><th>Tempat Penerbit</th><th>Info Lain</th><th>Detail</th></tr>";
        while($baris = $tugas->fetch()) { ?>
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container">
                    <h3><b><?php echo $baris['judul'];?></b></h3>
                    <h5><b>pengarang:</b> <?php echo $baris['pengarang'];?> <br/><b>kategori:</b> <?php echo $baris['kategori'];?></h5>
                </div>
                <div class="w3-container">
                    <p><?php echo $baris['info_detail'];?></p>
                    <div class="w3-row">
                        <div class="w3-col m8 s12">
                            <p><button class="w3-padding-large tombolKonten w3-border" onclick="$('#id01').fadeIn()"
                             name="<?php echo $baris['id'];?>" ><b>Detail</b></button></p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $("[name=<?php echo $baris['id']?>]").click(function(){
                    $.ajax({
                        url : '_views/role_02_user/detail_data.php',
                        method : 'POST',
                        data : { id: "<?php echo $baris['id'];?>" },
                        success : function(data){
                            $("#detailData").html(data);
                        }
                    });
                });
            </script>
            
        
            
    <?php    }

        //echo "</table>"; ?>
        
        <script>
            $(document).ready(function(){
                $("#next").click(function(){
                    var cari = "cari=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_02_user/data_data.php',
                        method : 'post',
                        data : { data: 'jurnal', page : "<?php echo $page+1;?>", cari:cari},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#previous").click(function(){
                    var cari = "cari=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_02_user/data_data.php',
                        method : 'post',
                        data : { data: 'jurnal', page : "<?php echo $page-1;?>", cari:cari},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
            });
        </script>

        <button id='previous' class='tombolKonten'>previous</button> 
        <?php 
        if($last_page != 1) {
            if($page > 1) {
                for($i = $page-2; $i < $page; $i++) {
                    if($i > 0) {
                        ?>
                            <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                            <script>
                            $("[name=<?php echo $i;?>]").click(function(){
                                var cari = "cari=<?php echo $cari;?>";
                                $.ajax({
                                    url:'_views/role_02_user/data_data.php',
                                    method : 'post',
                                    data : { data: 'jurnal', page : "<?php echo $i;?>", cari:cari },
                                    success : function(data){
                                        $("#indexData").html(data);
                                    }
                                });
                            });
                        </script>
                        <?php
                    }
                }
            }

            ?>
            <button class='w3-button w3-black' ><?php echo $page; ?></button>
            <?php
            for($i = $page+1; $i <= $last_page; $i++) {
                ?>
                <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                <script>
                    $("[name=<?php echo $i;?>]").click(function(){
                        var cari = "cari=<?php echo $cari;?>";
                        $.ajax({
                            url:'_views/role_02_user/data_data.php',
                            method : 'post',
                            data : { data: 'jurnal', page : "<?php echo $i;?>", cari:cari },
                            success : function(data){
                                $("#indexData").html(data);
                            }
                        });
                    });
                </script>
                <?php
                if($i >= $page+2) {
                    break;
                }
            }
        }
        
        
        ?> 
        <button id='next' class='tombolKonten'>next</button> 
        
        
        
        <?php
    }

/* ARTIKELTAB */

    if($_POST['data'] == 'artikel') { ?>

<script>
    $(document).ready(function(){
        $("#formCari").submit(function(){
            var cari = $("[name=cari]").serialize();
            $.ajax({
                url : '_views/role_02_user/data_data.php',
                method : 'POST',
                data : { data : 'artikel', page : '1', cari : cari },
                success : function(data){
                    $("#indexData").html(data);
                }
            });
        });
    });
</script>
<br/>
<form class="w3-right" action='javascript:void(0)' id="formCari" >
    <table>
        <tr><td><input type='text' name='cari' value='<?php echo $cari;?>'/></td> <td><input type='submit' value='Cari' /></td></tr>
    </table>
</form>


    <?php
        $fileDb = require_once('../../config/dbset.php');
        
        //$kon = new PDO("mysql:host=localhost;dbname=dummy", "root", "");
        if (isset($_POST['cari'])) {
            $cari = array();
            parse_str($_POST['cari'], $cari);
            $cari = $cari['cari'];
            if ($cari !='') {
                //$que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%'";
                $que = "SELECT * FROM data_lampiran WHERE kategori='artikel' AND judul LIKE '%$cari%' OR kategori='artikel' AND nama_file LIKE '%$cari%'";
            } else {
                //$que = "SELECT * FROM data_lampiran";
                $que = "SELECT * FROM data_lampiran WHERE kategori='artikel'";
            }
        } else {
            //$que = "SELECT * FROM data_lampiran";
            $que = "SELECT * FROM data_lampiran WHERE kategori='artikel'";
        }
        
        $tugas = $kon->query($que);
        $total = $tugas->rowCount();
        $banyak_page = 5;
        $last_page = ceil($total/$banyak_page);
        if($last_page < 1) {
            $last_page = 1;
        }
        $page = $_POST['page'];
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $last_page) {
            $page = $last_page;
        }
        
        //$que = "SELECT * FROM data_lampiran WHERE kategori='artikel' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        if (isset($_POST['cari'])) {
            $cari = array();
            parse_str($_POST['cari'], $cari);
            $cari = $cari['cari'];
            if ($cari != '') {
                //$que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                $que = "SELECT * FROM data_lampiran WHERE kategori='artikel' AND judul LIKE '%$cari%' OR kategori='artikel' AND nama_file LIKE '%$cari%' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            } else {
                //$que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                $que = "SELECT * FROM data_lampiran WHERE kategori='artikel' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            }
        } else {
            //$que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            $que = "SELECT * FROM data_lampiran WHERE kategori='artikel' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        }
        $tugas = $kon->query($que);
        unset($fileDb);
        unset($kon);
        echo "<h3>Artikel</h3>";
        //echo "<table>";
        //echo "<tr><th>Judul</th><th>Pengarang</th><th>Kategori</th><th>Penerbit</th><th>Tahun Penerbit</th><th>Tempat Penerbit</th><th>Info Lain</th><th>Detail</th></tr>";
        while($baris = $tugas->fetch()) { ?>
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container">
                    <h3><b><?php echo $baris['judul'];?></b></h3>
                    <h5><b>pengarang:</b> <?php echo $baris['pengarang'];?> <br/><b>kategori:</b> <?php echo $baris['kategori'];?></h5>
                </div>
                <div class="w3-container">
                    <p><?php echo $baris['info_detail'];?></p>
                    <div class="w3-row">
                        <div class="w3-col m8 s12">
                            <p><button class="w3-padding-large tombolKonten w3-border" onclick="$('#id01').fadeIn()"
                             name="<?php echo $baris['id'];?>" ><b>Detail</b></button></p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $("[name=<?php echo $baris['id']?>]").click(function(){
                    $.ajax({
                        url : '_views/role_02_user/detail_data.php',
                        method : 'POST',
                        data : { id: "<?php echo $baris['id'];?>" },
                        success : function(data){
                            $("#detailData").html(data);
                        }
                    });
                });
            </script>
            
        
            
    <?php    }

        //echo "</table>"; ?>
        
        <script>
            $(document).ready(function(){
                $("#next").click(function(){
                    var cari = "cari=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_02_user/data_data.php',
                        method : 'post',
                        data : { data: 'artikel', page : "<?php echo $page+1;?>", cari:cari},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#previous").click(function(){
                    var cari = "cari=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_02_user/data_data.php',
                        method : 'post',
                        data : { data: 'artikel', page : "<?php echo $page-1;?>", cari:cari},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
            });
        </script>

        <button id='previous' class='tombolKonten'>previous</button> 
        <?php 
        if($last_page != 1) {
            if($page > 1) {
                for($i = $page-2; $i < $page; $i++) {
                    if($i > 0) {
                        ?>
                            <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                            <script>
                            $("[name=<?php echo $i;?>]").click(function(){
                                var cari = "cari=<?php echo $cari;?>";
                                $.ajax({
                                    url:'_views/role_02_user/data_data.php',
                                    method : 'post',
                                    data : { data: 'artikel', page : "<?php echo $i;?>", cari:cari },
                                    success : function(data){
                                        $("#indexData").html(data);
                                    }
                                });
                            });
                        </script>
                        <?php
                    }
                }
            }

            ?>
            <button class='w3-button w3-black' ><?php echo $page; ?></button>
            <?php
            for($i = $page+1; $i <= $last_page; $i++) {
                ?>
                <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                <script>
                    $("[name=<?php echo $i;?>]").click(function(){
                        var cari = "cari=<?php echo $cari;?>";
                        $.ajax({
                            url:'_views/role_02_user/data_data.php',
                            method : 'post',
                            data : { data: 'artikel', page : "<?php echo $i;?>", cari:cari },
                            success : function(data){
                                $("#indexData").html(data);
                            }
                        });
                    });
                </script>
                <?php
                if($i >= $page+2) {
                    break;
                }
            }
        }
        
        
        ?> 
        <button id='next' class='tombolKonten'>next</button> 
        
        
        
        <?php
    }


    if($_POST['data'] == 'all') { ?>

<script>
    $(document).ready(function(){
        $("#formCari").submit(function(){
            var cari = $("[name=cari]").serialize();
            $.ajax({
                url : '_views/role_02_user/data_data.php',
                method : 'POST',
                data : { data : 'all', page : '1', cari : cari },
                success : function(data){
                    $("#indexData").html(data);
                }
            });
        });
    });
</script>
<br/>
<form class="w3-right" action='javascript:void(0)' id="formCari" >
    <table>
        <tr><td><input type='text' name='cari' value='<?php echo $cari;?>'/></td> <td><input type='submit' value='Cari' /></td></tr>
    </table>
</form>


    <?php
        $fileDb = require_once('../../config/dbset.php');
        
        //$kon = new PDO("mysql:host=localhost;dbname=dummy", "root", "");
        if (isset($_POST['cari'])) {
            $cari = array();
            parse_str($_POST['cari'], $cari);
            $cari = $cari['cari'];
            if ($cari !='') {
                //$que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%'";
                $que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%'";
            } else {
                //$que = "SELECT * FROM data_lampiran";
                $que = "SELECT * FROM data_lampiran";
            }
        } else {
            //$que = "SELECT * FROM data_lampiran";
            $que = "SELECT * FROM data_lampiran";
        }
        
        $tugas = $kon->query($que);
        $total = $tugas->rowCount();
        $banyak_page = 5;
        $last_page = ceil($total/$banyak_page);
        if($last_page < 1) {
            $last_page = 1;
        }
        $page = $_POST['page'];
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $last_page) {
            $page = $last_page;
        }
        
        //$que = "SELECT * FROM data_lampiran WHERE kategori='artikel' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        if (isset($_POST['cari'])) {
            $cari = array();
            parse_str($_POST['cari'], $cari);
            $cari = $cari['cari'];
            if ($cari != '') {
                //$que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                $que = "SELECT * FROM data_lampiran WHERE judul LIKE '%$cari%' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            } else {
                //$que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
                $que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            }
        } else {
            //$que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
            $que = "SELECT * FROM data_lampiran LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        }
        $tugas = $kon->query($que);
        unset($fileDb);
        unset($kon);
        echo "<h3>All</h3>";
        //echo "<table>";
        //echo "<tr><th>Judul</th><th>Pengarang</th><th>Kategori</th><th>Penerbit</th><th>Tahun Penerbit</th><th>Tempat Penerbit</th><th>Info Lain</th><th>Detail</th></tr>";
        while($baris = $tugas->fetch()) { ?>
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container">
                    <h3><b><?php echo $baris['judul'];?></b></h3>
                    <h5><b>pengarang:</b> <?php echo $baris['pengarang'];?> <br/><b>kategori:</b> <?php echo $baris['kategori'];?></h5>
                </div>
                <div class="w3-container">
                    <p><?php echo $baris['info_detail'];?></p>
                    <div class="w3-row">
                        <div class="w3-col m8 s12">
                            <p><button class="w3-padding-large tombolKonten w3-border" onclick="$('#id01').fadeIn()"
                             id="<?php echo $baris['id'];?>" ><b>Detail</b></button></p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $("#<?php echo $baris['id']?>").click(function(){
                    $.ajax({
                        url : '_views/role_02_user/detail_data.php',
                        method : 'POST',
                        data : { id: "<?php echo $baris['id'];?>" },
                        success : function(data){
                            $("#detailData").html(data);
                        }
                    });
                });
            </script>
            
        
            
    <?php    }

        //echo "</table>"; ?>
        
        <script>
            $(document).ready(function(){
                $("#next").click(function(){
                    var cari = "cari=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_02_user/data_data.php',
                        method : 'post',
                        data : { data: 'all', page : "<?php echo $page+1;?>", cari:cari},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#previous").click(function(){
                    var cari = "cari=<?php echo $cari;?>";
                    $.ajax({
                        url:'_views/role_02_user/data_data.php',
                        method : 'post',
                        data : { data: 'all', page : "<?php echo $page-1;?>", cari:cari},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
            });
        </script>

        <button id='previous' class='tombolKonten'>previous</button> 
        <?php 
        if($last_page != 1) {
            if($page > 1) {
                for($i = $page-2; $i < $page; $i++) {
                    if($i > 0) {
                        ?>
                            <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                            <script>
                            $("[name=<?php echo $i;?>]").click(function(){
                                var cari = "cari=<?php echo $cari;?>";
                                $.ajax({
                                    url:'_views/role_02_user/data_data.php',
                                    method : 'post',
                                    data : { data: 'all', page : "<?php echo $i;?>", cari:cari },
                                    success : function(data){
                                        $("#indexData").html(data);
                                    }
                                });
                            });
                        </script>
                        <?php
                    }
                }
            }

            ?>
            <button class='w3-button w3-black' ><?php echo $page; ?></button>
            <?php
            for($i = $page+1; $i <= $last_page; $i++) {
                ?>
                <button class='w3-button w3-gray' name="<?php echo $i;?>"><?php echo $i; ?></button>
                <script>
                    $("[name=<?php echo $i;?>]").click(function(){
                        var cari = "cari=<?php echo $cari;?>";
                        $.ajax({
                            url:'_views/role_02_user/data_data.php',
                            method : 'post',
                            data : { data: 'all', page : "<?php echo $i;?>", cari:cari },
                            success : function(data){
                                $("#indexData").html(data);
                            }
                        });
                    });
                </script>
                <?php
                if($i >= $page+2) {
                    break;
                }
            }
        }
        
        
        ?> 
        <button id='next' class='tombolKonten'>next</button> 
        
        
        
        <?php
    }


} else {

    echo "halo pak";
}




?>



<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>