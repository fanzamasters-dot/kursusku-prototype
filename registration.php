<?php
require_once __DIR__ . '/helpers.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <nav aria-label="Navigasi utama">
        <a href="index.php"><strong>KursusKu</strong></a>
        <a href="index.php#katalog">Katalog</a>
        <a href="registration.php">Daftar Kursus</a>

    </nav>
</header>

<main>
    <section class="form-card">
        <h1>Daftar Kursus</h1>
        <p>Silakan isi formulir pendaftaran kursus berikut.</p>

        <form action="process-registration.php" method="POSt">

        <input type="hidden" name="source" value="week-05">

<div class="form-group">
    <label for="name">Nama Lengkap</label>
    <input
        type="text"
        id="name"
        name="name"
        required
        minlength="3"
        maxlength="100"
    >
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input
        type="email"
        id="email"
        name="email"
        required
    >
</div>

<div class="form-group">
    <label for="phone">Nomor HP</label>
    <input
        type="tel"
        id="phone"
        name="phone"
        required
        pattern="[0-9+\-\s]{10,20}"
    >
</div>

<div class="form-group">
    <label for="phone">Nomor HP</label>
    <input
        type="tel"
        id="phone"
        name="phone"
        required
        pattern="[0-9+\-\s]{10,20}"
    >
</div>

<div class="form-group">
    <label for="course">Pilih Kursus</label>
    <select id="course" name="course" required>
        <option value="">-- Pilih Kursus --</option>
        <option value="WEB-01">Web Dasar</option>
        <option value="PHP-01">PHP Dasar</option>
        <option value="PHP-02">PHP Lanjutan</option>
        <option value="LAR-01">Laravel Fundamental</option>
    </select>
</div>

<div class="form-group">
    <span>Jenis Peserta</span>

    <label>
        <input
            type="radio"
            name="participant_type"
            value="Mahasiswa"
            required
        >
        Mahasiswa
    </label>

    <label>
        <input
            type="radio"
            name="participant_type"
            value="Umum"
        >
        Umum
    </label>
</div>
<div class="form-group">
    <span>Jenis Peserta</span>

    <label>
        <input
            type="radio"
            name="participant_type"
            value="Mahasiswa"
            required
        >
        Mahasiswa
    </label>

    <label>
        <input
            type="radio"
            name="participant_type"
            value="Umum"
        >
        Umum
    </label>
</div>

<div class="form-group">
    <label for="note">Catatan</label>
    <textarea
        id="note"
        name="note"
        maxlength="500"
    ></textarea>
</div>
<div class="form-group">
    <button type="submit">Daftar Kursus</button>
</div>
</form>
    </section>
</main>

</body>
</html>