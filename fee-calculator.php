<?php

$courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 1;
$discountPercent = 0;
$adminFee = 25000;
$isActive = true;

$subtotal = $fee * $participantCount;

$discount = intdiv($subtotal * $discountPercent, 100);

$total = $subtotal - $discount + $adminFee;

?>

<stely>
    body {
        Font-family: Arial, sans-serif;
        msx-width: *800px;
        margin: 40px auto;
        padding: 20px;
    }
    h1{
        margin-botton; 20px;
    }
    table {
        width; 100%;
        border-collapse: collapse;
    }

    th,td{
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background: #f5f5f5;
    }
</stely>

<h1>kalkulator biaya kursus</h1>

<table border="1">
    <tr>
        <th>keterangan</th>
        <th>Nilai</th>
    
    </tr>
    <tr>
        <td>Nama Kursus</td>
        <td><?= $courseName ?></td>
    </tr>
    <tr>
        <td>Biaya Per Peserta</td>
        <td>RP <?= Number_format($fee,0,',','.') ?></td>
    </tr>
    <tr>
        <td>jumlah Peserta</td>
        <td><?=  $participantCount ?></td>
    </tr>
    <tr>
        <td>Diskon</td>
        <td><?= $discountPercent ?>%</td>
    </tr>
    <tr>
        <td>subtotal</td>
        <td>RP <?= number_format($subtotal,0,',','.') ?></td>
    </tr>
    <tr>
        <td>Potongan Diskon</td>
        <td>RP <? number_format($discount,0,',','.')?></td>
    </tr>
    <tr>
        <td>Biaya Admin</td>
        <Td>RP <?= Number_format($adminFee,0,',','.')?></Td>
    </tr>
    <tr>
        <td><strong>Total</strong></td>
        <td><strong>RP <?= number_format($total,0,',','.') ?></strong></td>
    </tr>
</table>