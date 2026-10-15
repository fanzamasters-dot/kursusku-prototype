
<?php

require_once __DIR__ . '/helpers.php';

// Data kursus mengikuti index.php
$courses = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
        'quota' => 30,
        'registered' => 12,
        'start_date' => '2026-09-21',
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
        'quota' => 30,
        'registered' => 18,
        'start_date' => '2026-09-22',
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
        'quota' => 25,
        'registered' => 24,
        'start_date' => '2026-09-24',
    ],
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
        'quota' => 25,
        'registered' => 25,
        'start_date' => '2026-09-28',
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
        'quota' => 20,
        'registered' => 0,
        'start_date' => '2026-10-01',
    ],
    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
        'quota' => 35,
        'registered' => 9,
        'start_date' => '2026-10-03',
    ],
];

$siteName = 'KursusKu';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Loop Lab - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f0fdf4;
            color: #1f2937;
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        header {
            background: linear-gradient(135deg, #14532d, #16a34a);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        header h1 {
            margin-top: 0;
        }

        .card {
            background: white;
            padding: 22px;
            margin-bottom: 22px;
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
            overflow-x: auto;
        }

        h2 {
            color: #166534;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dcfce7;
        }

        th {
            background: #166534;
            color: white;
        }

        tr:hover {
            background: #f0fdf4;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .available {
            color: #166534;
            background: #dcfce7;
        }

        .full {
            color: #b91c1c;
            background: #fee2e2;
        }

        .back-button {
            display: inline-block;
            padding: 11px 18px;
            background: #16a34a;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .back-button:hover {
            background: #15803d;
        }

        code {
            background: #f3f4f6;
            padding: 3px 6px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

<div class="container">

    <header>
        <h1>🌿 <?= htmlspecialchars($siteName) ?> — Loop Lab</h1>
        <p>Praktikum PHP: mengenal perulangan dan menampilkan data kursus.</p>
    </header>

    <!-- 1. PERULANGAN FOR -->
    <section class="card">
        <h2>1. Perulangan for</h2>
        <p>Digunakan ketika jumlah pengulangan sudah diketahui.</p>

        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "Paket kursus ke-" . $i . "<br>";
        }
        ?>
    </section>

    <!-- 2. PERULANGAN WHILE -->
    <section class="card">
        <h2>2. Perulangan while</h2>
        <p>Pengulangan berjalan selama kondisi bernilai benar.</p>

        <?php
        $nomor = 1;

        while ($nomor <= 5) {
            echo "Peserta ke-" . $nomor . "<br>";
            $nomor++;
        }
        ?>
    </section>

    <!-- 3. PERULANGAN DO-WHILE -->
    <section class="card">
        <h2>3. Perulangan do-while</h2>
        <p>Perintah dijalankan minimal satu kali sebelum kondisi diperiksa.</p>

        <?php
        $angka = 1;

        do {
            echo "Materi ke-" . $angka . "<br>";
            $angka++;
        } while ($angka <= 5);
        ?>
    </section>

    <!-- 4. PERULANGAN FOREACH -->
    <section class="card">
        <h2>4. Perulangan foreach — Katalog Kursus</h2>
        <p>
            <code>foreach</code> digunakan untuk membaca setiap data
            kursus di dalam array secara otomatis.
        </p>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Nama Kursus</th>
                    <th>Biaya</th>
                    <th>Sisa Kursi</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($courses as $index => $course): ?>

                    <?php
                    $status = statusKursus(
                        $course['quota'],
                        $course['registered']
                    );

                    $sisa = sisaKursi(
                        $course['quota'],
                        $course['registered']
                    );

                    $class = $status === 'Penuh'
                        ? 'badge full'
                        : 'badge available';
                    ?>

                    <tr>
                        <td><?= $index + 1 ?></td>

                        <td>
                            <?= htmlspecialchars($course['code']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($course['name']) ?>
                        </td>

                        <td>
                            <?= rupiah($course['fee']) ?>
                        </td>

                        <td><?= $sisa ?></td>

                        <td>
                            <span class="<?= $class ?>">
                                <?= htmlspecialchars($status) ?>
                            </span>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- 5. PERULANGAN DENGAN KONDISI -->
    <section class="card">
        <h2>5. Menampilkan Kursus yang Masih Tersedia</h2>
        <p>Contoh penggunaan <code>foreach</code> bersama <code>if</code>.</p>

        <ul>
            <?php foreach ($courses as $course): ?>

                <?php
                $status = statusKursus(
                    $course['quota'],
                    $course['registered']
                );
                ?>

                <?php if ($status === 'Tersedia'): ?>
                    <li>
                        <?= htmlspecialchars($course['name']) ?>
                        — <?= rupiah($course['fee']) ?>
                    </li>
                <?php endif; ?>

            <?php endforeach; ?>
        </ul>
    </section>

    <p>
        <a href="index.php" class="back-button">
            ← Kembali ke Beranda
        </a>
    </p>

</div>

</body>
</html>
