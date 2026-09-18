<?php

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
    <a href="index.php"><strong><?= htmlspecialchars($siteName) ?></strong></a>
    <a href="#keunggulan">Keunggulan</a> 
    <a href="#katalog">Katalog</a> 
    <a href="#alur">Cara Daftar</a> 
    <a href="#kontak">Kontak</a> 
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

        <div class="course-grid">

          <article class="course-card">

            <h3>HTML & CSS</h3>

            <p>
              Belajar membangun struktur dan
              tampilan website dari dasar.
            </p>

          </article>


          <article class="course-card">

            <h3>PHP</h3>

            <p>
              Belajar pemrograman web
              server-side menggunakan PHP.
            </p>

          </article>


          <article class="course-card">

            <h3>Laravel</h3>

            <p>
              Membangun aplikasi web modern
              menggunakan framework Laravel.
            </p>

          </article>

          <article class="course-card">
            <h3>MYSQl</h3>

            <P>Belajar Mengelola data base untuk aplikasi Web
              menjadi lebih interaktif.
            </P>
          </article>

          <article class="course-card">

           <h3>JavaScrip</h3>
           <P>
            Belajar membuat halaman web 
            menjadi lebih interaktif.
           </P>

          </article>

          <article class="course-card">
            <h3>Git & GitHub</h3>

            <p>
              Belajar mengelola kode dan proyek 
              menggunakan  GitHub.
            </p>
          </article>

        </div>

      </div>

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
