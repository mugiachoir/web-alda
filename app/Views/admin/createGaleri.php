<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<main class="container">
    <h2 class="center">Buat Album</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <form class="formulir" action="/admin/saveGaleri" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="input-group">
            <label for="nama">Nama Album</label>
            <input type="text" name="nama" value="<?= old('nama'); ?>" autofocus
                class="text-input <?= ($validation->hasError('nama')) ? "invalid" : ""; ?>" id="nama">
            <div class="errors-message">
                <?= $validation->getError('nama'); ?>
            </div>
        </div>
        <div class="input-group">
            <label for="link">Link</label>
            <input type="text" name="link" value="<?= old('link'); ?>"
                class="text-input <?= ($validation->hasError('link')) ? "invalid" : ""; ?>" id="link">
            <div class="errors-message">
                <?= $validation->getError('link'); ?>
            </div>
        </div>
        <div class="input-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" class="file-input <?= ($validation->hasError('gambar')) ? "invalid" : ""; ?>"
                name="gambar" id="gambar" onchange="preview()">
            <div class="file-inline">
                <label for="gambar" class="button file-button"><img src="/icons/upload.svg" class="icon" alt="upload">
                    Upload</label>
                <label for="gambar"
                    class="text-input file-preview <?= ($validation->hasError('gambar')) ? "invalid" : ""; ?>"></label>
            </div>
            <div class="errors-message">
                <?= $validation->getError('gambar'); ?>
            </div>
            <small>Upload File dengan ukuran maksimal 2 MB</small>
        </div>
        <br>
        <button type="submit" name="submit" class="button">Buat Album</button>
    </form>
</main>
<?= $this->endSection(); ?>