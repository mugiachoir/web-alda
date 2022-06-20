<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main class="akademik">
    <header class="search-header container">
        <h2>Daftar Pelajaran</h2>
        <div class="search ">
            <form action="" method="POST">
                <?= csrf_field(); ?>
                <input type="text" name="keyword" class="text-input" placeholder="Cari pelajaran">
                <button type="submit" name="search" class="search-button button"><img src="/icons/search.svg"
                        class="icon" alt="search"> Cari</button>
            </form>
        </div>
    </header>

    <section class="pelajaran-container">
        <?php if (empty($daftar)) : ?>
        <div class="container">
            <h4 class="alert warning">
                <?php echo "Pelajaran tidak ditemukan"; ?>
            </h4>
        </div>
        <?php endif; ?>
        <div class="container">
            <div class="pelajaran-items">
                <?php $x = 0; ?>
                <?php foreach ($daftar as $pelajaran) : ?>
                <div class="card-sm" data-scroll>
                    <img src="/img/pelajaran/<?= $pelajaran['gambar']; ?>" class="poster"
                        alt="<?= $pelajaran['nama']; ?>">
                    <div class="details">
                        <p class="subtitle"><?= $banyak[$x]; ?> materi</p>
                        <h4><?= $pelajaran['nama']; ?></h4>
                    </div>
                    <a href="/akademik/<?= $pelajaran['slug']; ?>" class="button"><img src="/icons/read.svg"
                            class="icon" alt="read"> Pelajari</a>
                </div>
                <?php $x++; ?>
                <?php endforeach; ?>
            </div>
        </div>

    </section>

</main>
<?= $this->endSection(); ?>