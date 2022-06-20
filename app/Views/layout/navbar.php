<nav>
    <div class="logo">
        <a href="<?= base_url('/'); ?>">
            <img src="/img/logo.svg" alt="Logo MTs Al-Hidayah Sagalaherang">
        </a>
    </div>
    <ul>
        <li><a href="/ppdb" class="nav-item <?= $ppdb; ?>">PPDB Center</a></li>
        <li><a href="/akademik" class="nav-item <?= $akademik; ?>">Akademik</a></li>
        <li><a href="/galeri" class="nav-item <?= $galeri; ?>">Galeri</a></li>
        <li><a href="/profil" class="nav-item <?= $about; ?>">Profil</a></li>
        <li><a href="/login" class="<?= $login; ?> login-nav">Login</a></li>
    </ul>
    <div class="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>