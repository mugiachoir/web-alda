<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?= $this->include('layout/navbarAdmin'); ?>
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

    <script src="/js/tinymce/js//tinymce/tinymce.min.js"></script>
    <script src="/js/scriptAdmin.js"></script>
</body>

</html>