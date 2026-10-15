<?php
require __DIR__ . '/helpers.php';

$history = [
    [
        'name' => 'Fanza',
        'course' => 'Web Dasar',
        'total' => 240000,
    ],
    [
        'name' => 'udin',
        'course' => 'PHP Dasar',
        'total' => 340000,
    ],
    [
        'name' => 'Luna',
        'course' => 'Laravel Dasar',
        'total' => 500000,
    ],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>History KursusKu</title>

    <style>
        /* RESET */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f0fdf4;
            color: #1f2937;
            line-height: 1.6;
            padding: 30px 20px;
        }

        /* CONTAINER */
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        /* HEADER */
        .header {
            background: linear-gradient(135deg, #14532d, #16a34a);
            color: white;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(20, 83, 45, 0.15);
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #dcfce7;
        }

        /* KARTU TABEL */
        .history-card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .card-title {
            color: #166534;
            font-size: 21px;
            margin-bottom: 20px;
        }

        /* TABEL RESPONSIF */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 550px;
        }

        thead {
            background: #166534;
            color: white;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dcfce7;
        }

        th {
            font-size: 14px;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background: #f0fdf4;
        }

        tbody tr:hover {
            background: #dcfce7;
            transition: background 0.2s ease;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        td:first-child,
        th:first-child {
            text-align: center;
            width: 65px;
        }

        .course-name {
            font-weight: bold;
            color: #166534;
        }

        .total-price {
            font-weight: bold;
            color: #15803d;
            white-space: nowrap;
        }

        /* TOMBOL KEMBALI */
        .actions {
            margin-top: 25px;
        }

        .back-button {
            display: inline-block;
            background: #16a34a;
            color: white;
            padding: 12px 20px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .back-button:hover {
            background: #15803d;
            transform: translateY(-2px);
        }

        /* FOOTER */
        .footer {
            text-align: center;
            margin-top: 25px;
            color: #64748b;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            body {
                padding: 18px 12px;
            }

            .header {
                padding: 22px;
            }

            .header h1 {
                font-size: 23px;
            }

            .history-card {
                padding: 16px;
            }

            th,
            td {
                padding: 12px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <header class="header">
        <h1>🌿 KursusKu</h1>
        <p>Riwayat Pendaftaran Kursus</p>
    </header>

    <main class="history-card">

        <h2 class="card-title">📋 Data Riwayat Pendaftaran</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kursus</th>
                        <th>Total Biaya</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($history as $index => $item): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>

                            <td>
                                <?= e($item['name']) ?>
                            </td>

                            <td class="course-name">
                                <?= e($item['course']) ?>
                            </td>

                            <td class="total-price">
                                <?= formatRupiah($item['total']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="actions">
            <a href="index.php" class="back-button">
                ← Kembali ke Beranda
            </a>
        </div>

    </main>

    <footer class="footer">
        &copy; <?= date('Y') ?> KursusKu — Pemrograman Web III
    </footer>

</div>

</body>
</html>
