<?php
$loadController = require_once('../../_controllers/role_01_admin_controller/tambah_data_controller.php');
unset($loadController);
?>

<script src="_asset/js/public.js"></script>
<script>
    $(document).ready(function(){
        $("#formData").submit(function(){
            $.ajax({
                url:'_views/role_01_admin/tambah_data.php',
                method: 'post',
                data : { data : $(this).serialize(), lampiran_berkas :  },
                cache: false,
                success : function(data){
                    $("#indexAdmin").html(data);
                }
            });
        });

    });

</script>


<h2>Tambah data masih dalam pengembangan</h2>
<form method="post" action="javascript:void(0)" id="formData">
    <table>
        <tr><td>Pengarang: </td><td><input type="text" name="pengarang" value="" placeholder="Pengarang ..." /></td></tr>
        <tr><td>Edisi: </td><td><input type="text" name="edisi" value="" placeholder="Edisi ..." /></td></tr>
        <tr><td>No. Panggil: </td><td><input type="text" name="no_panggil" value="" placeholder="No. Panggil ..." /></td></tr>
        <tr><td>Subyek: </td><td><input type="text" name="subyek" value="" placeholder="Subyek ...." /></td></tr>
        <tr><td>Klasifikasi: </td><td><input type="text" name="klasifikasi" value="" placeholder="Klasifikasi ..." /></td></tr>
        <tr><td>Judul Seri: </td><td><input type="text" name="judul_seri" value="" placeholder="Judul Seri ..." /></td></tr>
        <tr><td>GMD: </td><td>
        <select name="gmd">
        <option value="">Masukan GMD ...</option>
        <option value="Ebook">E-Book</option>
        <option value="Jurnal">Jurnal</option>
        </select>
        </td></tr>
        <tr><td>Bahasa: </td><td><input type="text" name="bahasa" value="" placeholder="Bahasa ..." /></td></tr>
        <tr><td>Penerbit: </td><td><input type="text" name="penerbit" value="" placeholder="Penerbit ..." /></td></tr>
        <tr><td>Tahun Penerbit: </td><td><input type="text" name="tahun_penerbit" value="" placeholder="Tahun Penerbit ..." /></td></tr>
        <tr><td>Tempat Penerbit: </td><td><input type="text" name="tempat_penerbit" value="" placeholder="Tempat Penerbit ..." /></td></tr>
        <tr><td>Info Detail Spesifik: </td><td><textarea name="info_detail" placeholder"Info dan Detail ..."></textarea></td></tr>
        <tr><td>Lampiran Berkas: </td><td><input type="file" name="lampiran_berkas" accept=".pdf, .doc, .docx, audio/*, image/*"/></td></tr>
        <tr><td><input type="submit" value="Simpan"></td><td></td></tr>
    </table>
</form>


<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("indexAjax") == null) {
        window.open("../../index.php","_self");
    }
</script>