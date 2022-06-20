<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<main class="users-main">
    <header class="search-header container">
        <h2>Daftar Pengguna</h2>
        <div class="search ">
            <form action="" method="POST">
                <?= csrf_field(); ?>
                <input type="text" name="keyword" class="text-input" placeholder="Cari pengguna">
                <button type="submit" name="search" class="search-button button"><img src="/icons/search.svg"
                        class="icon" alt="search"> Cari</button>
            </form>
        </div>
    </header>

    <div class="class-option container users-option">
        <a href="" data-class="all"="" class="button second-button toggle-class on">All</a>
        <a href="" data-class="master" class="button second-button toggle-class">ADMIN</a>
        <a href="" data-class="guru" class="button second-button toggle-class">GURU</a>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <section class="container">
        <a href="/admin/createUser" class="button create"><img src="/icons/user-plus.svg" alt="user-plus" class="icon">
            Tambah User</a>
        <?php if (empty($daftar)) : ?>
        <div class="container">
            <h4 class="alert warning">
                <?php echo "Pengguna tidak ditemukan"; ?>
            </h4>
        </div>
        <?php endif; ?>
        <?php $x = 0; ?>
        <div class="list-items">
            <?php foreach ($daftar as $user) : ?>
            <div class="card-list <?= $user['role']; ?>">
                <p><?= $x; ?> | <?= $user['nama']; ?></p>
                <div class="buttons"><a href="/admin/editUser/<?= $user['user_id']; ?>" class="button edit">Edit</a>
                    <form action="/admin/users/<?= $user['user_id']; ?>" method="POST">
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