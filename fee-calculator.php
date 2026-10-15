
<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';

// =====================================
// DATA KURSUS
// =====================================

// Pilih kursus yang akan ditampilkan
$courseCode = 'LAR-01';

$selectedCourse = findCourse($courses, $courseCode);

// Jika kursus tidak ditemukan
if ($selectedCourse === null) {
    $selectedCourse = [
        'code' => '',
        'name' => 'Kursus tidak ditemukan',
        'fee' => 0,
    ];
}

// Data kursus
$courseName = $selectedCourse['name'];
$fee = $selectedCourse['fee'];

// =====================================
// DATA PERHITUNGAN
// =====================================

$participantCount = 1;
$discountPercent = 0;
$adminFee = 25000;
$isActive = true;

// Perhitungan subtotal
$subtotal = $fee * $participantCount;

// Perhitungan diskon
$discount = intdiv(
    $subtotal * $discountPercent,
    100
);

// Perhitungan total
$total = $subtotal - $discount + $adminFee;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Kalkulator Biaya - KursusKu
    </title>

    <style>

        /* =================================
           RESET
        ================================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    #14532d,
                    #16a34a,
                    #4ade80
                );

            color: #1f2937;

            padding-bottom: 40px;
        }


        /* =================================
           NAVBAR
        ================================= */

        header {

            background:
                rgba(255, 255, 255, 0.97);

            box-shadow:
                0 3px 15px
                rgba(0, 0, 0, 0.10);

            position: sticky;

            top: 0;

            z-index: 100;
        }


        nav {

            max-width: 1100px;

            margin: auto;

            min-height: 70px;

            padding:
                15px 25px;

            display: flex;

            align-items: center;

            gap: 28px;
        }


        nav a {

            text-decoration: none;

            color: #166534;

            font-weight: 600;

            transition:
                color 0.3s ease;
        }


        nav a:hover {

            color: #22c55e;
        }


        nav a:first-child {

            margin-right: auto;

            font-size: 22px;

            color: #15803d;
        }


        /* =================================
           CONTAINER
        ================================= */

        .container {

            width: 90%;

            max-width: 850px;

            margin:
                45px auto;
        }


        /* =================================
           CARD
        ================================= */

        .calculator-card {

            background: #ffffff;

            border-radius: 22px;

            padding: 40px;

            box-shadow:
                0 20px 50px
                rgba(0, 0, 0, 0.20);

            border-top:
                6px solid #16a34a;
        }


        /* =================================
           HEADER CARD
        ================================= */

        .calculator-header {

            text-align: center;

            margin-bottom: 30px;
        }


        .calculator-icon {

            width: 70px;

            height: 70px;

            margin:
                0 auto 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #dcfce7;

            color: #15803d;

            font-size: 32px;
        }


        .calculator-header h1 {

            color: #166534;

            font-size: 30px;

            margin-bottom: 10px;
        }


        .calculator-header p {

            color: #64748b;

            font-size: 15px;
        }


        /* =================================
           STATUS
        ================================= */

        .status {

            display: inline-block;

            margin-top: 15px;

            padding:
                7px 14px;

            border-radius: 20px;

            font-size: 13px;

            font-weight: bold;
        }


        .status-active {

            background: #dcfce7;

            color: #166534;

            border:
                1px solid #86efac;
        }


        .status-inactive {

            background: #fee2e2;

            color: #991b1b;

            border:
                1px solid #fecaca;
        }


        /* =================================
           TABLE
        ================================= */

        .table-wrapper {

            overflow-x: auto;

            border-radius: 14px;

            border:
                1px solid #bbf7d0;
        }


        table {

            width: 100%;

            border-collapse:
                collapse;

            min-width: 600px;
        }


        th {

            background:
                linear-gradient(
                    135deg,
                    #166534,
                    #16a34a
                );

            color: white;

            padding: 16px;

            text-align: left;

            font-size: 15px;
        }


        td {

            padding: 15px 16px;

            border-bottom:
                1px solid #dcfce7;

            background: #ffffff;
        }


        tbody tr:hover td {

            background:
                #f0fdf4;
        }


        td:first-child {

            color: #475569;

            font-weight: 600;

            width: 50%;
        }


        /* =================================
           TOTAL
        ================================= */

        .total-row td {

            background:
                #f0fdf4;

            color: #166534;

            font-size: 18px;

            border-top:
                2px solid #86efac;
        }


        .total-value {

            color: #15803d;

            font-size: 22px;
        }


        /* =================================
           COURSE
        ================================= */

        .course-name {

            color: #15803d;

            font-weight: bold;

            font-size: 17px;
        }


        /* =================================
           BUTTON
        ================================= */

        .button-wrapper {

            display: flex;

            justify-content: center;

            gap: 12px;

            margin-top: 30px;

            flex-wrap: wrap;
        }


        .button {

            display: inline-block;

            padding:
                12px 22px;

            border-radius: 10px;

            text-decoration: none;

            font-weight: bold;

            transition:
                0.3s ease;
        }


        .button-primary {

            background:
                linear-gradient(
                    135deg,
                    #15803d,
                    #22c55e
                );

            color: white;

            box-shadow:
                0 6px 15px
                rgba(22, 163, 74, 0.30);
        }


        .button-primary:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 20px
                rgba(22, 163, 74, 0.40);
        }


        .button-secondary {

            background: #f0fdf4;

            color: #166534;

            border:
                1px solid #bbf7d0;
        }


        .button-secondary:hover {

            background: #dcfce7;

            transform:
                translateY(-2px);
        }


        /* =================================
           FOOTER
        ================================= */

        .footer {

            text-align: center;

            color: white;

            font-size: 14px;

            margin-top: 25px;

            opacity: 0.9;
        }


        /* =================================
           RESPONSIVE
        ================================= */

        @media (max-width: 650px) {

            nav {

                flex-wrap: wrap;

                justify-content:
                    center;

                gap: 15px;
            }


            nav a:first-child {

                width: 100%;

                text-align: center;

                margin-right: 0;
            }


            .container {

                width: 94%;

                margin-top: 30px;
            }


            .calculator-card {

                padding: 25px 18px;

                border-radius: 17px;
            }


            .calculator-header h1 {

                font-size: 25px;
            }


            .button {

                width: 100%;

                text-align: center;
            }

        }

    </style>

