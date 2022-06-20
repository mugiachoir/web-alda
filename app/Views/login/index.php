<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main class="login container">
    <h2>Login</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <div class="card-login">
        <form action="/login/validasi" method="POST">
            <?= csrf_field(); ?>
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
                <input type="password" name="password"
                    class="text-input <?= ($validation->hasError('password')) ? "invalid" : ""; ?>" id="password">
                <div class="errors-message">
                    <?= $validation->getError('password'); ?>
                </div>
            </div>
            <button type="submit" name="submit" class="button">LOGIN</button>
            <p>Lupa Password? <a href="https://wa.me/6283816030102" target="_blank">Hubungi Admin</a></p>
        </form>
    </div>
</main>
<?= $this->endSection(); ?>