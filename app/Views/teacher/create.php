<?= $this->extend('layout/templateGuru'); ?>

<?= $this->section('content'); ?>
<main class="container">
    <h2 class="center">Tambah Materi</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <form class="formulir" action="/teacher/save" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" value="<?= $user['user_id']; ?>" name="guru">
        <div class="input-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" value="<?= old('judul'); ?>" autofocus
                class="text-input <?= ($validation->hasError('judul')) ? "invalid" : ""; ?>" id="judul">
            <div class="errors-message">
                <?= $validation->getError('judul'); ?>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group">
                <label for="kelas">Kelas</label>
                <div class="radio-inline">
                    <?php foreach ($kelas as $kls) : ?>
                    <?php if ($kls == old('kelas') || $kls == "VII") : ?>
                    <div class="radio-group">
                        <input type="radio" name="kelas" value="<?= $kls; ?>" class="radio-input" checked>
                        <label>Kelas <?= $kls; ?></label>
                    </div>
                    <?php else : ?>
                    <div class="radio-group">
                        <input type="radio" name="kelas" value="<?= $kls; ?>" class="radio-input">
                        <label>Kelas <?= $kls; ?></label>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="input-group">
                <label for="pelajaran">Pelajaran</label>
                <div class="select-container text-input">
                    <select class="select-input" id='pelajaran' name='pelajaran'>
                        <?php foreach ($pelajaran as $pljrn) : ?>
                        <?php if ($pljrn['nama'] == old('pelajaran')) : ?>
                        <option value="<?= $pljrn['nama']; ?>" selected><?= $pljrn['nama']; ?></option>
                        <?php else : ?>
                        <option value="<?= $pljrn['nama']; ?>"><?= $pljrn['nama']; ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="input-group">
            <label for="keterangan">keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="15"
                class="text-input  <?= ($validation->hasError('keterangan')) ? "invalid" : ""; ?>"><?= old('keterangan'); ?></textarea>
            <div class="errors-message">
                <?= $validation->getError('keterangan'); ?>
            </div>
        </div>
        <div class="input-group">
            <label for="materi">Upload file</label>
            <input type="file" class="file-input <?= ($validation->hasError('file')) ? "invalid" : ""; ?>" name="materi"
                id="materi" onchange="preview()">
            <div class="file-inline">
                <label for="materi" class="button file-button"><img src="/icons/upload.svg" class="icon" alt="upload">
                    Upload</label>
                <label for="materi"
                    class="text-input file-preview <?= ($validation->hasError('materi')) ? "invalid" : ""; ?>"></label>
            </div>
            <div class="errors-message">
                <?= $validation->getError('materi'); ?>
            </div>
            <small>Upload File dengan ukuran maksimal 2 MB</small>
        </div>
        <button type="submit" name="submit" class="button">Buat Materi</button>
    </form>
</main>
<?= $this->endSection(); ?>