</head>


<body>


<!-- =================================
     NAVBAR
================================= -->

<header>

    <nav>

        <a href="index.php">

            🌿 <strong>KursusKu</strong>

        </a>


        <a href="index.php#katalog">

            Katalog

        </a>


        <a href="register.php">

            Daftar Kursus

        </a>

    </nav>

</header>


<!-- =================================
     CALCULATOR
================================= -->

<main>

    <div class="container">

        <section class="calculator-card">


            <!-- HEADER -->

            <div class="calculator-header">

                <div class="calculator-icon">

                    🧮

                </div>


                <h1>
                    Kalkulator Biaya Kursus
                </h1>


                <p>
                    Lihat rincian biaya kursus
                    yang harus dibayarkan.
                </p>


                <?php if ($isActive): ?>

                    <span
                        class="status status-active"
                    >
                        ● Kursus Aktif
                    </span>

                <?php else: ?>

                    <span
                        class="status status-inactive"
                    >
                        ● Kursus Tidak Aktif
                    </span>

                <?php endif; ?>

            </div>


            <!-- TABLE -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Keterangan
                            </th>

                            <th>
                                Nilai
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <!-- Nama Kursus -->

                        <tr>

                            <td>
                                Nama Kursus
                            </td>

                            <td>

                                <span
                                    class="course-name"
                                >
                                    <?= e($courseName) ?>
                                </span>

                            </td>

                        </tr>


                        <!-- Biaya -->

                        <tr>

                            <td>
                                Biaya Per Peserta
                            </td>

                            <td>
                                <?= formatRupiah($fee) ?>
                            </td>

                        </tr>


                        <!-- Jumlah -->

                        <tr>

                            <td>
                                Jumlah Peserta
                            </td>

                            <td>
                                <?= $participantCount ?>
                                peserta
                            </td>

                        </tr>


                        <!-- Diskon -->

                        <tr>

                            <td>
                                Diskon
                            </td>

                            <td>
                                <?= $discountPercent ?>%
                            </td>

                        </tr>


                        <!-- Subtotal -->

                        <tr>

                            <td>
                                Subtotal
                            </td>

                            <td>
                                <?= formatRupiah($subtotal) ?>
                            </td>

                        </tr>


                        <!-- Potongan -->

                        <tr>

                            <td>
                                Potongan Diskon
                            </td>

                            <td>
                                <?= formatRupiah($discount) ?>
                            </td>

                        </tr>


                        <!-- Admin -->

                        <tr>

                            <td>
                                Biaya Admin
                            </td>

                            <td>
                                <?= formatRupiah($adminFee) ?>
                            </td>

                        </tr>


                        <!-- TOTAL -->

                        <tr class="total-row">

                            <td>

                                <strong>
                                    Total Pembayaran
                                </strong>

                            </td>

                            <td>

                                <strong
                                    class="total-value"
                                >

                                    <?= formatRupiah($total) ?>

                                </strong>

                            </td>

                        </tr>


                    </tbody>

                </table>

            </div>


            <!-- BUTTON -->

            <div class="button-wrapper">

                <a
                    href="register.php"
                    class="button button-primary"
                >
                    ✨ Daftar Kursus
                </a>


                <a
                    href="index.php"
                    class="button button-secondary"
                >
                    ← Kembali ke Beranda
                </a>

            </div>


        </section>


        <p class="footer">

            © <?= date('Y') ?> KursusKu.
            Pemrograman Web III.

        </p>

    </div>

</main>


</body>

</html>