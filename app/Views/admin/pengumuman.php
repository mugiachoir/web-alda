<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<main class="users-main">
    <header class="search-header container">
        <h2>Daftar Pengumuman</h2>
    </header>


    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <section class="container">
        <a href="/admin/createPengumuman" class="button create"><img src="/icons/plus-circle.svg" alt="plus-circle"
                class="icon">
            Buat Pengumuman</a>
        <?php if (empty($daftar)) : ?>
        <div class="container">
            <h4 class="alert warning">
                <?php echo "Pengumuman tidak ditemukan"; ?>
            </h4>
        </div>
        <?php endif; ?>
        <?php $x = 0; ?>
        <div class="list-items">
            <?php foreach ($daftar as $pengumuman) : ?>
            <div class="card-list ">
                <p><?= $x; ?> | <?= $pengumuman['judul']; ?></p>
                <div class="buttons"><a href="/admin/editPengumuman/<?= $pengumuman['id']; ?>"
                        class="button edit">Edit</a>
                    <form action="/admin/users/<?= $pengumuman['id']; ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" value="DELETE" name="_method">
                        <button class="button delete" type="submit" onclick="return confirm('Hapus user?');"><img
                                src="/icons/trash.svg" alt="delete" class="icon">Hapus</button>
                    </form>
                </div>
            </div>
            <?php $x++; ?>
            <?php endforeach; ?>
        </div>
    </section>

</main>
<?= $this->endSection(); ?>