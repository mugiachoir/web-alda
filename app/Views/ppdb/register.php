<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main class="register container">
    <h2 class="center">Formulir Pendaftaran</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <form class="formulir" action="/ppdb/save" method="POST">
        <?= csrf_field(); ?>
        <input type="hidden" name="kelulusan" value="BELUM DIPUTUSKAN">
        <div class="form-group">
            <h4>Identitas Siswa</h4>
            <div class="input-group">
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" value="<?= old('nisn'); ?>" autofocus
                    class="text-input <?= ($validation->hasError('nisn')) ? "invalid" : ""; ?>" id="nisn">
                <div class="errors-message">
                    <?= $validation->getError('nisn'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="nik">NIK Siswa</label>
                <input type="text" name="nik" value="<?= old('nik'); ?>"
                    class="text-input <?= ($validation->hasError('nik')) ? "invalid" : ""; ?>" id="nik">
                <div class="errors-message">
                    <?= $validation->getError('nik'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="nama">Nama <i>(sesuai ijazah)</i></label>
                <input type="text" name="nama" value="<?= old('nama'); ?>"
                    class="text-input <?= ($validation->hasError('nama')) ? "invalid" : ""; ?>" id="nama">
                <div class="errors-message">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
            <div class="form-inline">
                <div class="input-group">
                    <label for="tempat">Tempat lahir</label>
                    <input type="text" name="tempat" value="<?= old('tempat'); ?>"
                        class="text-input <?= ($validation->hasError('tempat')) ? "invalid" : ""; ?>" id="tempat">
                    <div class="errors-message">
                        <?= $validation->getError('tempat'); ?>
                    </div>
                </div>
                <div class="input-group">
                    <label for="tanggal">Tanggal lahir</label>
                    <input type="date" name="tanggal" value="<?= old('tanggal'); ?>"
                        class="text-input <?= ($validation->hasError('tanggal')) ? "invalid" : ""; ?>" id="tanggal">
                    <div class="errors-message">
                        <?= $validation->getError('tanggal'); ?>
                    </div>
                </div>
            </div>
            <div class="input-group">
                <label for="kelamin">Jenis Kelamin</label>
                <div class="radio-inline double">
                    <?php foreach ($kelamin as $rl) : ?>
                    <?php if ($rl == old('kelamin') || $rl == "Laki-laki") : ?>
                    <div class="radio-group">
                        <input type="radio" name="kelamin" value="<?= $rl; ?>" class="radio-input" checked>
                        <label><?= $rl; ?></label>
                    </div>
                    <?php else : ?>
                    <div class="radio-group">
                        <input type="radio" name="kelamin" value="<?= $rl; ?>" class="radio-input">
                        <label><?= $rl; ?></label>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <br><br>
            <div class="input-group">
                <label for="asal">Sekolah asal</label>
                <input type="text" name="asal" value="<?= old('asal'); ?>"
                    class="text-input <?= ($validation->hasError('asal')) ? "invalid" : ""; ?>" id="asal">
                <div class="errors-message">
                    <?= $validation->getError('asal'); ?>
                </div>
            </div>
            <div class="form-inline">
                <div class="input-group">
                    <label for="jenis">Jenis sekolah asal</label>
                    <div class="radio-inline double">
                        <?php foreach ($jenis as $jen) : ?>
                        <?php if ($jen == old('jenis') || $jen == "SD") : ?>
                        <div class="radio-group">
                            <input type="radio" name="jenis" value="<?= $jen; ?>" class="radio-input" checked>
                            <label><?= $jen; ?></label>
                        </div>
                        <?php else : ?>
                        <div class="radio-group">
                            <input type="radio" name="jenis" value="<?= $jen; ?>" class="radio-input">
                            <label><?= $jen; ?></label>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="input-group">
                    <label for="status">Status sekolah asal</label>
                    <div class="radio-inline double">
                        <?php foreach ($status as $stat) : ?>
                        <?php if ($stat == old('status') || $stat == "Negeri") : ?>
                        <div class="radio-group">
                            <input type="radio" name="status" value="<?= $stat; ?>" class="radio-input" checked>
                            <label><?= $stat; ?></label>
                        </div>
                        <?php else : ?>
                        <div class="radio-group">
                            <input type="radio" name="status" value="<?= $stat; ?>" class="radio-input">
                            <label><?= $stat; ?></label>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="input-group">
                <label for="kabupaten">Kabupaten sekolah asal</label>
                <input type="text" name="kabupaten" value="<?= old('kabupaten'); ?>"
                    class="text-input <?= ($validation->hasError('kabupaten')) ? "invalid" : ""; ?>" id="kabupaten">
                <div class="errors-message">
                    <?= $validation->getError('kabupaten'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="nomor">Nomor peserta ujian</label>
                <input type="text" name="nomor" value="<?= old('nomor'); ?>"
                    class="text-input <?= ($validation->hasError('nomor')) ? "invalid" : ""; ?>" id="nomor">
                <div class="errors-message">
                    <?= $validation->getError('nomor'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="pil2">Sekolah pilihan 2 <i>(Jika ada)</i></label>
                <input type="text" name="pil2" value="<?= old('pil2'); ?>"
                    class="text-input <?= ($validation->hasError('pil2')) ? "invalid" : ""; ?>" id="pil2">
                <div class="errors-message">
                    <?= $validation->getError('pil2'); ?>
                </div>
            </div>
            <br><br>
            <div class="input-group">
                <label for="alamat">Alamat siswa <i>(Kampung/Jl. RT. RW)</i></label>
                <input type="text" name="alamat" value="<?= old('alamat'); ?>"
                    class="text-input <?= ($validation->hasError('alamat')) ? "invalid" : ""; ?>" id="alamat">
                <div class="errors-message">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="prov">Provinsi</label>
                <input type="text" name="prov" value="<?= old('prov'); ?>"
                    class="text-input <?= ($validation->hasError('prov')) ? "invalid" : ""; ?>" id="prov">
                <div class="errors-message">
                    <?= $validation->getError('prov'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="kab">Kabupaten/Kota</label>
                <input type="text" name="kab" value="<?= old('kab'); ?>"
                    class="text-input <?= ($validation->hasError('kab')) ? "invalid" : ""; ?>" id="kab">
                <div class="errors-message">
                    <?= $validation->getError('kab'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="kec">Kecamatan</label>
                <input type="text" name="kec" value="<?= old('kec'); ?>"
                    class="text-input <?= ($validation->hasError('kec')) ? "invalid" : ""; ?>" id="kec">
                <div class="errors-message">
                    <?= $validation->getError('kec'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="des">Desa/Kelurahan</label>
                <input type="text" name="des" value="<?= old('des'); ?>"
                    class="text-input <?= ($validation->hasError('des')) ? "invalid" : ""; ?>" id="des">
                <div class="errors-message">
                    <?= $validation->getError('des'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="pos">Kode POS</label>
                <input type="text" name="pos" value="<?= old('pos'); ?>"
                    class="text-input <?= ($validation->hasError('pos')) ? "invalid" : ""; ?>" id="pos">
                <div class="errors-message">
                    <?= $validation->getError('pos'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <h4>Identitas Orang Tua/Wali</h4>
            <div class="input-group">
                <label for="wali">Nama wali</label>
                <input type="text" name="wali" value="<?= old('wali'); ?>"
                    class="text-input <?= ($validation->hasError('wali')) ? "invalid" : ""; ?>" id="wali">
                <div class="errors-message">
                    <?= $validation->getError('wali'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="alamatWali">Alamat wali</label>
                <input type="text" name="alamatWali" value="<?= old('alamatWali'); ?>"
                    class="text-input <?= ($validation->hasError('alamatWali')) ? "invalid" : ""; ?>" id="alamatWali">
                <div class="errors-message">
                    <?= $validation->getError('alamatWali'); ?>
                </div>
            </div>
            <div class="input-group">
                <div class="label">
                    <label for="noWali">No. HP wali <i>(Jika ada)</i></label>
                    <label for="noWali"><small>Ganti 0 pertama dengan 62</small></label>
                </div>
                <input type="number" name="noWali" value="<?= old('noWali'); ?>"
                    class="text-input <?= ($validation->hasError('noWali')) ? "invalid" : ""; ?>" id="noWali">
                <div class="errors-message">
                    <?= $validation->getError('noWali'); ?>
                </div>
                <small>62xxx xxxx xxxx</small>
            </div>
        </div>
        <div class="form-group">
            <h4>Identitas Guru / Yang Mendaftarkan</h4>
            <div class="input-group">
                <label for="namaGuru">Nama yang mendaftarkan</label>
                <input type="text" name="namaGuru" value="<?= old('namaGuru'); ?>"
                    class="text-input <?= ($validation->hasError('namaGuru')) ? "invalid" : ""; ?>" id="namaGuru">
                <div class="errors-message">
                    <?= $validation->getError('namaGuru'); ?>
                </div>
            </div>
            <div class="input-group">
                <label for="wa">Nomor WA yang mendaftarkan</label>
                <input type="text" name="wa" value="<?= old('wa'); ?>"
                    class="text-input <?= ($validation->hasError('wa')) ? "invalid" : ""; ?>" id="wa">
                <div class="errors-message">
                    <?= $validation->getError('wa'); ?>
                </div>
                <small>Ganti angka 0 pertama dengan 62</small>
            </div>
            <div class="input-group">
                <label for="email">Email yang mendaftarkan</label>
                <input type="text" name="email" value="<?= old('email'); ?>"
                    class="text-input <?= ($validation->hasError('email')) ? "invalid" : ""; ?>" id="email">
                <div class="errors-message">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="button" onclick="return confirm('Yakin data sudah benar?');"><img
                src="/icons/user-plus.svg" alt="user-plus" class="icon"> Daftarkan</button>
    </form>


</main>
<?= $this->endSection(); ?>