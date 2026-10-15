
<?php

// =====================================
// FORMAT RUPIAH
// =====================================

function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}


// =====================================
// FORMAT STATUS KURSUS
// =====================================

function statusKursus(int $quota, int $registered): string
{
    return $registered >= $quota
        ? 'Penuh'
        : 'Tersedia';
}


// =====================================
// MENGHITUNG SISA KURSI
// =====================================

function sisaKursi(int $quota, int $registered): int
{
    return max(0, $quota - $registered);
}


// =====================================
// FORMAT TANGGAL
// =====================================

function formatTanggal(string $date): string
{
    $value = new DateTimeImmutable($date);

    return $value->format('d-m-Y');
}


// =====================================
// MENGAMANKAN OUTPUT HTML
// =====================================

function e(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );
}


// =====================================
// FORMAT RUPIAH PRAKTIKUM 6
// =====================================

function formatRupiah(int $amount): string
{
    return 'Rp ' . number_format(
        $amount,
        0,
        ',',
        '.'
    );
}


// =====================================
// MENCARI DATA KURSUS BERDASARKAN KODE
// =====================================

function findCourse(
    array $courses,
    string $code
): ?array {

    foreach ($courses as $course) {

        if ($course['code'] === $code) {
            return $course;
        }
    }

    return null;
}


// =====================================
// MENENTUKAN DISKON BERDASARKAN
// TIPE PESERTA
// =====================================

function getDiscountPercent(
    string $participantType
): int {

    $participantType =
        strtolower(trim($participantType));

    if ($participantType === 'mahasiswa') {
        return 20;
    }

    if ($participantType === 'guru') {
        return 15;
    }

    return 0;
}


// =====================================
// LABEL METODE BELAJAR
// =====================================

function getLearningModeLabel(string $mode): string
{
    switch ($mode) {

        case 'offline':
            return 'Tatap Muka';

        case 'online':
            return 'Online';

        case 'hybrid':
            return 'Hybrid';

        default:
            return 'Tidak diketahui';
    }
}