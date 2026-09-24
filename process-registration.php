<?php

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');
$course = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$interests = $_POST['interests'] ?? [];
$note = trim($_POST['note'] ?? '');
$source = $_POST['source'] ?? '';

$interestText = implode(', ', $interests);

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus - KursusKu</title>
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
        <h1>Pendaftaran Berhasil</h1>
        <p>Berikut data pendaftaran yang kamu kirim:</p>

        <p><strong>Nama:</strong> <?= e($name) ?></p>
        <p><strong>Email:</strong> <?= e($email) ?></p>
        <p><strong>Nomor HP:</strong> <?= e($phone) ?></p>
        <p><strong>Program Studi:</strong> <?= e($studyProgram) ?></p>
        <p><strong>Kursus:</strong> <?= e($course) ?></p>
        <p><strong>Jenis Peserta:</strong> <?= e($participantType) ?></p>
        <p><strong>Minat Belajar:</strong> <?= e($interestText) ?></p>
        <p><strong>Catatan:</strong> <?= e($note) ?></p>
        <p><strong>Sumber:</strong> <?= e($source) ?></p>
    </section>
</main>

</body>
</html>
