<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #judul,
        table,
        th,
        td {
            /* width: 100%; */

            /* Set lebar tabel menjadi 50% dari lebar halaman */
            border-collapse: collapse;
            /* table-layout: auto; */
            /* Set lebar kolom mengikuti konten */
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        h5 {
            font-family: Arial, sans-serif;
        }
      
    </style>
</head>

<body>

    <header>
        <img src="img/tvri.png" alt="logo-tvri" width="100px" height="56px">
    </header>
    <nav>
        <h4>TEKNOLOGI PERALATAN LUAR STUDIO</h4>
        <?php foreach ($showGetPeminjamanAlatJoinUsers as $valueShowPeminjamanAlat) : ?>
            <!-- <h5>No: 44/TK.02.02 /1.4.3.2/II/2024</h5> -->
            <h5>No: <?= ($valueShowPeminjamanAlat['nomor_surat'] == NULL) ? $autoNomorSurat  : $valueShowPeminjamanAlat['nomor_surat']; ?>/ TK.02.02/1.4.3.2/II/2024</h5>
            <h5>Hal: Daftar Nama Petugas</h5>
            <div class="container px-4">
                <h5>Dengan ini kami sampaikan bahwa pelaksanaan :</h6>

                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('d', strtotime($valueShowPeminjamanAlat['tanggal']));
                    $bulan = date('F', strtotime($valueShowPeminjamanAlat['tanggal']));
                    $tahun = date('Y', strtotime($valueShowPeminjamanAlat['tanggal']));

                    $tanggalSampaiDengan = date('d', strtotime($valueShowPeminjamanAlat['sampai_dengan']));
                    $bulanSampaiDengan = date('F', strtotime($valueShowPeminjamanAlat['sampai_dengan']));
                    $tahunSampaiDengan = date('Y', strtotime($valueShowPeminjamanAlat['sampai_dengan']));

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
                    <pre>
<span> ACARA       : <?= $valueShowPeminjamanAlat["acara"]; ?></span> 
<span> TEMPAT      : <?= $valueShowPeminjamanAlat["lokasi"]; ?></span>
<span> KATEGORI    : <?= $valueShowPeminjamanAlat["nama_kategori"]; ?></span> 
<span> TANGGAL     : <?php if ($valueShowPeminjamanAlat['tanggal'] != $valueShowPeminjamanAlat['sampai_dengan']) : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?> S.D <?= $tanggalSampaiDengan; ?> <?= $bulan_indonesia_sampai_dengan; ?> <?= $tahunSampaiDengan; ?><?php else : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?><?php endif; ?>
</pre>
                <?php endforeach; ?>
                <h5>Satuan kerja Teknik Produksi Peralatan Luar Studio dengan ini memberi tugas kerabat kerja sebagai berikut:
                    <h6>
            </div>
    </nav>
    <section>
        <table>
            <table cellpadding="5" style="border-collapse: collapse; width:500px">
                <thead>
                    <tr>
                        <th style="width:30px">NO</th>
                        <th style="width:140px">NAMA</th>
                        <th style="width:140px">NIP</th>
                        <th style="width:65px">GOLONGAN</th>
                        <th style="width:150px">NPWP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 1; ?>

                </tbody>
            </table>
        </table>
    </section>
    <?php


    ?>
    <footer>
        <h5 style="text-indent: 200px;">Jakarta,
            <?php if ($valueShowBroadcast['tanggal'] != $valueShowBroadcast['sampai_dengan']) : ?>
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