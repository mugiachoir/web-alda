<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/css/glide.core.min.css">
    <link rel="stylesheet" href="/css/glide.theme.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/lightbox.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?= $this->include('layout/navbar'); ?>
    <!-- AKHIR HEADER -->

    <!-- KONTEN UTAMA -->
    <?= $this->renderSection('content'); ?>
    <!-- AKHIR KONTEN UTAMA -->

    <!-- FOOTER -->
    <footer>
        <a href="https://www.facebook.com/MTs.Alda"><img class="icon" src="/icons/fb.svg" alt="facebook"></a>
        <p class="subtitle">&copy;Copyright 2020: <a href="<?= base_url('/'); ?>">mtsalda.com</a><br>All Rights Reserved
        </p>
    </footer>
    <script src="/js/scroll-out.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>