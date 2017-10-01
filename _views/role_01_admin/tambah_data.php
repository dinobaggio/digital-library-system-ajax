<?php
$loadController = require_once('../../_controllers/role_01_admin_controller/tambah_data_controller.php');
unset($loadController);
?>

<script src="_asset/js/public.js"></script>
<script>
    $(document).ready(function(){
        $("#formData").submit(function(){
            var formData = new FormData(this);
            $.ajax({
                url : '_views/role_01_admin/tambah_data.php',
                method : 'post',
                data : formData,
                contentType : false,
                cache : false,
                processData : false,
                success : function(data){
                    $("#indexAdmin").html(data);
                },
                error: function(data){
                    $("#indexAdmin").html(data);
                }
            });
        });

    });

</script>

<div class="w3-animate-right w3-section">
    <h2>Tambah Data</h2>
    <form method="post" action="javascript:void(0)" id="formData">
        <table>
            <tr><td>Judul: </td><td><input type="text" name="judul" value="<?php echo $judul;?>" placeholder="Judul ..." /></td><td><span class='error'><?php echo $errJudul;?></span></td></tr>
            <tr><td>kategori: </td><td>
                <select name="kategori">
                    <option value="" <?php echo $kategoriDefault;?> >Masukan Kategori ...</option>
                    <option value="ebook" <?php echo $ebook;?> >E-Book</option>
                    <option value="jurnal" <?php echo $jurnal;?> >Jurnal</option>
                    <option value="artikel" <?php echo $artikel;?> >Artikel</option>
                </select>
            </td><td><span class='error'><?php echo $errKategori;?></span></td></tr>
            <tr><td>Pengarang: </td><td><input type="text" name="pengarang" value="" placeholder="Pengarang ..." /></td></tr>
            <tr><td>Bahasa: </td><td><input type="text" name="bahasa" value="" placeholder="Bahasa ..." /></td></tr>
            <tr><td>Penerbit: </td><td><input type="text" name="penerbit" value="" placeholder="Penerbit ..." /></td></tr>
            <tr><td>Tahun Penerbit: </td><td><input type="text" name="tahun_penerbit" value="" placeholder="Tahun Penerbit ..." /></td></tr>
            <tr><td>Tempat Penerbit: </td><td><input type="text" name="tempat_penerbit" value="" placeholder="Tempat Penerbit ..." /></td></tr>
            <tr><td>Info Detail Spesifik: </td><td><textarea name="info_detail" placeholder"Info dan Detail ..."></textarea></td></tr>
            <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
            <tr><td>Lampiran Berkas: </td><td><input type="file" name="lampiran_berkas" accept=".pdf, .doc, .docx"/></td><td><span class='error'><?php echo $errFile;?></span></td></tr>
            <tr><td><input type="submit" value="Simpan"></td><td></td></tr>
        </table>
    </form>
</div>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>