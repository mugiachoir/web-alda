<?= $this->extend('layout/templateAdmin'); ?>


<?= $this->section('content'); ?>
<main class="galeri">
    <header class="search-header container">
        <h2>Daftar Album</h2>
        <div class="search ">
            <form method="POST">
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
            <a href="/admin/createGaleri" class="button create"><img src="/icons/plus-circle.svg" alt="plus-circle"
                    class="icon">
                Buat Album</a>
            <div class="album-items">
                <?php foreach ($daftar as $album) : ?>
                <div class="card-sm" data-scroll>
                    <img src="/img/galeri/<?= $album['gambar']; ?>" alt="<?= $album['nama']; ?>" class="poster">
                    <div class="details">

                        <h4><?= $album['nama']; ?></h4>
                    </div>
                    <div class="buttons"><a href="/admin/editGaleri/<?= $album['id']; ?>" class="button edit">Edit</a>
                        <form action="/admin/galeri/<?= $album['id']; ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" value="DELETE" name="_method">
                            <button class="button delete" type="submit" onclick="return confirm('Hapus galeri?');"><img
                                    src="/icons/trash.svg" alt="delete" class="icon">Hapus</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>
<script src="/js/lightbox-plus-jquery.min.js"></script>
<?= $this->endSection(); ?>