<?php

require_once __DIR__ . '/helpers.php';

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
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat';
$year = date('Y');

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
        <?= htmlspecialchars($siteName) ?> - Belajar Teknologi
    </title>

    <style>

        /* =====================================
           RESET
        ===================================== */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #1f2937;
            background: #f8faf9;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: 90%;
            max-width: 1150px;
            margin: auto;
        }


        /* =====================================
           NAVBAR
        ===================================== */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;

            background: rgba(255, 255, 255, 0.96);

            box-shadow:
                0 3px 15px rgba(0, 0, 0, 0.08);

            backdrop-filter: blur(10px);
        }

        .nav-container {
            min-height: 72px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            color: #166534;
        }

        .logo span {
            color: #22c55e;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 25px;
            list-style: none;
        }

        .nav-menu a {
            color: #374151;
            font-weight: 600;

            transition: color 0.3s ease;
        }

        .nav-menu a:hover {
            color: #16a34a;
        }

        .nav-button {
            background: #16a34a;
            color: white !important;

            padding: 10px 18px;
            border-radius: 9px;
        }

        .nav-button:hover {
            background: #15803d;
        }


        /* =====================================
           HERO
        ===================================== */

        .hero {
            background:
                linear-gradient(
                    135deg,
                    #14532d 0%,
                    #16a34a 55%,
                    #4ade80 100%
                );

            color: white;
            padding: 80px 0;

            overflow: hidden;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 50px;
        }

        .hero-text h1 {
            font-size: 48px;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero-text h1 span {
            color: #bbf7d0;
        }

        .hero-text p {
            font-size: 18px;
            color: #ecfdf5;
            margin-bottom: 30px;
            max-width: 600px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .button {
            display: inline-block;

            padding: 13px 21px;

            border-radius: 10px;

            font-weight: bold;

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .button-primary {
            background: white;
            color: #15803d;

            box-shadow:
                0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .button-secondary {
            background: rgba(255, 255, 255, 0.12);
            color: white;

            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .button:hover {
            transform: translateY(-3px);
        }

        .hero-image-wrapper {
            text-align: center;
        }

        .hero-image {
            width: 100%;
            max-width: 470px;

            border-radius: 25px;

            box-shadow:
                0 20px 45px rgba(0, 0, 0, 0.25);

            border: 5px solid rgba(255, 255, 255, 0.3);
        }


        /* =====================================
           SECTION
        ===================================== */

        .section {
            padding: 75px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-title h2 {
            font-size: 32px;
            color: #166534;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #64748b;
        }

        .section-light {
            background: #f0fdf4;
        }


        /* =====================================
           KEUNGGULAN
        ===================================== */

        .feature-grid {
            display: grid;
            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;
        }

        .feature-card {
            background: white;

            padding: 30px;

            border-radius: 16px;

            border: 1px solid #dcfce7;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.06);

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-7px);

            box-shadow:
                0 15px 35px rgba(22, 163, 74, 0.15);
        }

        .feature-icon {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #dcfce7;
            color: #15803d;

            border-radius: 14px;

            font-size: 25px;

            margin-bottom: 20px;
        }

        .feature-card h3 {
            color: #166534;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: #64748b;
        }


        /* =====================================
           KATALOG
        ===================================== */

        .catalog-wrapper {
            overflow-x: auto;

            background: white;

            border-radius: 16px;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.06);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #166534;
            color: white;

            padding: 16px;

            text-align: left;
        }

        td {
            padding: 15px 16px;

            border-bottom: 1px solid #dcfce7;
        }

        tbody tr:hover {
            background: #f0fdf4;
        }

        .badge {
            display: inline-block;

            padding: 6px 12px;

            border-radius: 20px;

            font-size: 13px;
            font-weight: bold;
        }

        .badge-available {
            background: #dcfce7;
            color: #166534;
        }

        .badge-full {
            background: #fee2e2;
            color: #b91c1c;
        }


        /* =====================================
           ALUR
        ===================================== */

        .steps {
            display: grid;
            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;

            list-style: none;
        }

        .step {
            background: white;

            padding: 30px;

            border-radius: 16px;

            border: 1px solid #dcfce7;

            text-align: center;
        }

        .step-number {
            width: 50px;
            height: 50px;

            margin: 0 auto 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #16a34a;
            color: white;

            border-radius: 50%;

            font-size: 20px;
            font-weight: bold;
        }

        .step h3 {
            color: #166534;
            margin-bottom: 8px;
        }

        .step p {
            color: #64748b;
        }


        /* =====================================
           TENTANG
        ===================================== */

        .about-box {
            background: white;

            max-width: 850px;
            margin: auto;

            padding: 40px;

            border-radius: 18px;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.06);

            text-align: center;
        }

        .about-box h2 {
            color: #166534;
            margin-bottom: 20px;
        }

        .about-box p {
            color: #64748b;
            margin-bottom: 15px;
        }

        .laravel-link {
            display: inline-block;

            margin-top: 15px;

            background: #16a34a;
            color: white;

            padding: 11px 20px;

            border-radius: 9px;

            font-weight: bold;
        }

        .laravel-link:hover {
            background: #15803d;
        }


        /* =====================================
           MEDIA
        ===================================== */

        .media-grid {
            display: grid;
            grid-template-columns:
                1fr 1fr;

            gap: 30px;
            align-items: center;
        }

        .media-image {
            width: 100%;
            max-width: 500px;

            border-radius: 18px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .video-wrapper {
            position: relative;

            width: 100%;

            padding-bottom: 56.25%;

            overflow: hidden;

            border-radius: 18px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .video-wrapper iframe {
            position: absolute;

            width: 100%;
            height: 100%;

            left: 0;
            top: 0;

            border: none;
        }


        /* =====================================
           KONTAK
        ===================================== */

        .contact-box {
            text-align: center;
        }

        .contact-box h2 {
            color: #166534;
            margin-bottom: 15px;
        }

        .contact-box p {
            color: #64748b;
        }


        /* =====================================
           FOOTER
        ===================================== */

        .footer {
            background: #14532d;
            color: #dcfce7;

            padding: 25px 0;

            text-align: center;
        }

        .footer p {
            font-size: 14px;
        }


        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 850px) {

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-image-wrapper {
                order: -1;
            }

            .feature-grid,
            .steps {
                grid-template-columns: 1fr;
            }

            .media-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 650px) {

            .nav-container {
                flex-direction: column;
                padding: 15px 0;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .hero {
                padding: 55px 0;
            }

            .hero-text h1 {
                font-size: 34px;
            }

            .section {
                padding: 55px 0;
            }

            .section-title h2 {
                font-size: 27px;
            }

            .about-box {
                padding: 25px;
            }

        }

    </style>

</head>


<body>


<!-- =====================================
     NAVBAR
===================================== -->

<header class="navbar">

    <div class="container nav-container">

        <a
            href="index.php"
            class="logo"
        >
            🌿 Kursus<span>Ku</span>
        </a>


        <ul class="nav-menu">

            <li>
                <a href="#hero">
                    Beranda
                </a>
            </li>

            <li>
                <a href="#keunggulan">
                    Keunggulan
                </a>
            </li>

            <li>
                <a href="#katalog">
                    Katalog
                </a>
            </li>


            <li>
                <a
                    href="registration.php"
                    class="nav-button"
                >
                    Daftar Kursus
                </a>
            </li>
        <a href="history.php">History</a>
        <a href="loop-lab.php">Loop Lab</a>
         <li>
                <a href="#tentang">
                    Tentang
                </a>
            </li>
        </ul>

    </div>

</header>


<!-- =====================================
     HERO
===================================== -->

<main>

<section
    id="hero"
    class="hero"
>

    <div class="container">

        <div class="hero-content">


            <div class="hero-text">

                <h1>

                    Tingkatkan Skill
                    <span>Teknologi</span>
                    Anda

                </h1>


                <p>

                    <?= htmlspecialchars($tagline) ?>.
                    Pelajari pemrograman web dari dasar
                    hingga membangun aplikasi nyata.

                </p>


                <div class="hero-buttons">

                    <a
                        href="#katalog"
                        class="button button-primary"
                    >
                        📚 Lihat Katalog
                    </a>


                    <a
                        href="registration.php"
                        class="button button-secondary"
                    >
                        ✨ Daftar Sekarang
                    </a>


                    <a
                        href="fee-calculator.php"
                        class="button button-secondary"
                    >
                        🧮 Kalkulator Biaya
                    </a>

                </div>

            </div>


            <div class="hero-image-wrapper">

                <img
                    src="assets/image/logo.png"
                    alt="Mahasiswa sedang belajar pemrograman web"
                    class="hero-image"
                >

            </div>

        </div>

    </div>

</section>


<!-- =====================================
     KEUNGGULAN
===================================== -->

<section
    id="keunggulan"
    class="section"
>

    <div class="container">

        <div class="section-title">

            <h2>
                Kenapa Belajar di KursusKu?
            </h2>

            <p>
                Belajar lebih terarah dengan materi
                yang mudah dipahami.
            </p>

        </div>


        <div class="feature-grid">


            <article class="feature-card">

                <div class="feature-icon">
                    📚
                </div>

                <h3>
                    Materi Terarah
                </h3>

                <p>
                    Materi disusun secara bertahap
                    dari dasar hingga praktik sehingga
                    mudah diikuti.
                </p>

            </article>


            <article class="feature-card">

                <div class="feature-icon">
                    💻
                </div>

                <h3>
                    Belajar dengan Proyek
                </h3>

                <p>
                    Setiap tahap menghasilkan bagian
                    nyata dari aplikasi yang dapat
                    digunakan sebagai latihan.
                </p>

            </article>


            <article class="feature-card">

                <div class="feature-icon">
                    👨‍💻
                </div>

                <h3>
                    Pendamping Praktik
                </h3>

                <p>
                    Belajar melalui demonstrasi,
                    latihan, dan evaluasi untuk
                    meningkatkan kemampuan.
                </p>

            </article>


        </div>

    </div>

</section>


<!-- =====================================
     KATALOG
===================================== -->

<section
    id="katalog"
    class="section section-light"
>

    <div class="container">

        <div class="section-title">

            <h2>
                📚 Katalog Kursus
            </h2>

            <p>
                Pilih kursus yang sesuai dengan
                kebutuhan belajar Anda.
            </p>

        </div>


        <div class="catalog-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>Kode</th>
                        <th>Nama Kursus</th>
                        <th>Biaya</th>
                        <th>Mulai</th>
                        <th>Sisa Kursi</th>
                        <th>Status</th>

                    </tr>

                </thead>


                <tbody>

                <?php foreach ($courses as $course): ?>

                    <?php

                    $status = statusKursus(
                        $course['quota'],
                        $course['registered']
                    );

                    $class =
                        $status === 'Penuh'
                        ? 'badge badge-full'
                        : 'badge badge-available';

                    ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($course['code']) ?>
                        </td>

                        <td>
                            <strong>
                                <?= htmlspecialchars($course['name']) ?>
                            </strong>
                        </td>

                        <td>
                            <?= rupiah($course['fee']) ?>
                        </td>

                        <td>
                            <?= formatTanggal($course['start_date']) ?>
                        </td>

                        <td>
                            <?= sisaKursi(
                                $course['quota'],
                                $course['registered']
                            ) ?>
                        </td>

                        <td>

                            <span class="<?= $class ?>">
                                <?= htmlspecialchars($status) ?>
                            </span>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</section>


<!-- =====================================
     CARA MENDAFTAR
===================================== -->

<section
    id="alur"
    class="section"
>

    <div class="container">

        <div class="section-title">

            <h2>
                📝 Cara Mendaftar
            </h2>

            <p>
                Hanya dengan tiga langkah sederhana.
            </p>

        </div>


        <ol class="steps">


            <li class="step">

                <div class="step-number">
                    1
                </div>

                <h3>
                    Pilih Kursus
                </h3>

                <p>
                    Pilih kursus yang sesuai dengan
                    minat dan kebutuhan Anda.
                </p>

            </li>


            <li class="step">

                <div class="step-number">
                    2
                </div>

                <h3>
                    Isi Data
                </h3>

                <p>
                    Isi formulir pendaftaran dengan
                    data yang lengkap dan benar.
                </p>

            </li>


            <li class="step">

                <div class="step-number">
                    3
                </div>

                <h3>
                    Kirim Pendaftaran
                </h3>

                <p>
                    Kirim formulir dan tunggu
                    informasi selanjutnya.
                </p>

            </li>


        </ol>

    </div>

</section>


<!-- =====================================
     TENTANG
===================================== -->

<section
    id="tentang"
    class="section section-light"
>

    <div class="container">

        <div class="about-box">

            <h2>
                🌿 Tentang KursusKu
            </h2>

            <p>
                KursusKu merupakan prototype website
                pembelajaran yang dikembangkan dalam
                mata kuliah Pemrograman Web III.
            </p>

            <p>
                Pada semester ini mahasiswa akan belajar
                PHP, MySQL, dan framework Laravel.
            </p>

            <a
                href="https://laravel.com"
                target="_blank"
                rel="noopener"
                class="laravel-link"
            >
                Pelajari Laravel →
            </a>

        </div>

    </div>

</section>


<!-- =====================================
     MEDIA
===================================== -->

<section
    id="media"
    class="section"
>

    <div class="container">

        <div class="section-title">

            <h2>
                🎓 Kenali Program Kami
            </h2>

            <p>
                Kenali lebih jauh dunia pengembangan
                aplikasi web.
            </p>

        </div>


        <div class="media-grid">


            <div>

                <img
                    src="assets/image/logo.png"
                    alt="Logo KursusKu"
                    class="media-image"
                >

            </div>


            <div>

                <div class="video-wrapper">

                  <video
                    controls
                    width="640"
                  >
                 <source
                   src="assets/video/video-kursus.mp4"
                   type="video/mp4"
                  >
                   </video>
                </div>

            </div>


        </div>

    </div>

</section>


<!-- =====================================
     KONTAK
===================================== -->

<section
    id="kontak"
    class="section section-light"
>

    <div class="container">

        <div class="contact-box">

            <h2>
                📞 Kontak
            </h2>

            <p>
                Informasi lebih lanjut mengenai
                program KursusKu dapat diperoleh
                melalui halaman ini.
            </p>

        </div>

    </div>

</section>

</main>


<!-- =====================================
     FOOTER
===================================== -->

<footer class="footer">

    <div class="container">

        <p>

            &copy;
            <?= $year ?>
            <?= htmlspecialchars($siteName) ?>.

            Pemrograman Web III.

        </p>

    </div>

</footer>


</body>

</html>
