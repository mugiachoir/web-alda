<?= $this->extend('layout/templateGuru'); ?>

<?= $this->section('content'); ?>
<main class="teacher">

    <header class="search-header container">
        <div class="personal">
            <h2>My Class</h2>
            <h4><?= $user['nama']; ?></h4>
            <p><?= $user['nip']; ?></p>
        </div>
        <div class="filters">
            <div class="search teacher-search">
                <form action="" method="POST">
                    <?= csrf_field(); ?>
                    <input type="text" name="keyword" class="text-input" placeholder="Cari materi">
                    <button type="submit" name="search" class="search-button button"><img src="/icons/search.svg"
                            class="icon" alt="search"> Cari</button>
                </form>
            </div>
            <div class="class-option users-option teacher-option">
                <a href="" data-class="all"="" class="button second-button toggle-class on">All</a>
                <a href="" data-class="VII" class="button second-button toggle-class">VII</a>
                <a href="" data-class="VIII" class="button second-button toggle-class">VIII</a>
                <a href="" data-class="IX" class="button second-button toggle-class">IX</a>
            </div>
        </div>

    </header>



    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <section class="container">
        <a href="/teacher/create" class="button create"><img src="/icons/user-plus.svg" alt="user-plus" class="icon">
            Buat Materi</a>
        <?php if (empty($daftar)) : ?>
        <div class="container">
            <h4 class="alert warning">
                <?php echo "Materi tidak ditemukan"; ?>
            </h4>
        </div>
        <?php endif; ?>
        <div class="list-items">
            <?php foreach ($daftar as $materi) : ?>
            <div class="card-list <?= $materi['kelas']; ?>">
                <p><?= $materi['judul']; ?></p>
                <div class="buttons"><a href="/teacher/edit/<?= $materi['materi_id']; ?>" class="button edit">UBAH</a>
                    <form action="/teacher/<?= $materi['materi_id']; ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" value="DELETE" name="_method">
                        <button class="button delete" type="submit"
                            onclick="return confirm('Hapus materi?');">HAPUS</button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </section>

</main>
<?= $this->endSection(); ?>