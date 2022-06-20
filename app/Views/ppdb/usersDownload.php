<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main class="congrats-message">
    <div class="container">
        <img src="/img/handshake.gif" alt="thank your" class="congrats-image">
        <div class="message">
            <h2>Pendaftaran Berhasil</h2>
            <p>Download kartu ujian dengan menekan tombol dibawah ini, kartu dicetak dengan ukuran A5, kartu wajib
                dibawa saat seleksi.
            </p><br>
            <p>Telah dikirim email berisi kartu yang sama sebagai backup. Jika email tidak diterima setelah beberapa
                saat, silahkan tekan tombol kirim ulang</p>
            <div class="buttons">
                <form action="/ppdb/download" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method">
                    <button class="button" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="#24305b" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-download icon">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>Download</button>
                </form>
                <form action="/ppdb/email" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method">
                    <button class="button second-button" type="submit">Kirim Ulang</button>
                </form>
            </div>
            <a href="/ppdb/index" class="link">Kembali</a>
        </div>

        </section>
    </div>

</main>
<?= $this->endSection(); ?>