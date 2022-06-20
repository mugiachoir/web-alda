<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<main class="container">
    <h2 class="center">Buat Pengumuman</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <form class="formulir" action="/admin/savePengumuman" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="input-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" value="<?= old('judul'); ?>" autofocus
                class="text-input <?= ($validation->hasError('judul')) ? "invalid" : ""; ?>" id="judul">
            <div class="errors-message">
                <?= $validation->getError('judul'); ?>
            </div>
        </div>
        <div class="input-group">
            <label for="pembuat">Sumber Informasi</label>
            <input type="text" name="pembuat" value="<?= old('pembuat'); ?>"
                class="text-input <?= ($validation->hasError('pembuat')) ? "invalid" : ""; ?>" id="pembuat">
            <div class="errors-message">
                <?= $validation->getError('pembuat'); ?>
            </div>
        </div>
        <br><br>
        <div class="input-group">
            <label for="isi">Isi Pengumuman</label>
            <textarea name="isi" id="isi" rows="20"
                class="text-input  <?= ($validation->hasError('isi')) ? "invalid" : ""; ?>"><?= old('isi'); ?></textarea>
            <div class="errors-message">
                <?= $validation->getError('isi'); ?>
            </div>
        </div>
        <div class="input-group">
            <label for="file">Upload file</label>
            <input type="file" class="file-input <?= ($validation->hasError('file')) ? "invalid" : ""; ?>" name="file"
                id="file" onchange="preview()">
            <div class="file-inline">
                <label for="file" class="button file-button"><img src="/icons/upload.svg" class="icon" alt="upload">
                    Upload</label>
                <label for="file"
                    class="text-input file-preview <?= ($validation->hasError('file')) ? "invalid" : ""; ?>"></label>
            </div>
            <div class="errors-message">
                <?= $validation->getError('file'); ?>
            </div>
            <small>Upload File dengan ukuran maksimal 2 MB</small>
        </div>
        <br>
        <button type="submit" name="submit" class="button">Buat Pengumuman</button>
    </form>
</main>
<?= $this->endSection(); ?>