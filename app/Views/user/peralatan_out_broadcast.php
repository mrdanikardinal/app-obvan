<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peralatan Out Broadcast</title>
    <style>
        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
            border-collapse: collapse;
        }

        
        /* * {
            font-family: 'Times New Roman', Times, sans-serif;
            font-family: Arial, Helvetica, sans-serif;
            font-family: "Times New Roman", Times, serif;
        } */
        
        h5 {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <?php
    date_default_timezone_set('Asia/Jakarta');
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

    // Mengganti nama bulan dalam bahasa Inggris dengan nama bulan dalam bahasa Indonesia
    $bulan_indonesia = $bulan_huruf[$bulan];
    $bulan_indonesia_sampai_dengan = $bulan_huruf[$bulanSampaiDengan];
    ?>

    <header>
        <img src="img/tvri.png" alt="logo-tvri" width="100px" height="56px">
    </header>
    <nav>
        <h4>TEKNOLOGI PERALATAN LUAR STUDIO</h4>
        <h5>No: <?= ($getShowObByIdOB['nomor_surat'] == NULL) ? $autoNomorSurat  : $getShowObByIdOB['nomor_surat']; ?>/ TK.02.02/1.4.3.2/II/<?= $tahun; ?></h5>
        <h5>Hal: Laporan Pemakaian Peralatan Produksi Luar Studio</h5>
        <h5>Dengan ini kami sampaikan bahwa pelaksanaan :</h5>

<pre>
<span> ACARA       : <?= $getShowObByIdOB["acara"]; ?></span> 
<span> TEMPAT      : <?= $getShowObByIdOB["lokasi"]; ?></span>
<span> DURASI      : <?= $getShowObByIdOB["durasi"] . ' ' . 'Hari'; ?></span> 
<span> TANGGAL     : <?php if ($getShowObByIdOB['tanggal'] != $getShowObByIdOB['sampai_dengan']) : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?> S.D <?= $tanggalSampaiDengan; ?> <?= $bulan_indonesia_sampai_dengan; ?> <?= $tahunSampaiDengan; ?><?php else : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?><?php endif; ?>
</pre>
    </nav>
    <section>
        <h5>Satuan kerja Teknik Produksi Peralatan Luar Studio dengan ini menggunakan pemakaian perangkat peralatan sebagai berikut:</h5>
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
            <!-- <tfoot>
                    <tr>
                        <td>Sum</td>
                        <td>$180</td>
                    </tr>
                </tfoot> -->
        </table>

    </section>
    <footer>
        <h5 style="text-indent: 200px;">Jakarta,
            <?php if ($getShowObByIdOB['tanggal'] != $getShowObByIdOB['sampai_dengan']) : ?>
                <?= $tanggal - 2; ?>
                <?= $bulan_indonesia; ?>
                <?= $tahun; ?>
            <?php else : ?>
                <?= $tanggal - 2; ?>
                <?= $bulan_indonesia; ?>
                <?= $tahun; ?>
            <?php endif; ?>
        </h5>

        <h5 style="text-indent: 200px;">KETUA TIM TEKNOLOGI PERALATAN LUAR STUDIO</h5>
        <img src="img/ttdJansenWeb.png" alt="logo-tvri" width="100px" height="60px" style="text-align: center;">
        <h5 style="text-indent: 200px;">JANSEN STEPPEN JOU SINAGA</h5>
        <h5 style="text-indent: 200px;">198809232022211006</h5>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>