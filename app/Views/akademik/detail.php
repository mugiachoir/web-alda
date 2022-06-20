<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main class="akademik">
    <header class="search-header container">
        <h2>Daftar Materi</h2>
        <div class="search ">
            <form action="" method="POST">
                <?= csrf_field(); ?>
                <input type="text" name="keyword" class="text-input" placeholder="Cari pelajaran">
                <button type="submit" name="search" class="search-button button"><img src="/icons/search.svg"
                        class="icon" alt="search"> Cari</button>
            </form>
        </div>
    </header>

    <div class="class-option container users-option">
        <a href="" data-class="all"="" class="button second-button toggle-class on">All</a>
        <a href="" data-class="VII" class="button second-button toggle-class">VII</a>
        <a href="" data-class="VIII" class="button second-button toggle-class">VIII</a>
        <a href="" data-class="IX" class="button second-button toggle-class">IX</a>
    </div>

    <section class="pelajaran-container">
        <?php if (empty($daftar)) : ?>
        <div class="container">
            <h4 class="alert warning">
                <?php echo "Materi tidak ditemukan"; ?>
            </h4>
        </div>
        <?php endif; ?>

        <div class="materi-items container">
            <?php foreach ($daftar as $materi) : ?>
            <div class="card-materi <?= $materi['kelas']; ?>" data-scroll>
                <div class="card-detail">
                    <div class="detail-materi">
                        <p class="subtitle"><?= $materi['updated_at']; ?></p>
                        <h3><?= $materi['judul']; ?></h3>
                        <p>Kelas <?= $materi['kelas']; ?> | <?= $materi['nama']; ?></p>
                    </div>
                    <div class="buttons">
                        <a class="button download" href="/file/materi/<?= $materi['link']; ?>"
                            download="<?= $materi['judul']; ?>"><img src="/icons/download.svg" class="icon"
                                alt="download">Download</a>
                        <a href="#" class="button second-button toggle">Keterangan</a>
                    </div>
                </div>
                <div class="card-keterangan keterangan-materi hide "><?= $materi['keterangan']; ?> </div>
            </div>
            <?php endforeach; ?>
        </div>

    </section>

</main>
<?= $this->endSection(); ?>