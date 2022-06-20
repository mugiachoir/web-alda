<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="kartu">
        <div class="gambar"><img src="/img/<?= $komik['sampul']; ?>" alt="<?= $komik['judul']; ?>"></div>
        <div class="keterangan">
            <h2><?= $komik['judul']; ?></h2>
            <p><?= $komik['penulis']; ?></p>
            <p><?= $komik['penerbit']; ?></p>
            <div class="aksi">
                <form action="/komik/<?= $komik['id']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" value="DELETE" name="_method">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                </form>
                <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-success">Edit</a>
            </div>

            <a href="/komik">kembali ke daftar</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>