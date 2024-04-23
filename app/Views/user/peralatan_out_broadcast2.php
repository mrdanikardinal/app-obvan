<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Docoment Pdf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            /* agar konten tetap di atas footer */
            position: relative;
            /* memberi posisi relatif untuk footer */
        }

        footer {
            position: absolute;
            /* membuat footer posisi tetap */
            bottom: 0;
            /* meletakkan footer di bagian bawah */
            width: 100%;
            /* agar footer mengisi lebar layar */
            background-color: #333;
            /* warna latar belakang footer */
            color: #fff;
            /* warna teks footer */
            padding: 20px;
            /* jarak padding untuk konten footer */
            box-sizing: border-box;
            /* agar padding tidak menambah ukuran total */
        }

        table,
        th,
        td {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        * {
            /* font-family: Arial, sans-serif; */
            font-family: Arial, Helvetica, sans-serif;
            /* font-family: "Lucida Console", "Courier New", monospace; */
            /* font-family: "Lucida Console", "Courier New", sans-serif; */
            font-size: 11px;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: relative;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
<?php
    date_default_timezone_set('Asia/Jakarta');
   
    $bulanForTandaTanganCount = date('m',strtotime(' - 2 day', strtotime($getShowObByIdOB['tanggal'])));
    $yearForTandaTanganCount = date('Y',strtotime(' - 2 day', strtotime($getShowObByIdOB['tanggal'])));



    $tanggal = date('d', strtotime($getShowObByIdOB['tanggal']));
    $bulan = date('F', strtotime($getShowObByIdOB['tanggal']));
    $tahun = date('Y', strtotime($getShowObByIdOB['tanggal']));

    $tanggalSampaiDengan = date('d', strtotime($getShowObByIdOB['sampai_dengan']));
    $bulanSampaiDengan = date('F', strtotime($getShowObByIdOB['sampai_dengan']));
    $tahunSampaiDengan = date('Y', strtotime($getShowObByIdOB['sampai_dengan']));

    // Array untuk mapping nama bulan dengan huruf
    $bulan_huruf = array(
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    );
    $bulan_huruf_number = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );

    // Mengganti nama bulan dalam bahasa Inggris dengan nama bulan dalam bahasa Indonesia
    $bulan_indonesia = $bulan_huruf[$bulan];
    $bulan_indonesia_sampai_dengan = $bulan_huruf[$bulanSampaiDengan];
    $bulanForTTD= $bulan_huruf_number[$bulanForTandaTanganCount];
    ?>
        <header>
            <img src="img/tvri.png" alt="logo-tvri" width="100px" height="56px">
        </header>
        <nav>
        <h4>TEKNOLOGI PERALATAN LUAR STUDIO</h4>
        <h5>No: <?= ($getShowObByIdOB['nomor_surat'] == NULL) ? $autoNomorSurat  : $getShowObByIdOB['nomor_surat']; ?>/ <?=$getKodeSuratOb['kode_klasifikasi'];?>/<?=$getKodeObvan['kode_klasifikasi_obvan'];?>/<?= $bulanForTandaTanganCount; ?>/<?= $yearForTandaTanganCount; ?></h5>
        <h5>Hal: Laporan Pemakaian Peralatan Produksi Luar Studio</h5> <br>
        <h5>Dengan ini kami sampaikan bahwa pelaksanaan :</h5>
<pre>
<span> ACARA       : <?= $getShowObByIdOB["acara"]; ?></span> 
<span> TEMPAT      : <?= $getShowObByIdOB["lokasi"]; ?></span>
<span> DURASI      : <?= $getShowObByIdOB["durasi"] . ' ' . 'Hari'; ?></span> 
<span> TANGGAL     : <?php if ($getShowObByIdOB['tanggal'] != $getShowObByIdOB['sampai_dengan']) : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?> S.D <?= $tanggalSampaiDengan; ?> <?= $bulan_indonesia_sampai_dengan; ?> <?= $tahunSampaiDengan; ?><?php else : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?><?php endif; ?></span>
</pre>
    <h5>Satuan kerja Teknik Produksi Peralatan Luar Studio dengan ini menggunakan pemakaian perangkat peralatan sebagai berikut:</h5>
        </nav>
        <main>
        <table cellpadding="5" style="border-collapse: collapse; width:500px">
            <thead>
                <tr>
                    <th style="width:30px">NO</th>
                    <th style="width:140px">NAMA ALAT</th>
                    <th style="width:140px">MERK</th>
                    <th style="width:65px">JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                <?php $number = 1; ?>
                <?php foreach ($showAllJoinsOBKategoriByIDOB as $key => $valueShowAlatBroadcast) : ?>
                    <tr>
                        <td style="width:30px"><?= $number++ ?></td>
                        <td style="width:140px"><?= $valueShowAlatBroadcast['nama_barang']; ?></td>
                        <td style="width:140px"><?= $valueShowAlatBroadcast['merk']; ?></td>
                        <td style="width:65px"><?= $valueShowAlatBroadcast['jumlah']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        </main>
        <footer>
        <h4 style="text-indent: 200px;">Jakarta,
            <?php if ($getShowObByIdOB['tanggal'] != $getShowObByIdOB['sampai_dengan']) : ?>
                <?= date('d',strtotime(' - 2 day', strtotime($getShowObByIdOB['tanggal']))); ?>
                    <?= $bulanForTTD; ?>
                    <?= $yearForTandaTanganCount; ?>
            <?php else : ?>
                <?= date('d',strtotime(' - 2 day', strtotime($getShowObByIdOB['tanggal']))); ?>
                    <?= $bulanForTTD; ?>
                    <?= $yearForTandaTanganCount; ?>
            <?php endif; ?>
        </h4>

        <h4 style="text-indent: 200px;">KETUA TIM TEKNOLOGI PERALATAN LUAR STUDIO</h4>
        <img src="img/ttdJansenWeb.png" alt="logo-tvri" width="100px" height="60px" style="text-align: center;">
        <h4 style="text-indent: 200px;">JANSEN STEPPEN JOU SINAGA</h4>
        <h4 style="text-indent: 200px;">198809232022211006</h4>
    </footer>
</body>

</html>