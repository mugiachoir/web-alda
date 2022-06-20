<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<main class="profil">
    <header class="hero profil-page">
        <div class="hero-words">
            <img class="bg-circle" src="/img/lingkaran.svg" alt="lingkaran">
            <h1 class="main-hero">
                Madrasah Pertama <br>di Subang Selatan
            </h1>
            <div class="hero-button">
                <a href="#testimoni" class="button page-scroll">Daftar Sekarang</a>
                <a href="#news" class="button second-button page-scroll">Pengumuman</a>
            </div>
        </div>
    </header>
    <section id="tentang" class="sejarah container">
        <h2 data-scroll>Sejarah Alda</h2>
        <div data-scroll data-slow class="card-history">
            <img src="/img/pendiri.png" alt="ustad Ma'mun Baibars">
            <p>MTs Al-Hidayah Sagalaherang berlokasi di Jl. Alun-alun Timur No. 19. Kecamatan Sagalaherang
                Kabupaten Subang. MTs Al-Hidayah Sagalaherang berbatasan dengan Alun-alun Sagalaherang di sebelah Barat,
                Kantor Pos disebelah Timur, Jalan raya Alun-alun Sagalaherang di sebelah Utara, dan SD Tunas
                Harapan/Kantor Kecamatan Sagalaherang di sebelah Selatan.<br><br>
                MTs Al-Hidayah Sagalaherang didirikan pada tanggal 2 Agustus 1958 oleh Ustadz Ma’mun Baibars. Madrasah
                ini kini berada di bawah naungan Yayasan Pendidikan Islam Al-Ma’mun Baibars yang didirikan oleh bapak
                Gaos Silahudin, S.Pd. dan kawan-kawan pada Tanggal 25 Januari 1982 M/ 29 Rabiul Awal 1402 H.<br><br>
                MTs Al-Hidayah Sagalaherang telah meluluskan alumni-alumni yang kini menjabat dan berprofesi di berbagai
                bidang. Beberapa diantaranya menduduki jabatan penting di pemerintahan maupun instansi, sebagian
                diantaranya adalah : Bupati Subang Bapak H. Ruhimat, Sekda kabupaten Subang Bapak Aminudin, Kepala Dinas
                Pendidikan Kabupaten Subang Bapak Tatang Komara, Dekan Universitas Pendidikan Indonesia (UPI)
            </p>
        </div>
        <div class="visi-misi">
            <div class="card-mission">
                <div class="head">
                    <h3>Visi</h3>
                </div>
                <p>Terwujudnya Madrasah Tsanawiyah Al-Hidayah Sagalaherang yang unggul dalam prestasi akademik dan
                    berakhlaqul karimah </p>
            </div>
            <div class="card-mission">
                <div class="head">
                    <h3>Misi</h3>
                </div>
                <p>Penyelenggara Pendidikan yang memberi kesempatan luas kepada peserta didik untuk mengembangkan ilmu
                    pengetahuan, Bakat dan Minat</p>
            </div>
            <div class="card-mission">
                <div class="head">
                    <h3>Tujuan</h3>
                </div>
                <p>Meningkatkan prestasi akademik dan akhlaqul karimah peserta didik</p>
            </div>
        </div>
    </section>
    <section class="contact container">
        <div data-scroll data-slow class="card-contact">
            <h3>Hubungi Kami</h3>
            <ul>
                <li><a href="tel:02607481732"><i class=" fas fa-phone-alt"></i>
                        0260-7481-732
                    </a></li>
                <li><a href="https://wa.me/6283816030102" target="_blank"><i class=" fab fa-whatsapp"></i>
                        +62-838-1603-0102 (Operator)
                    </a></li>
                <li><a href="mailto:mts.aldasagalaherang@gmail.com" target="_blank"><i class=" far fa-envelope"></i>
                        mts.aldasagalaherang@gmail.com
                    </a></li>
                <li><a href="<?= base_url('/'); ?>"><i class=" fab fa-internet-explorer"></i>
                        https://mtsalda.com
                    </a></li>
                <li><a href="https://www.facebook.com/MTs.Alda" target="_blank"><i class=" fab fa-facebook"></i>
                        MTs AL DA
                    </a></li>
            </ul>
        </div>
    </section>
    <section class="map container">
        <h2 class="main-hero" data-scroll>
            Kunjungi Kami di
        </h2>
        <p>Jl. Alun-alun Timur No.19 Sagalaherang – Subang, 41282</p>

        <iframe data-scroll data-slow class="map-item"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.783971653545!2d107.65119171477676!3d-6.673667367098598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6918b11bd58959%3A0x59c0aaf996c78afd!2sMTS%20Al%20Hidayah!5e0!3m2!1sid!2sid!4v1595633396787!5m2!1sid!2sid"
            frameborder="1" style="border:0;" allowfullscreen="true" aria-hidden="false" tabindex="0"></iframe>
        <iframe src='https://my.spline.design/logopreview-dd1cfcafcbd1e7f97fbb996e78e140b3/' frameborder='0'
            width='100%' height='100%'></iframe>
    </section>
</main>
<script src="/js/jquery.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<?= $this->endSection(); ?>