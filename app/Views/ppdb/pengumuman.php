<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main class="kelulusan">
    <header class="search-header container">
        <h2>Pengumuman Kelulusan</h2>
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
                <?php echo "Pendaftar tidak ditemukan"; ?>
            </h4>
        </div>
        <?php endif; ?>
        <div class="list-items">
            <?php foreach ($daftar as $pendaftar) : ?>
            <?php if ($pendaftar['kelulusan'] != "BELUM DIPUTUSKAN") : ?>
            <div class="card-list <?= ($pendaftar['kelulusan'] == "TIDAK LULUS") ? "TIDAK-LULUS" : "LULUS" ?>">
                <p><?= $pendaftar['id']; ?>. <?= $pendaftar['nama_siswa']; ?></p>
                <h4><?= $pendaftar['kelulusan']; ?></h4>
            </div>
            <?php else : ?>
            <div class="card-list BELUM-DIPUTUSKAN">
                <p><?= $pendaftar['id']; ?>. <?= $pendaftar['nama_siswa']; ?></p>
                <h4><?= $pendaftar['kelulusan']; ?></h4>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </section>

</main>
<?= $this->endSection(); ?>