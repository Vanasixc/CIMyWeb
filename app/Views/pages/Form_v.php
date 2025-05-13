<form action="<?= base_url(); ?>mahasiswa/login" method="POST">
    <input type="text" name="username">
    <button class="form-submit">Submit</button>
</form>

<?php
if(isset($pesan)) echo $pesan;
?>