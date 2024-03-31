<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dinas Lembur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #judul,
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

        h5 {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <?php foreach ($showAllDinasShiftingJoinIdDinasIdShifIdAcara as $key => $valueDinasShift) : ?>

        <?php
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d', strtotime($valueDinasShift['tanggal']));
        $bulan = date('F', strtotime($valueDinasShift['tanggal']));
        $tahun = date('Y', strtotime($valueDinasShift['tanggal']));


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
        ?>

        <header>
            <img src="img/tvri.png" alt="logo-tvri" width="100px" height="56px">
        </header>
        <nav>
            <h4>TEKNOLOGI PERALATAN LUAR STUDIO</h4>
            <!-- <h5>No: 44/TK.02.02 /1.4.3.2/II/2024</h5> -->
            <h5>No: <?= ($valueDinasShift['nomor_surat_lembur'] == NULL) ? $autoNomorSurat  : $valueDinasShift['nomor_surat_lembur']; ?>/ TK.02.02/1.4.3.2/II/<?= $tahun; ?></h5>
            <h5>Hal: Daftar Nama Petugas Teknik Produksi Luar Studio</h5>
            <div class="container px-4">
                <h5>Dengan ini kami sampaikan bahwa pelaksanaan :</h6>
                    <pre>
<span> KATEGORI    : <?= $valueDinasShift["nama_kategori_dinas_crew"]; ?></span>
<span> SHIFT       : <?= $valueDinasShift["nama_kategori_shif"]; ?></span>
<span> TANGGAL     : <?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?></span>
<span> ACARA       : <?= $valueDinasShift["nama_acara_shift"]; ?></span> 
<span> TEMPAT      : <?= $valueDinasShift["lokasi"]; ?></span>

</pre>
                <?php endforeach; ?>
                <h5>Satuan kerja Teknik Produksi Peralatan Luar Studio dengan ini menugaskan crew lembur sebagai berikut:
                    <h6>
            </div>
        </nav>
        <section>
            <table>
                <!-- <table cellpadding="5"> -->
                <table cellpadding="5" style="border-collapse: collapse; width:500px">
                    <thead>
                        <tr>
                            <th style="width:30px">NO</th>
                            <th style="width:150px">NAMA</th>
                            <th style="width:130px">NIP</th>
                            <th style="width:80px">GOLONGAN</th>
                            <th style="width:130px">NPWP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; ?>
                        <?php foreach ($allDataCrewShiftingJoinUsers as $key => $valueDataCrewShiftJoinUsers) : ?>
                          <tr>
                            <th style="width:30px"><?= $number++;?></th>
                            <td style="width:150px"><?= $valueDataCrewShiftJoinUsers['fullname'];?></td>
                            <td style="width:130px"><?= $valueDataCrewShiftJoinUsers['nip'];?></td>
                            <td style="width:80px"><?= $valueDataCrewShiftJoinUsers['golongan'];?></td>
                            <td style="width:130px"><?= $valueDataCrewShiftJoinUsers['npwp'];?></td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </table>
        </section>
        <?php


        ?>
        <footer>
            <h5 style="text-indent: 200px;">Jakarta,<?= $tanggal - 2; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?>
            </h5>
            <h5 style="text-indent: 200px;">KETUA TIM TEKNOLOGI PERALATAN LUAR STUDIO</h5>
            <img src="img/ttdJansenWeb.png" alt="logo-tvri" width="100px" height="60px" style="text-align: center;">
            <h5 style="text-indent: 200px;">JANSEN STEPPEN JOU SINAGA</h5>
            <h5 style="text-indent: 200px;">198809232022211006</h5>

        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>