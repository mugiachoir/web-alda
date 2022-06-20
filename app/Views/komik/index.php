<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Komik</h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <a href="/komik/create" class="btn btn-primary mb-2">Tambah Data</a>
    <table class="table table-light">
        <thead class="text-white bg-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sampul</th>
                <th scope="col">Judul</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $x = 1; ?>
            <?php foreach ($komik as $kom) : ?>
                <tr>
                    <th scope="row"><?= $x; ?></th>
                    <td><img src="/img/<?= $kom['sampul']; ?>" alt="<?= $kom['judul']; ?>" class="sampul"></td>
                    <td><?= $kom['judul']; ?></td>
                    <td><a class="btn btn-primary" href="<?= base_url(); ?>/komik/<?= $kom['slug']; ?>">Detail</a></td>
                </tr>
                <?php $x++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>