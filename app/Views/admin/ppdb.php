<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<main class="ppdb-main-admin users-main">
    <header class="search-header container">
        <h2>Daftar Pendaftar</h2>
        <div class="search ">
            <form action="" method="POST">
                <?= csrf_field(); ?>
                <input type="text" name="keyword" class="text-input" placeholder="Cari pendaftar">
                <button type="submit" name="search" class="search-button button"><img src="/icons/search.svg"
                        class="icon" alt="search"> Cari</button>
            </form>
        </div>
    </header>

    <div class="class-option container users-option">
        <a href="" data-class="all"="" class="button second-button toggle-class on">All</a>
        <a href="" data-class="LULUS" class="button second-button toggle-class">LULUS</a>
        <a href="" data-class="TIDAK-LULUS" class="button second-button toggle-class">TIDAK LULUS</a>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <section class="container">
        <?php if (empty($daftar)) : ?>
        <div class="container">
            <h4 class="alert warning">
                <?php echo "Pengguna tidak ditemukan"; ?>
            </h4>
        </div>
        <?php endif; ?>
        <div class="list-items">
            <?php foreach ($daftar as $pendaftar) : ?>
            <?php if ($pendaftar['kelulusan'] != "BELUM DIPUTUSKAN") : ?>
            <div
                class="card-list pendaftar-item <?= ($pendaftar['kelulusan'] == "TIDAK LULUS") ? "TIDAK-LULUS" : "LULUS" ?>">
                <p><?= $pendaftar['id']; ?>. <?= $pendaftar['nama_siswa']; ?></p>
                <div class="buttons">
                    <a href="/admin/editPendaftar/<?= $pendaftar['id']; ?>" class="button edit">Edit</a>
                    <form action="/admin/deletePendaftar/<?= $pendaftar['id']; ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" value="DELETE" name="_method">
                        <button class="button delete" type="submit" onclick="return confirm('Hapus pengumuman?');"><img
                                src="/icons/trash.svg" alt="delete" class="icon">Hapus</button>
                    </form>
                </div>
            </div>
            <?php else : ?>
            <div class="card-list pendaftar BELUM-DIPUTUSKAN">
                <p><?= $pendaftar['id']; ?>. <?= $pendaftar['nama_siswa']; ?></p>
                <div class=" buttons">
                    <a href="/admin/editPendaftar/<?= $pendaftar['id']; ?>" class="button edit">Edit</a>
                    <form action="/admin/deletePendaftar/<?= $pendaftar['id']; ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" value="DELETE" name="_method">
                        <button class="button delete" type="submit" onclick="return confirm('Hapus pengumuman?');"><img
                                src="/icons/trash.svg" alt="delete" class="icon">Hapus</button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </section>

</main>
<?= $this->endSection(); ?>