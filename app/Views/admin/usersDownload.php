<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>
<main class="download-message">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <h1>PERHATIAN</h1>
    <p>Silahkan download kartu ujian dengan menekan tombol dibawah ini, kartu dicetak dengan ukuran A5, kartu ini berisi informasi penting tentang pelaksanaan saringan masuk, maka wajib dibawa kala ujian berlangsung.</p>
    <p>Email berisi informasi yang sama telah dikirim ke akun email yang anda input sebagai backup informasi. Apabila terdapat kendala saat mendownload, informasi dalam email dapat di screenshoot atau di tik ulang dan di print sebagai ganti kartu ujian.</p>
    <div class="tombol">
        <form action="/admin/download" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method">
            <button class="main-button" type="submit">DONWLOAD</button>
        </form>
        <form action="/admin/email" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method">
            <button class="main-button" type="submit">KIRIM ULANG</button>
        </form>
        <a href="/admin/users" class="second-button">KEMBALI</a>
    </div>
    </section>
</main>
<?= $this->endSection(); ?>