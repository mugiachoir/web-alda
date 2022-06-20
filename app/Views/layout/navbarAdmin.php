<nav>
    <div class="logo">
        <a href="<?= base_url('/'); ?>">
            <img src="/img/logo.svg" alt="Logo MTs Al-Hidayah Sagalaherang">
        </a>
    </div>
    <ul>
        <li><a href="/admin/users" class="<?= $user; ?> nav-item">Users</a></li>
        <li><a href="/admin/ppdb" class="<?= $pendaftar; ?> nav-item">PPDB</a></li>
        <li><a href="/admin/news"" class=" <?= $news; ?> nav-item">News</a></li>
        <li><a href="/admin/pengumuman" class="<?= $pengumuman; ?> nav-item">Pengumuman</a></li>
        <li><a href="/admin/galeri" class="<?= $galeri; ?> nav-item">Galeri</a></li>
        <li><a href="/login/logout" class="login-nav">Logout</a></li>
    </ul>
    <div class="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>