<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main class="home">
    <header class="hero homepage">
        <div class="hero-words">
            <h1 class="main-hero">
                Mendidik Siswa <br>Untuk Bermanfaat<br> dan Bermartabat
            </h1>
            <p>Disini kami memberikan pendidikan berlandaskan pada akidah Islam dan ilmu pengetahuan modern, sehingga
                kami dapat mencetak insan yang bermanfaat serta bermartabat</p>
            <div class="hero-button">
                <a href="#testimoni" class="button page-scroll">Daftar Sekarang</a>
                <a href="#news" class="button second-button page-scroll">Pengumuman</a>
            </div>
        </div>

    </header>
    <section class="container benefits">
        <div data-scroll data-slow class="card-benefits">
            <img src="/img/ben1.svg" alt="benefit" class="benefit">
            <img src="/img/ben2.svg" alt="benefit" class="benefit">
            <img src="/img/ben3.svg" alt="benefit" class="benefit">
            <img src="/img/ben4.svg" alt="benefit" class="benefit">
        </div>
    </section>
    <section class="container testimoni" id="testimoni">
        <h2 data-scroll>Testimoni Alumni</h2>
        <a href="#" class="see-more-testi button"><img src="/icons/list.svg" alt="list" class="icon">Lihat
            Selengkapnya</a>
        <div class="testimoni-items">
            <div class="card-testimoni">
                <img src="/img/pajimat.jpg" alt="bupati" data-scroll>
                <div class="testimoni-words">
                    <div class="quote-symbol">
                        <img src="/img/quote-icon.svg" alt="quote-symbol">
                    </div>
                    <p>Alhamdulillah, saya sangat bersyukur menjadi salah satu alumni dari MTs. Al-Hidayah Sagalaherang,
                        dengan berkahnya ilmu yang didapat dari guru saya ketika sekolah kebermanfaatannya bisa terasa
                        oleh masyarakat.</p>
                    <div class="identitas">
                        <p class="emphasize-text">H. Ruhimat, S.Pd., M.Si.</p>
                        <p class="subtitle">Bupati Kabupaten Subang</p>
                    </div>
                </div>
            </div>
            <div class="card-testimoni">
                <img src="/img/patata.jpg" alt="kepala dinas" data-scroll>
                <div class="testimoni-words">
                    <div class="quote-symbol">
                        <img src="/img/quote-icon.svg" alt="quote-symbol">
                    </div>
                    <p>Jangan pernah berkecil hati, banyak orang sukses khususnya di Kabupaten Subang yang merupakan
                        lulusan dari MTs Al-Hidayah Sagalaherang.</p>
                    <div class="identitas">
                        <p class="emphasize-text">Tatang Komara, S.Pd., M.Si.</p>
                        <p class="subtitle">Kepala Dinas Pendidikan dan Kebudayaan Kab. Subang</p>
                    </div>
                </div>
            </div>
            <div class="card-testimoni">
                <img src="/img/bapa.jpg" alt="bapa" data-scroll>
                <div class="testimoni-words">
                    <div class="quote-symbol">
                        <img src="/img/quote-icon.svg" alt="quote-symbol">
                    </div>
                    <p>Lulusan MTs Al-Hidayah pada umumnya selalu memiliki nilai lebih di masyarakat, hal ini
                        dikarenakan pendidikan yang diterimanya di sana memiliki dasar karakter yang kuat.</p>
                    <div class="identitas">
                        <p class="emphasize-text">Dede Ruhyana, S.Pd.</p>
                        <p class="subtitle">Peraih Penghargaan Guru Teladan Kec. Sagalaherang 2019</p>

                    </div>
                </div>
            </div>
            <div class="card-testimoni testi-plus hide displayControl">
                <img src="/img/sekda.jpg" alt="sekda" data-scroll>
                <div class="testimoni-words">
                    <div class="quote-symbol">
                        <img src="/img/quote-icon.svg" alt="quote-symbol">
                    </div>
                    <p>MTs Al-Hidayah Sagalaherang merupakan lembaga pendidikan yang dilandasi dengan keagamaan, yang
                        sangat berpotensi dalam memberikan dorongan semangat dan motivasi pada siswa. Sehingga lulusan
                        dari MTs Al-Hidayah dapat diterima di tengah masyarakat.</p>
                    <div class="identitas">
                        <p class="emphasize-text">Drs. H. Aminudin, M.Si.</p>
                        <p class="subtitle">Sekretaris Daerah Kab.Subang-Jawa Barat</p>

                    </div>
                </div>
            </div>
            <div class="card-testimoni testi-plus hide displayControl">
                <img src="/img/alumni1.jpg" alt="fikri" data-scroll>
                <div class="testimoni-words">
                    <div class="quote-symbol">
                        <img src="/img/quote-icon.svg" alt="quote-symbol">
                    </div>
                    <p>Kegiatan-kegiatan di Alda sangat bermanfaat untuk saya, karena selain pendidikan di dalam kelas
                        yang baik, Alda juga memiliki tradisi organisasi yang sangat kuat</p>
                    <div class="identitas">
                        <p class="emphasize-text">Muhammad Fikri</p>
                        <p class="subtitle">International Personal Franchise Owner</p>

                    </div>
                </div>
            </div>
            <div class="card-testimoni testi-plus hide displayControl">
                <img src="/img/alumni2.jpg" alt="sabiq" data-scroll>
                <div class="testimoni-words">
                    <div class="quote-symbol">
                        <img src="/img/quote-icon.svg" alt="quote-symbol">
                    </div>
                    <p>Masa-masa bersekolah di Alda adalah masa-masa yang menyenangkan dan penuh dengan pengalaman
                        hebat, setiap orang akan merasa beruntung jika bersekolah disana.</p>
                    <div class="identitas">
                        <p class="emphasize-text">Muhammad Sabiq Arrosyad</p>
                        <p class="subtitle">Mahasiswa Bilge Insan Akademi Sakarya Turkey</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="prestasi container">
        <h2 data-scroll>Beberapa Prestasi Kami</h2>
        <a href="#" class="see-more-pres modal-pres-button button"><img src="/icons/list.svg" alt="list" class="icon">Lihat Selengkapnya</a>

        <div class="prestasi-items ">
            <div class="card-lg">
                <img src="/img/prestasi/ksm.jpg" alt="ksm provinsi">
                <div class="card-detail">
                    <h3>Kompetisi Science Madrasah Provinsi</h3>
                    <p class="desk-pres">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam incidunt
                        modi
                        ratione minus sunt exercitationem!</p>
                    <div data-scroll class="pill-container">
                        <p class="pill-lg"><img src="/icons/location.svg" alt="location" class="icon">Provinsi</p>
                        <p class="pill-lg">Juara 2 IPA</p>
                    </div>
                </div>
            </div>
            <div class="card-lg">
                <img src="/img/prestasi/passkibra.jpg" alt="Passkibra">
                <div class="card-detail">
                    <h3>LKBB PASSMANSA 22</h3>
                    <p class="desk-pres">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam incidunt
                        modi
                        ratione minus sunt exercitationem!</p>
                    <div data-scroll class="pill-container">
                        <p class="pill-lg"><img src="/icons/location.svg" alt="location" class="icon">Provinsi</p>
                        <p class="pill-lg">Juara Mula 3</p>
                    </div>
                </div>
            </div>
            <div class="card-lg">
                <img src="/img/prestasi/ksm2.jpg" alt="ksm">
                <div class="card-detail">
                    <h3>Kompetisi Science Madrasah Kabupaten</h3>
                    <p class="desk-pres">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam incidunt
                        modi
                        ratione minus sunt exercitationem!</p>
                    <div data-scroll class="pill-container">
                        <p class="pill-lg"><img src="/icons/location.svg" alt="location" class="icon">Kabupaten</p>
                        <p class="pill-lg">Juara 1 Matematika</p>
                        <p class="pill-lg">Juara 1 IPA</p>
                    </div>
                </div>
            </div>
            <div class="card-lg">
                <img src="/img/prestasi/pramuka.jpg" alt="ksm provinsi">
                <div class="card-detail">
                    <h3>MASCOUT</h3>
                    <p class="desk-pres">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam incidunt
                        modi
                        ratione minus sunt exercitationem!</p>
                    <div data-scroll class="pill-container">
                        <p class="pill-lg"><img src="/icons/location.svg" alt="location" class="icon">Kabupaten</p>
                        <p class="pill-lg">Juara 1 Pop Singer Pi</p>
                        <p class="pill-lg">Juara 2 Pop Singer Pa</p>
                        <p class="pill-lg">Juara 3 Pioneering</p>
                        <p class="pill-lg">Juara 3 PUSGP</p>
                        <p class="pill-lg">Juara 3 Tarkom</p>
                    </div>
                </div>
            </div>
            <div class="card-lg">
                <img src="/img/prestasi/gema.jpg" alt="gema">
                <div class="card-detail">
                    <h3>Gema Pramuka</h3>
                    <p class="desk-pres">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam incidunt
                        modi
                        ratione minus sunt exercitationem!</p>
                    <div data-scroll class="pill-container">
                        <p class="pill-lg"><img src="/icons/location.svg" alt="location" class="icon">Kabupaten</p>
                        <p class="pill-lg">Juara 1 Pramuka Idol Pa</p>
                        <p class="pill-lg">Juara 1 Pramuka Idol Pi</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modalPres">
        </div>
    </section>
    <section class="pengumuman container">
        <h2 data-scroll>Pengumuman</h2>
        <div class="pengumuman-container">
            <div class="side-pengumuman">
                <ul>
                    <?php for ($x = 0; $x < 5; $x++) : ?>
                        <li class="<?= ($x == 0) ? 'aktif' : ''; ?>"><?= $pengumuman[$x]['tanggal']; ?></li>
                    <?php endfor; ?>
                </ul>
            </div>
            <div class="main-pengumuman">
                <?php for ($x = 0; $x < 5; $x++) : ?>
                    <div class="pengumuman-item <?= ($x == 0) ? 'tampil' : ''; ?>">
                        <p class="emphasize-text"><?= $pengumuman[$x]['judul']; ?></p>
                        <p><?= $pengumuman[$x]['isi']; ?></p>
                        <p class="sumber">Sumber: <?= $pengumuman[$x]['pembuat']; ?></p>
                        <?php if ($pengumuman[$x]['file']) : ?>
                            <a class="button" href="/file/materi/<?= $pengumuman[$x]['file']; ?>" download="<?= $pengumuman[$x]['judul']; ?>"><img src="/icons/download.svg" alt="location" class="icon">Download</a>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>
    <section id="news" class="news ">
        <h2 class="container" data-scroll>Alda News</h2>
        <div class="news-items container">
            <?php for ($x = 0; $x < 4; $x++) : ?>
                <div class="card-news">
                    <img class="modal-detail-button" data-id="<?= $kegiatan[$x]['id']; ?>" src="/img/news/<?= $kegiatan[$x]['gambar']; ?>" alt="<?= $kegiatan[$x]['nama']; ?>">
                    <div class="card-detail ">
                        <p class="subtitle modal-detail-button" data-id="<?= $kegiatan[$x]['id']; ?>">
                            <?= $kegiatan[$x]['tanggal']; ?></p>
                        <h4 class="modal-detail-button" data-id="<?= $kegiatan[$x]['id']; ?>"><?= $kegiatan[$x]['nama']; ?>
                        </h4>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="modal container">
        </div>
    </section>

</main>
<script src="/js/jquery.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/glide.min.js"></script>
<?= $this->endSection(); ?>