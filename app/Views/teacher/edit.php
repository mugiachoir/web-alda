<?= $this->extend('layout/templateGuru'); ?>

<?= $this->section('content'); ?>
<main class="container">
    <h2 class="center">Ubah Materi</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <form class="formulir" action="/teacher/update" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="guru" value="<?= $user['user_id']; ?>">
        <input type="hidden" name="id" value="<?= $materi['materi_id']; ?>">
        <input type="hidden" name="fileLama" value="<?= $materi['link']; ?>">
        <div class="input-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" value="<?= (old('judul')) ? old('judul') : $materi['judul'] ?>" autofocus
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
                    <?php if (old('kelas')) : ?>
                    <?php if ($kls == old('kelas')) : ?>
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
                    <?php else : ?>
                    <?php if ($kls == $materi['kelas']) : ?>
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
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="input-group">
                <label for="pelajaran">Pelajaran</label>
                <div class="text-input select-container">
                    <select class="select-input" id='pelajaran' name='pelajaran'>
                        <?php foreach ($pelajaran as $pljrn) : ?>
                        <?php if (old('pelajaran')) : ?>
                        <?php if ($pljrn['nama'] == old('pelajaran')) : ?>
                        <option value='<?= $pljrn['nama']; ?>' selected><?= $pljrn['nama']; ?></option>
                        <?php else : ?>
                        <option value='<?= $pljrn['nama']; ?>'><?= $pljrn['nama']; ?></option>
                        <?php endif; ?>
                        <?php else : ?>
                        <?php if ($pljrn['slug'] == $materi['slug']) : ?>
                        <option value='<?= $pljrn['nama']; ?>' selected><?= $pljrn['nama']; ?></option>
                        <?php else : ?>
                        <option value='<?= $pljrn['nama']; ?>'><?= $pljrn['nama']; ?></option>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="input-group">
            <label for="keterangan">keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="3"
                class="text-input  <?= ($validation->hasError('keterangan')) ? "invalid" : ""; ?>"><?= (old('keterangan')) ? old('keterangan') : $materi['keterangan'] ?></textarea>
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
                    class="text-input file-preview <?= ($validation->hasError('materi')) ? "invalid" : ""; ?>"><?= $materi['link']; ?></label>
            </div>
            <div class="errors-message">
                <?= $validation->getError('materi'); ?>
            </div>
            <small>Upload File dengan ukuran maksimal 2 MB</small>
        </div>
        <button type="submit" name="submit" class="button">Ubah Materi</button>
    </form>
</main>
<?= $this->endSection(); ?>