<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<main class="container">
    <div class="formulir">
        <h2 class="center">Edit Berita</h2>
        <?php if (session()->getFlashdata('pesan')) : ?>
        <?= session()->getFlashdata('pesan'); ?>
        <?php endif; ?>
        <form class="formulir" action="/admin/updateNews" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $newsData['id']; ?>">
            <input type="hidden" name="fileLama" value="<?= $newsData['gambar']; ?>">
            <div class="input-group">
                <label for="nama">nama</label>
                <input type="text" name="nama" value="<?= (old('nama')) ? old('nama') : $newsData['nama'] ?>" autofocus
                    class="text-input <?= ($validation->hasError('nama')) ? "invalid" : ""; ?>" id="nama">
                <div class="errors-message">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="tanggal">Tanggal Kejadian</label>
                <input type="date" name="tanggal"
                    value="<?= (old('tanggal')) ? old('tanggal') : $newsData['tanggal'] ?>"
                    class="text-input <?= ($validation->hasError('tanggal')) ? "invalid" : ""; ?>" id="tanggal">
                <div class="errors-message">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
            <br><br>
            <div class="input-group">
                <label for="review">Review Singkat</label>
                <input type="text" name="review" value="<?= (old('review')) ? old('review') : $newsData['review'] ?>"
                    class="text-input <?= ($validation->hasError('review')) ? "invalid" : ""; ?>" id="review">
                <div class="errors-message">
                    <?= $validation->getError('review'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="keterangan">Isi Berita</label>
                <textarea name="keterangan" id="keterangan" rows="10"
                    class="text-input  <?= ($validation->hasError('keterangan')) ? "invalid" : ""; ?>"><?= (old('keterangan')) ? old('keterangan') : $newsData['keterangan'] ?></textarea>
                <div class="errors-message">
                    <?= $validation->getError('keterangan'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="gambar">Upload Gambar</label>
                <input type="file" class="file-input <?= ($validation->hasError('gambar')) ? "invalid" : ""; ?>"
                    name="gambar" id="gambar" onchange="preview()">
                <div class="file-inline">
                    <label for="gambar" class="button file-button"><img src="/icons/upload.svg" class="icon"
                            alt="upload">
                        Upload</label>
                    <label for="gambar"
                        class="text-input file-preview <?= ($validation->hasError('gambar')) ? "invalid" : ""; ?>"><?= $newsData['gambar'] ?></label>
                </div>
                <div class="errors-message">
                    <?= $validation->getError('gambar'); ?>
                </div>
                <small>Upload File dengan ukuran maksimal 2 MB</small>
            </div>
            <br>
            <button type="submit" name="submit" class="button">Ubah</button>

        </form>
    </div>


</main>
<?= $this->endSection(); ?>