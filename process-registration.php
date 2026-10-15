<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';

$courses = $courses ?? [];

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');
$course = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$interests = $_POST['additional_interest'] ?? [];
$note = trim($_POST['note'] ?? '');
$learningMode = $_POST['learning_mode'] ?? '';
$packageCount = (int) ($_POST['package_count'] ?? 1);
$source = $_POST['source'] ?? '';

if (!is_array($interests)) {
    $interests = [$interests];
}

$selectedCourse = findCourse($courses, $course);

$courseName = $selectedCourse['name'] ?? 'Kursus tidak diketahui';
$coursePrice = $selectedCourse['fee'] ?? 0;

$subtotal = $coursePrice * $packageCount;

$discountPercent = getDiscountPercent($participantType);

$discount = $subtotal * $discountPercent / 100;

$total = $subtotal - $discount;

?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Pendaftaran - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(
                135deg,
                #166534,
                #22c55e
            );
            min-height: 100vh;
            color: #1f2937;
        }

        .container {
            width: 100%;
            max-width: 850px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* =========================
           HEADER
        ========================= */

        .result-header {
            text-align: center;
            color: white;
            margin-bottom: 25px;
        }

        .success-icon {
            width: 75px;
            height: 75px;
            margin: 0 auto 20px;
            background: #ffffff;
            color: #16a34a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: bold;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .result-header h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .result-header p {
            font-size: 16px;
            opacity: 0.95;
        }

        /* =========================
           CARD
        ========================= */

        .summary-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 35px;
            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 22px;
            color: #15803d;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #dcfce7;
        }

        /* =========================
           DATA
        ========================= */

        .summary-list {
            display: grid;
            grid-template-columns: 190px 1fr;
            border: 1px solid #bbf7d0;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .summary-list dt,
        .summary-list dd {
            padding: 16px 18px;
            border-bottom: 1px solid #dcfce7;
        }

        .summary-list dt {
            background: #f0fdf4;
            font-weight: bold;
            color: #166534;
        }

        .summary-list dd {
            background: #ffffff;
            color: #374151;
            word-break: break-word;
        }

        /* =========================
           BADGE MINAT
        ========================= */

        .interest-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .interest-badge {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            border: 1px solid #bbf7d0;
        }

        /* =========================
           CATATAN
        ========================= */

        .note-box {
            background: #f0fdf4;
            padding: 15px;
            border-left: 4px solid #22c55e;
            border-radius: 8px;
            min-height: 50px;
            white-space: pre-wrap;
        }

        /* =========================
           BUTTON
        ========================= */

        .button-wrapper {
            text-align: center;
        }

        .btn-link {
            display: inline-block;
            text-decoration: none;
            background: #16a34a;
            color: #ffffff;
            padding: 13px 28px;
            border-radius: 10px;
            font-weight: bold;
            transition:
                background 0.3s ease,
                transform 0.3s ease,
                box-shadow 0.3s ease;
            box-shadow:
                0 5px 15px rgba(22, 163, 74, 0.3);
        }

        .btn-link:hover {
            background: #15803d;
            transform: translateY(-2px);
            box-shadow:
                0 8px 20px rgba(22, 163, 74, 0.4);
        }

        /* =========================
           FOOTER
        ========================= */

        .footer-text {
            text-align: center;
            color: white;
            margin-top: 20px;
            font-size: 14px;
            opacity: 0.9;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 600px) {
            .container {
                padding: 25px 15px;
            }

            .result-header h1 {
                font-size: 24px;
            }

            .result-header p {
                font-size: 14px;
            }

            .summary-card {
                padding: 20px;
                border-radius: 15px;
            }

            .card-title {
                font-size: 19px;
            }

            .summary-list {
                display: block;
            }

            .summary-list dt {
                padding-bottom: 7px;
                border-bottom: none;
            }

            .summary-list dd {
                padding-top: 5px;
            }
        }
    </style>
</head>

<body>

    <main class="container">

        <!-- Header -->
        <section class="result-header">

            <div class="success-icon">
                ✓
            </div>

            <h1>Pendaftaran Berhasil!</h1>

            <p>
                Data pendaftaran Anda berhasil diterima untuk diproses.
            </p>

        </section>

        <!-- Ringkasan -->
        <section class="summary-card">

            <h2 class="card-title">
                📋 Ringkasan Data Pendaftaran
            </h2>

            <dl class="summary-list">

                <dt>Nama Lengkap</dt>
                <dd><?= e($name) ?></dd>

                <dt>Email</dt>
                <dd><?= e($email) ?></dd>

                <dt>Nomor HP</dt>
                <dd><?= e($phone) ?></dd>

                <dt>Program Studi</dt>
                <dd><?= e($studyProgram) ?></dd>

                <dt>Kursus</dt>
                <dd><?= e($courseName) ?></dd>

                <dt>Harga per Paket</dt>
                <dd>
                    <?= formatRupiah($coursePrice) ?>
                </dd>

                <dt>Subtotal</dt>
                <dd>
                    <?= formatRupiah($subtotal) ?>
                </dd>

                <dt>Diskon</dt>
                <dd>
                    <?= e($discountPercent) ?>%
                    (<?= formatRupiah($discount) ?>)
                </dd>

                <dt>Total Pembayaran</dt>
                <dd>
                    <strong>
                        <?= formatRupiah($total) ?>
                    </strong>
                </dd>

                <dt>Jenis Peserta</dt>
                <dd><?= e($participantType) ?></dd>

                <dt>Metode Belajar</dt>
                <dd><?= e(getLearningModeLabel($learningMode)) ?></dd>

                <dt>Jumlah Paket</dt>
                <dd><?= e($packageCount) ?> Paket</dd>

                <dt>Minat Tambahan</dt>
                <dd>

                    <?php if (!empty($interests)): ?>

                        <div class="interest-list">

                            <?php foreach ($interests as $interest): ?>

                                <span class="interest-badge">
                                    <?= e($interest) ?>
                                </span>

                            <?php endforeach; ?>

                        </div>

                    <?php else: ?>

                        Tidak ada

                    <?php endif; ?>

                </dd>

                <dt>Catatan</dt>

                <dd>

                    <div class="note-box">
                        <?= e($note ?: 'Tidak ada catatan') ?>
                    </div>

                </dd>

                <dt>Sumber</dt>
                <dd><?= e($source) ?></dd>

            </dl>

            <!-- Tombol -->
            <div class="button-wrapper">

                <a
                    class="btn-link"
                    href="registration.php"
                >
                    ← Kembali ke Form
                </a>

            </div>

        </section>

        <p class="footer-text">
            © <?= date('Y') ?> KursusKu. Terima kasih telah mendaftar.
        </p>

    </main>

</body>

</html>