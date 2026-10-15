<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Kursus - KursusKu</title>

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
                #14532d,
                #16a34a,
                #4ade80
            );
            min-height: 100vh;
            color: #1f2937;
        }

        /* =========================
           NAVBAR
        ========================= */

        header {
            background: rgba(255, 255, 255, 0.97);
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.12);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            max-width: 1100px;
            margin: auto;
            padding: 18px 25px;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        nav a {
            text-decoration: none;
            color: #166534;
            font-weight: 600;
            transition: 0.3s ease;
        }

        nav a:hover {
            color: #22c55e;
        }

        nav a:first-child {
            margin-right: auto;
            font-size: 22px;
            color: #15803d;
        }

        /* =========================
           MAIN
        ========================= */

        main {
            width: 100%;
            max-width: 850px;
            margin: auto;
            padding: 45px 20px;
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            background: #ffffff;
            border-radius: 22px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.20);
            border-top: 6px solid #16a34a;
        }

        .form-card h1 {
            color: #166534;
            text-align: center;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .form-card > p {
            text-align: center;
            color: #64748b;
            margin-bottom: 32px;
        }

        /* =========================
           FORM GROUP
        ========================= */

        .form-group {
            margin-bottom: 22px;
        }

        label,
        legend {
            display: block;
            font-weight: bold;
            color: #166534;
            margin-bottom: 8px;
        }

        /* =========================
           INPUT
        ========================= */

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1.5px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            font-family: inherit;
            background: #ffffff;
            color: #1f2937;
            outline: none;
            transition:
                border-color 0.3s ease,
                box-shadow 0.3s ease,
                background 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        select:focus,
        textarea:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.15);
            background: #fafffb;
        }

        input::placeholder,
        textarea::placeholder {
            color: #9ca3af;
        }

        select {
            cursor: pointer;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* =========================
           FIELDSET
        ========================= */

        fieldset {
            border: none;
            padding: 0;
        }

        fieldset.form-group {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            padding: 18px;
            border-radius: 12px;
        }

        fieldset label {
            display: flex;
            align-items: center;
            color: #374151;
            font-weight: normal;
            margin-bottom: 10px;
            cursor: pointer;
        }

        fieldset label:last-child {
            margin-bottom: 0;
        }

        /* =========================
           RADIO & CHECKBOX
        ========================= */

        input[type="radio"],
        input[type="checkbox"] {
            appearance: none;
            width: 19px;
            height: 19px;
            margin-right: 10px;
            border: 2px solid #86efac;
            background: white;
            cursor: pointer;
            position: relative;
            transition: 0.2s ease;
        }

        input[type="radio"] {
            border-radius: 50%;
        }

        input[type="checkbox"] {
            border-radius: 5px;
        }

        input[type="radio"]:checked,
        input[type="checkbox"]:checked {
            background: #16a34a;
            border-color: #16a34a;
        }

        input[type="radio"]:checked::after {
            content: "";
            position: absolute;
            width: 7px;
            height: 7px;
            background: white;
            border-radius: 50%;
            top: 4px;
            left: 4px;
        }

        input[type="checkbox"]:checked::after {
            content: "✓";
            position: absolute;
            color: white;
            font-size: 13px;
            font-weight: bold;
            top: 0;
            left: 3px;
        }

        input[type="radio"]:hover,
        input[type="checkbox"]:hover {
            border-color: #16a34a;
        }

        /* =========================
           BUTTON
        ========================= */

        button {
            width: 100%;
            border: none;
            padding: 15px;
            border-radius: 11px;
            background: linear-gradient(
                135deg,
                #15803d,
                #22c55e
            );
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 7px 18px rgba(22, 163, 74, 0.30);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        button:hover {
            background: linear-gradient(
                135deg,
                #166534,
                #16a34a
            );
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(22, 163, 74, 0.40);
        }

        button:active {
            transform: translateY(0);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 650px) {

            nav {
                padding: 15px;
                gap: 15px;
            }

            nav a {
                font-size: 14px;
            }

            nav a:first-child {
                font-size: 19px;
            }

            main {
                padding: 25px 15px;
            }

            .form-card {
                padding: 25px 20px;
                border-radius: 17px;
            }

            .form-card h1 {
                font-size: 26px;
            }
        }

        @media (max-width: 450px) {

            nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            nav a:first-child {
                width: 100%;
                text-align: center;
                margin-right: 0;
                margin-bottom: 5px;
            }

            .form-card {
                padding: 22px 17px;
            }
        }

    </style>

</head>

<body>

    <!-- =========================
         NAVBAR
    ========================= -->

    <header>

        <nav aria-label="Navigasi utama">

            <a href="index.php">
                <strong>🌿 KursusKu</strong>
            </a>

            <a href="index.php#katalog">
                Katalog
            </a>

            <a href="registration.php">
                Daftar Kursus
            </a>

        </nav>

    </header>


    <!-- =========================
         FORM PENDAFTARAN
    ========================= -->

    <main>

        <section class="form-card">

            <h1>🌿 Daftar Kursus</h1>

            <p>
                Lengkapi data diri Anda untuk mengikuti kursus.
            </p>


            <form
                action="process-registration.php"
                method="POST"
            >

                <input
                    type="hidden"
                    name="source"
                    value="week-06"
                >


                <!-- Nama Lengkap -->

                <div class="form-group">

                    <label for="name">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        minlength="3"
                        maxlength="100"
                        autocomplete="name"
                        placeholder="Masukkan nama lengkap"
                    >

                </div>


                <!-- Email -->

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        autocomplete="email"
                        placeholder="contoh@email.com"
                    >

                </div>


                <!-- Nomor HP -->

                <div class="form-group">

                    <label for="phone">
                        Nomor HP
                    </label>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        required
                        pattern="[0-9+\-\s]{10,20}"
                        autocomplete="tel"
                        placeholder="Contoh: 081234567890"
                    >

                </div>


                <!-- Program Studi -->

                <div class="form-group">

                    <label for="study_program">
                        Program Studi
                    </label>

                    <input
                        type="text"
                        id="study_program"
                        name="study_program"
                        required
                        maxlength="100"
                        placeholder="Contoh: Teknik Informatika"
                    >

                </div>


                <!-- Kursus -->

                <div class="form-group">

                    <label for="course">
                        Kursus yang Dipilih
                    </label>

                    <select
                        id="course"
                        name="course"
                        required
                    >

                        <option value="">
                            -- Pilih Kursus --
                        </option>

                        <?php foreach ($courses as $courseItem): ?>

                            <option value="<?= e($courseItem['code']) ?>">

                                <?= e($courseItem['name']) ?>

                                —
                                <?= formatRupiah($courseItem['fee']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- Jenis Peserta -->

                <fieldset class="form-group">

                    <legend>
                        Jenis Peserta
                    </legend>

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
                            value="Guru"
                        >

                        Guru

                    </label>


                    <label>

                        <input
                            type="radio"
                            name="participant_type"
                            value="Umum"
                        >

                        Umum

                    </label>

                </fieldset>


                <!-- Minat Tambahan -->

                <fieldset class="form-group">

                    <legend>
                        Minat Tambahan
                    </legend>

                    <?php foreach ($interestOptions as $value => $label): ?>

                        <label>

                            <input
                                type="checkbox"
                                name="additional_interest[]"
                                value="<?= e($label) ?>"
                            >

                            <?= e($label) ?>

                        </label>

                    <?php endforeach; ?>

                </fieldset>


                <!-- Metode Belajar -->

                <div class="form-group">

                    <label for="learning_mode">
                        Metode Belajar
                    </label>

                    <select
                        id="learning_mode"
                        name="learning_mode"
                        required
                    >

                        <option value="">
                            -- Pilih Metode Belajar --
                        </option>

                        <option value="offline">
                            Tatap Muka
                        </option>

                        <option value="online">
                            Online
                        </option>

                        <option value="hybrid">
                            Hybrid
                        </option>

                    </select>

                </div>


                <!-- Jumlah Paket -->

                <div class="form-group">

                    <label for="package_count">
                        Jumlah Paket
                    </label>

                    <select
                        id="package_count"
                        name="package_count"
                        required
                    >

                        <?php for ($i = 1; $i <= 3; $i++): ?>

                            <option value="<?= $i ?>">
                                <?= $i ?> Paket
                            </option>

                        <?php endfor; ?>

                    </select>

                </div>


                <!-- Catatan -->

                <div class="form-group">

                    <label for="note">
                        Catatan Tambahan
                    </label>

                    <textarea
                        id="note"
                        name="note"
                        maxlength="500"
                        placeholder="Tuliskan catatan atau kebutuhan khusus..."
                    ></textarea>

                </div>


                <!-- Tombol -->

                <div class="form-group">

                    <button type="submit">
                        ✓ Proses Pendaftaran
                    </button>

                </div>

            </form>

        </section>

    </main>

</body>

</html>