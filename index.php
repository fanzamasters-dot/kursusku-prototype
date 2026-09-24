<?php

require_once __DIR__. '/helpers.php';
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
$tagline = 'Belajar,daftar,dan kelola kursus dalam satu tempat';
$year = date('Y');
?>

<!doctype html> 
<html lang="id"> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($siteName) ?></title>

  <link
    rel="stylesheet"
    href="assets/css/style.css">
</head>
  <body> 

  </body> 
  </html>

  <link
    rel="stylesheet"
    href="assets/css/style.css">
</head>

<body>
  <header class="header">

    <div class="container">

      <h1>
        <?php echo $siteName; ?>
      </h1>

      <p>
        <?php echo $tagline; ?>
      </p>

    </div>

  </header>
  <nav aria-label="Navigasi utama">
    <a href="index.php"><strong>KursusKu</strong></a>
    <a href="index.php#katalog">Katalog</a>
    <a href="registration.php">Daftar Kursus</a>
</nav>
</header>

  <main>
    <section id="hero" class="hero">

      <div class="container">

        <div class="hero-content">

          <div>

            <h1>
              <?= htmlspecialchars($tagline) ?>
            </h1>

            <p>
              Platform belajar teknologi untuk
              mahasiswa yang ingin meningkatkan
              kemampuan pemrograman web.
            </p>

            <a
              href="#katalog"
              class="button">
              Lihat katalog Kursus
            </a>
            
            <a
            href="fee-calculator.php"
            class="button">
            kalkulator Biaya Kursus
          </a>

          </div>

          <div>

            <img
              src="assets/img/image1.png"
              alt="Mahasiswa sedang belajar pemrograman web"
              class="hero-image">

          </div>

        </div>

      </div>

    </section>
    <section id="keunggulan" class="section">
      <artikel>
       <h3>Materi Terarah</h3>
       <p>Materi disusun bertahap dari dasar hingga pratik.</p>
      </artikel>

      <article>
        <h3>belajar dengan proyek<h3/>
        <p>Setiap tahap menghasilkan bagian nyata dari aplikasi.</P>
      </article>

      <article>
        <h3>Pendamping Praktik</h3>
        <P>mahasiswa belajar melalui demontrasi,latihan,dan evaluasi.</P>
      </article>
    </section>

</main>
   
  <section id="katalog" class="section">

  <div class="container">

    <h2>Katalog Kursus</h2>

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
          <tr>
            <td><?= htmlspecialchars($course['code']) ?></td>
            <td><?= htmlspecialchars(trim($course['name'])) ?></td>
            <td><?= rupiah($course['fee']) ?></td>
            <td><?= formatTanggal($course['start_date']) ?></td>
            <td><?= sisaKursi($course['quota'], $course['registered']) ?></td>
            <?php
            $status = statusKursus($course['quota'], $course['registered']);
            $class = $status === 'Penuh' ? 'badge-full' : 'badge-available';
           ?>

           <td>
              <span class="<?= $class ?>">
               <?= $status ?>
             </span>
           </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

</section>

    </section>
    <section id ="alur" class="section">
       <div class="container">
        <h2>Cara Mendaftar </h2>

        <ol>
          <li>Pilih Kursus yang diminati,</li>
          <li>Periksa kembali data.</li>
          <li>Kirim pendaftaran dan Tunggu konfirmasi.</li>
        </ol>

       </div>

    </section>
    <section id="tentang" class="section section-light">

      <div class="container">

        <h2>Tentang KursusKu</h2>

        <p>
          KursusKu merupakan prototype website
          pembelajaran yang dikembangkan dalam
          mata kuliah Pemrograman Web III.
        </p>

        <p>
          Pada semester ini mahasiswa akan belajar
          PHP, MySQL dan framework Laravel.
        </p>

        <a
          href="https://laravel.com"
          target="_blank"
          rel="noopener">
          Pelajari Laravel
        </a>

      </div>

    </section>
    <section id="media" class="section">

      <div class="container">

        <h2>Kenali Program kami</h2>

        <img
         src="Assets/image/logo.png"
         alt="Mahasiswa sedang belajar pemrograman web"
         width="640">

        <div class="video-placeholder">

          <iframe width="342" height="607" src="https://www.youtube.com/embed/nQinn48Bk2g" title="Kenapa Laravel Masih Banyak Yang Pake" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <P>
          Pelajari Juga 
          <a href=https://www.php.net/"target"_balnk"rel="noopener"
          dokumentasi PHP
          </a>.

        </P>


      </div>

    </section>
    <section id="kontak" class="section section-light">

      <div class="container">

        <h2>Kontak</h2>

        <p>
          Informasi lebih lanjut mengenai
          program KursusKu dapat diperoleh
          melalui halaman ini.
        </p>

      </div>

    </section>
  </main>

  <footer class="footer">

    <div class="container">

      <p>

        &copy;
        <?php echo $year; ?>

        <?php echo $siteName; ?>.

        Pemrograman Web III.

      </p>

    </div>

  </footer>
</body>

</html>
