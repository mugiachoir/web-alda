<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<main class="container">

    <h2 class="center">Status Kelulusan</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <div class="center">
        <p>Nomor urut <?= $siswa['id']; ?></p>
        <h3><?= $siswa['nama_siswa']; ?></h3>
        <h4><?= $siswa['sekolah_asal']; ?></h4>
    </div>
    <form class="formulir kelulusan" action="/admin/updatePendaftar" method="POST">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
        <div class="input-group">
            <div class="radio-inline">
                <?php foreach ($kelulusan as $rl) : ?>
                <?php if (old('kelulusan')) : ?>
                <?php if ($rl == old('kelulusan')) : ?>
                <div class="radio-group">
                    <input type="radio" name="kelulusan" value="<?= $rl; ?>" class="radio-input" checked>
                    <label><?= $rl; ?></label>
                </div>
                <?php else : ?>
                <div class="radio-group">
                    <input type="radio" name="kelulusan" value="<?= $rl; ?>" class="radio-input">
                    <label><?= $rl; ?></label>
                </div>
                <?php endif; ?>
                <?php else : ?>
                <?php if ($rl == $siswa['kelulusan']) : ?>
                <div class="radio-group">
                    <input type="radio" name="kelulusan" value="<?= $rl; ?>" class="radio-input" checked>
                    <label><?= $rl; ?></label>
                </div>
                <?php else : ?>
                <div class="radio-group">
                    <input type="radio" name="kelulusan" value="<?= $rl; ?>" class="radio-input">
                    <label><?= $rl; ?></label>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <button type="submit" name="submit" class="button">Submit</button>
    </form>
    </div>


</main>
<?= $this->endSection(); ?>