<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if($_POST['data'] == 'ebook') {
        echo "halo pak ini ebook<br/>";
        $fileDb = require_once('../../config/dbset.php');
        $que = $que = "SELECT * FROM data_lampiran";
        $tugas = $kon->query($que);
        $total = $tugas->rowCount();
        $banyak_page = 10;
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
        
        $que = "SELECT * FROM data_lampiran WHERE kategori='ebook' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        $tugas = $kon->query($que);
        unset($fileDb);
        unset($kon);
        echo "<table>";
        echo "<tr><th>Judul</th><th>Pengarang</th><th>Kategori</th><th>Penerbit</th><th>Tahun Penerbit</th><th>Tempat Penerbit</th><th>Info Lain</th><th>Detail</th></tr>";
        while($baris = $tugas->fetch()) { ?>

            <tr>
            <td><?php echo $baris['judul'];?></td>
            <td><?php echo $baris['pengarang'];?></td>
            <td><?php echo $baris['kategori'];?></td>
            <td><?php echo $baris['bahasa'];?></td>
            <td><?php echo $baris['penerbit'];?></td>
            <td><?php echo $baris['tahun_penerbit'];?></td>
            <td><?php echo $baris['tempat_penerbit'];?></td>
            <td><?php echo $baris['info_detail'];?></td>
            <td><button name="<?php echo $baris['id'];?>" >Detail</button></td>
            </tr>
            <script>
                $("[name=<?php echo $baris['id']?>]").click(function(){
                    $.ajax({
                        url : '_views/role_01_admin/detail_data.php',
                        method : 'POST',
                        data : { id: "<?php echo $baris['id'];?>" },
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
            </script>
            
        
            
    <?php    }

        echo "</table>"; ?>
        
        <script>
            $(document).ready(function(){
                $("#next").click(function(){
                    $.ajax({
                        url:'_views/role_01_admin/data_data.php',
                        method : 'post',
                        data : { data: 'ebook', page : "<?php echo $page+1;?>"},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#previous").click(function(){
                    $.ajax({
                        url:'_views/role_01_admin/data_data.php',
                        method : 'post',
                        data : { data: 'ebook', page : "<?php echo $page-1;?>"},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
            });
        </script>

        <button id='previous'>previous</button> 
        <?php 
        if($last_page != 1) {
            if($page > 1) {
                for($i = $page-2; $i < $page; $i++) {
                    if($i > 0) {
                        ?>
                            <button class='w3-button w3-blue' name="<?php echo $i;?>"><?php echo $i; ?></button>
                            <script>
                            $("[name=<?php echo $i;?>]").click(function(){
                                $.ajax({
                                    url:'_views/role_01_admin/data_data.php',
                                    method : 'post',
                                    data : { data: 'ebook', page : "<?php echo $i;?>" },
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
                <button class='w3-button w3-blue' name="<?php echo $i;?>"><?php echo $i; ?></button>
                <script>
                    $("[name=<?php echo $i;?>]").click(function(){
                        $.ajax({
                            url:'_views/role_01_admin/data_data.php',
                            method : 'post',
                            data : { data: 'ebook', page : "<?php echo $i;?>" },
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
        <button id='next'>next</button> 
        
        
        
        <?php
    }



    if($_POST['data'] == 'jurnal') {
        echo "halo pak ini jurnal<br/>";
        $fileDb = require_once('../../config/dbset.php');
        $que = $que = "SELECT * FROM data_lampiran";
        $tugas = $kon->query($que);
        $total = $tugas->rowCount();
        $banyak_page = 10;
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
        
        $que = "SELECT * FROM data_lampiran WHERE kategori='jurnal' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        $tugas = $kon->query($que);
        unset($fileDb);
        unset($kon);
        echo "<table>";
        echo "<tr><th>Judul</th><th>Pengarang</th><th>Kategori</th><th>Penerbit</th><th>Tahun Penerbit</th><th>Tempat Penerbit</th><th>Info Lain</th><th>Detail</th></tr>";
        while($baris = $tugas->fetch()) { ?>

            <tr>
            <td><?php echo $baris['judul'];?></td>
            <td><?php echo $baris['pengarang'];?></td>
            <td><?php echo $baris['kategori'];?></td>
            <td><?php echo $baris['bahasa'];?></td>
            <td><?php echo $baris['penerbit'];?></td>
            <td><?php echo $baris['tahun_penerbit'];?></td>
            <td><?php echo $baris['tempat_penerbit'];?></td>
            <td><?php echo $baris['info_detail'];?></td>
            <td><button >Detail</button></td>
            </tr>
            
        
            
    <?php    }

        echo "</table>"; ?>
        
        <script>
            $(document).ready(function(){
                $("#next").click(function(){
                    $.ajax({
                        url:'_views/role_01_admin/data_data.php',
                        method : 'post',
                        data : { data: 'jurnal', page : "<?php echo $page+1;?>"},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#previous").click(function(){
                    $.ajax({
                        url:'_views/role_01_admin/data_data.php',
                        method : 'post',
                        data : { data: 'jurnal', page : "<?php echo $page-1;?>"},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
            });
        </script>

        <button id='previous'>previous</button> 
        <?php 
        if($last_page != 1) {
            if($page > 1) {
                for($i = $page-2; $i < $page; $i++) {
                    if($i > 0) {
                        ?>
                            <button class='w3-button w3-blue' name="<?php echo $i;?>"><?php echo $i; ?></button>
                            <script>
                            $("[name=<?php echo $i;?>]").click(function(){
                                $.ajax({
                                    url:'_views/role_01_admin/data_data.php',
                                    method : 'post',
                                    data : { data: 'jurnal', page : "<?php echo $i;?>" },
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
                <button class='w3-button w3-blue' name="<?php echo $i;?>"><?php echo $i; ?></button>
                <script>
                    $("[name=<?php echo $i;?>]").click(function(){
                        $.ajax({
                            url:'_views/role_01_admin/data_data.php',
                            method : 'post',
                            data : { data: 'jurnal', page : "<?php echo $i;?>" },
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
        <button id='next'>next</button> 
        
        
        
        <?php
    }



    if($_POST['data'] == 'artikel') {
        echo "halo pak ini artikel<br/>";
        $fileDb = require_once('../../config/dbset.php');
        $que = $que = "SELECT * FROM data_lampiran";
        $tugas = $kon->query($que);
        $total = $tugas->rowCount();
        $banyak_page = 10;
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
        
        $que = "SELECT * FROM data_lampiran WHERE kategori='artikel' LIMIT ".($page - 1) * $banyak_page.", ".$banyak_page;
        $tugas = $kon->query($que);
        unset($fileDb);
        unset($kon);
        echo "<table>";
        echo "<tr><th>Judul</th><th>Pengarang</th><th>Kategori</th><th>Penerbit</th><th>Tahun Penerbit</th><th>Tempat Penerbit</th><th>Info Lain</th><th>Detail</th></tr>";
        while($baris = $tugas->fetch()) { ?>

            <tr>
            <td><?php echo $baris['judul'];?></td>
            <td><?php echo $baris['pengarang'];?></td>
            <td><?php echo $baris['kategori'];?></td>
            <td><?php echo $baris['bahasa'];?></td>
            <td><?php echo $baris['penerbit'];?></td>
            <td><?php echo $baris['tahun_penerbit'];?></td>
            <td><?php echo $baris['tempat_penerbit'];?></td>
            <td><?php echo $baris['info_detail'];?></td>
            <td><button >Detail</button></td>
            </tr>
            
        
            
    <?php    }

        echo "</table>"; ?>
        
        <script>
            $(document).ready(function(){
                $("#next").click(function(){
                    $.ajax({
                        url:'_views/role_01_admin/data_data.php',
                        method : 'post',
                        data : { data: 'artikel', page : "<?php echo $page+1;?>"},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
                $("#previous").click(function(){
                    $.ajax({
                        url:'_views/role_01_admin/data_data.php',
                        method : 'post',
                        data : { data: 'artikel', page : "<?php echo $page-1;?>"},
                        success : function(data){
                            $("#indexData").html(data);
                        }
                    });
                });
            });
        </script>

        <button id='previous'>previous</button> 
        <?php 
        if($last_page != 1) {
            if($page > 1) {
                for($i = $page-2; $i < $page; $i++) {
                    if($i > 0) {
                        ?>
                            <button class='w3-button w3-blue' name="<?php echo $i;?>"><?php echo $i; ?></button>
                            <script>
                            $("[name=<?php echo $i;?>]").click(function(){
                                $.ajax({
                                    url:'_views/role_01_admin/data_data.php',
                                    method : 'post',
                                    data : { data: 'artikel', page : "<?php echo $i;?>" },
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
                <button class='w3-button w3-blue' name="<?php echo $i;?>"><?php echo $i; ?></button>
                <script>
                    $("[name=<?php echo $i;?>]").click(function(){
                        $.ajax({
                            url:'_views/role_01_admin/data_data.php',
                            method : 'post',
                            data : { data: 'artikel', page : "<?php echo $i;?>" },
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
        <button id='next'>next</button> 
        
        
        
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