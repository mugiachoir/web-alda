<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<main class="galeri">
    <header class="search-header container">
        <h2>Daftar Album</h2>
        <div class="search ">
            <form action="/galeri" method="POST">
                <?= csrf_field(); ?>
                <input type="text" name="keyword" class="text-input" placeholder="Cari album">
                <button type="submit" name="search" class="search-button button"><img src="/icons/search.svg"
                        class="icon" alt="search"> Cari</button>
            </form>
        </div>
    </header>

    <section class="album-container">
        <?php if (empty($daftar)) : ?>
        <div class="container">
            <h4 class="alert warning">
                <?php echo "Album tidak ditemukan"; ?>
            </h4>
        </div>
        <?php endif; ?>
        <div class="container">
            <div class="album-items">
                <?php foreach ($daftar as $album) : ?>
                <div class="card-sm" data-scroll>
                    <img src="/img/galeri/<?= $album['gambar']; ?>" alt="<?= $album['nama']; ?>" class="poster">
                    <div class="details">
                        <p class="subtitle"><?= $album['updated_at']; ?></p>
                        <h4><?= $album['nama']; ?></h4>
                    </div>
                    <a href="<?= $album['link']; ?>" target="_blank" class="button"><img src="/icons/drive.svg"
                            class="icon" alt="google drive"> Kunjungi</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>
<script src="/js/lightbox-plus-jquery.min.js"></script>
<?= $this->endSection(); ?>