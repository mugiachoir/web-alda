<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<main class="container">
    <h2 class="center">Edit Album</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <form class="formulir" action="/admin/updateGaleri" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $album['id']; ?>">
        <input type="hidden" name="fileLama" value="<?= $album['gambar']; ?>">
        <div class="input-group">
            <label for="nama">Nama Album</label>
            <input type="text" name="nama" value="<?= (old('nama')) ? old('nama') : $album['nama'] ?>" autofocus
                class="text-input <?= ($validation->hasError('nama')) ? "invalid" : ""; ?>" id="nama">
            <div class="errors-message">
                <?= $validation->getError('nama'); ?>
            </div>
        </div>
        <div class="input-group">
            <label for="link">Link</label>
            <input type="text" name="link" value="<?= (old('link')) ? old('link') : $album['link'] ?>"
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
                    class="text-input file-preview <?= ($validation->hasError('gambar')) ? "invalid" : ""; ?>"><?= $album['gambar'] ?></label>
            </div>
            <div class="errors-message">
                <?= $validation->getError('gambar'); ?>
            </div>
            <small>Upload File dengan ukuran maksimal 2 MB</small>
        </div>
        <br>
        <button type="submit" name="submit" class="button">Ubah</button>
    </form>
</main>
<?= $this->endSection(); ?>