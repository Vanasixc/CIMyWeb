<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="ml-3">
    <form method="post" action="<?= base_url('pages/kirim') ?>" name="inputan">
        <label for="input">Masukkan Text <?= isset($id) ? $id : '' ?></label><br>
        <textarea name="input" id="input" style="height: 200px; width: 500px;"></textarea> <br> <br>
        <input type="submit" name="buttonKirim" class="btn btn-success">
    </form>


    <form action="" name="output">
        <label for="outputLabel">Output: </label>
        <p><?= isset($getData) ? $getData : 'Output akan muncul disini' ?></p>
    </form>
</div>
<?= $this->endSection() ?>