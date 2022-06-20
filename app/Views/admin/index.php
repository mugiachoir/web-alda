<?= $this->extend('layout/templateAdmin'); ?>


<?= $this->section('content'); ?>
<main class="admin">
    <section class="album-container container">
        <h2>Selamat Datang<br><?= $admin['nama']; ?></h2>
        <div class="admin-items">
            <div class="card-sm" data-scroll>
                <img src="/img/users.jpg" alt="users" class="poster">
                <div class="details">
                    <p class="subtitle">25 Items</p>
                    <h4>Pengguna</h4>
                </div>
                <a href="/admin/users" class="button"><img src="/icons/manage.svg" class="icon" alt="manage"> Kelola</a>
            </div>
            <div class="card-sm" data-scroll>
                <img src="/img/pendaftar.jpg" alt="users" class="poster">
                <div class="details">
                    <p class="subtitle">25 Items</p>
                    <h4>PPDB Center</h4>
                </div>
                <a href="/admin/ppdb" class="button"><img src="/icons/manage.svg" class="icon" alt="manage"> Kelola</a>
            </div>
            <div class="card-sm" data-scroll>
                <img src="/img/news.jpg" alt="users" class="poster">
                <div class="details">
                    <p class="subtitle">25 Items</p>
                    <h4>Alda News</h4>
                </div>
                <a href="/admin/news" class="button"><img src="/icons/manage.svg" class="icon" alt="manage"> Kelola</a>
            </div>
            <div class="card-sm" data-scroll>
                <img src="/img/pengumuman.jpg" alt="users" class="poster">
                <div class="details">
                    <p class="subtitle">25 Items</p>
                    <h4>Pengumuman</h4>
                </div>
                <a href="/admin/pengumuman" class="button"><img src="/icons/manage.svg" class="icon" alt="manage">
                    Kelola</a>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection(); ?>