<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<main class="container">
    <h2 class="center">Tambah User</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <form class="formulir" action="/admin/saveUser" method="POST">
        <?= csrf_field(); ?>
        <input type="hidden" value="<?= $admin['nama']; ?>" name="admin">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?= old('username'); ?>" autofocus
                class="text-input <?= ($validation->hasError('username')) ? "invalid" : ""; ?>" id="username">
            <div class="errors-message">
                <?= $validation->getError('username'); ?>
            </div>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="<?= old('password'); ?>"
                class="text-input <?= ($validation->hasError('password')) ? "invalid" : ""; ?>" id="password">
            <div class="errors-message">
                <?= $validation->getError('password'); ?>
            </div>
        </div>
        <br><br>
        <div class="input-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?= old('nama'); ?>"
                class="text-input <?= ($validation->hasError('nama')) ? "invalid" : ""; ?>" id="nama">
            <div class="errors-message">
                <?= $validation->getError('nama'); ?>
            </div>
        </div>
        <div class="input-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" value="<?= old('nip'); ?>"
                class="text-input <?= ($validation->hasError('nip')) ? "invalid" : ""; ?>" id="nip">
            <div class="errors-message">
                <?= $validation->getError('nip'); ?>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group">
                <label for="role">Role</label>
                <div class="radio-inline double">
                    <?php foreach ($role as $rl) : ?>
                    <?php if ($rl == old('role') || $rl == "guru") : ?>
                    <div class="radio-group">
                        <input type="radio" name="role" value="<?= $rl; ?>" class="radio-input" checked>
                        <label><?= $rl; ?></label>
                    </div>
                    <?php else : ?>
                    <div class="radio-group">
                        <input type="radio" name="role" value="<?= $rl; ?>" class="radio-input">
                        <label><?= $rl; ?></label>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="input-group">
                <label for="status">Status</label>
                <div class="radio-inline double">
                    <?php foreach ($status as $stat) : ?>
                    <?php if ($stat == old('status') || $stat == "0") : ?>
                    <div class="radio-group">
                        <input type="radio" name="status" value="<?= $stat; ?>" class="radio-input" checked>
                        <label><?= $stat; ?></label>
                    </div>
                    <?php else : ?>
                    <div class="radio-group">
                        <input type="radio" name="status" value="<?= $stat; ?>" class="radio-input">
                        <label><?= $stat; ?></label>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <br><br>
        <button type="submit" name="submit" class="button">Buat Pengguna</button>
    </form>
</main>
<?= $this->endSection(); ?>