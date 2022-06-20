<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<main class="ppdb">
    <header class="hero ppdb-page">
        <img class="bg-circle" src="/img/lingkaran.svg" alt="lingkaran">
        <div class="hero-words">
            <h1 class="main-hero">
                Selamat bergabung kedalam keluarga besar kami
            </h1>
            <p>Sebelum mengisi formulir pendaftaran, kami sarankan untuk mempelajari alur pendaftaran dan aturan
                pengisian formulir terlebih dahulu.</p>
            <div class="hero-button">
                <a href="/ppdb/register" class="button page-scroll">Isi Formulir</a>
                <a href="#news" class="button second-button page-scroll"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1a7629" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-download icon">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>Download Formulir</a>
            </div>
        </div>
        <img class="hero-image" src="/img/school.svg" alt="ilustrasi sekolah">
    </header>
    <section class="guide container">
        <div class="guide-items ">
            <div class="guide-card" data-scroll="">
                <h3>Panduan Pendaftaran</h3>
                <p>Untuk menghindari kebingungan dalam proses penerimaan peserta didik baru ini, kami telah menyediakan
                    panduan lengkap dari setiap tahapan yang harus dilalui, jika masih ragu bisa ditanyakan dengan
                    mengirim pesan whatsapp kepada panitia</p>
                <div class="buttons">
                    <a href="#" class="button"><img src="/icons/download.svg" alt="location" class="icon">Download
                        Panduan</a>
                    <a href="#" class="button second-button"><img src="/icons/chat.svg" alt="chat" class="icon">Chat
                        Panitia</a>
                </div>
            </div>
            <div class="guide-card" data-scroll data-slow>
                <h3>Brosur PPDB</h3>
                <p>Jika anda menginginkan informasi yang lebih lengkap tentang MTs Al-Hidayah Sagalaherang, silahkan
                    bisa dilihat pada brosur.</p>
                <div class="buttons">
                    <a href="#" class="button"><img src="/icons/download.svg" alt="location" class="icon">Download
                        Brosur</a>
                </div>
            </div>
        </div>
    </section>
    <section id="alur" class="alur">
        <div class="container">
            <h2 data-scroll>Alur Pendaftaran</h2>
            <div class="buttons">
                <a class="pilih-alur online aktif button second-button" href="#"><svg class="icon"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                        height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"
                        style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);">
                        <g fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.636 5.636a1 1 0 0 0-1.414-1.414c-4.296 4.296-4.296 11.26 0 15.556a1 1 0 0 0 1.414-1.414a9 9 0 0 1 0-12.728zm14.142-1.414a1 1 0 1 0-1.414 1.414a9 9 0 0 1 0 12.728a1 1 0 1 0 1.414 1.414c4.296-4.296 4.296-11.26 0-15.556zM8.464 8.464A1 1 0 0 0 7.05 7.05a7 7 0 0 0 0 9.9a1 1 0 1 0 1.414-1.414a5 5 0 0 1 0-7.072zM16.95 7.05a1 1 0 1 0-1.414 1.414a5 5 0 0 1 0 7.072a1 1 0 0 0 1.414 1.414a7 7 0 0 0 0-9.9zM9 12a3 3 0 1 1 6 0a3 3 0 0 1-6 0z"
                                class="icon" fill="#1a7629" />
                        </g>
                        <rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" />
                    </svg> Jalur Online</a>
                <a class="pilih-alur manual button second-button" href="#"><svg class="icon"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                        height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"
                        style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);">
                        <g class="icon" fill="#1a7629">
                            <path
                                d="M3.707 2.293a1 1 0 0 0-1.414 1.414L15.535 16.95l2.829 2.828l1.929 1.93a1 1 0 0 0 1.414-1.415l-1.253-1.254c3.607-4.321 3.382-10.76-.676-14.817a1 1 0 0 0-1.414 1.414a9.001 9.001 0 0 1 .668 11.982l-1.425-1.425a7.002 7.002 0 0 0-.657-9.143a1 1 0 1 0-1.414 1.414a5.002 5.002 0 0 1 .636 6.294l-1.465-1.465a3 3 0 0 0-4-4l-7-7zM3.75 8.4a1 1 0 0 0-1.834-.8C.161 11.624.928 16.485 4.222 19.778a1 1 0 0 0 1.414-1.414A9.004 9.004 0 0 1 3.749 8.4zm3.32 2.766a1 1 0 0 0-1.972-.332A6.992 6.992 0 0 0 7.05 16.95a1 1 0 1 0 1.414-1.414a4.992 4.992 0 0 1-1.394-4.37z" />
                        </g>
                        <rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)" />
                    </svg>Jalur Offline</a>
            </div>
            <div class="alur-container" data-scroll data-slow>
                <div class="ilustrasi online tampil">
                    <img alt="alur pendaftaran online">
                </div>
                <div class="ilustrasi manual">
                    <img alt="alur pendaftaran manual">
                </div>
            </div>
        </div>
    </section>

</main>
<script src="/js/jquery.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<?= $this->endSection(); ?>