<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dinas Shifting</title>
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
    <?php foreach ($showAllDinasShiftingJoinIdDinasIdShifIdAcara as $key => $valueDinasShift) : ?>

        <?php
        date_default_timezone_set('Asia/Jakarta');


        $tanggalForTandaTanganCount = date('d', strtotime(' - 2 day', strtotime($valueDinasShift['tanggal'])));
        $bulanForTandaTanganCount = date('m', strtotime(' - 2 day', strtotime($valueDinasShift['tanggal'])));
        $yearForTandaTanganCount = date('Y', strtotime(' - 2 day', strtotime($valueDinasShift['tanggal'])));

        $tanggalForTandaTanganCount = date('d',strtotime(' - 2 day', strtotime($valueDinasShift['tanggal'])));
        $bulanForTandaTanganCount = date('m',strtotime(' - 2 day', strtotime($valueDinasShift['tanggal'])));
        $yearForTandaTanganCount = date('Y',strtotime(' - 2 day', strtotime($valueDinasShift['tanggal'])));




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
        $bulanForTTD = $bulan_huruf_number[$bulanForTandaTanganCount];

        // Mengganti nama bulan dalam bahasa Inggris dengan nama bulan dalam bahasa Indonesia
        $bulan_indonesia = $bulan_huruf[$bulan];
        $bulanForTTD= $bulan_huruf_number[$bulanForTandaTanganCount];


        ?>
        <header>
            <img src="img/tvri.png" alt="logo-tvri" width="100px" height="56px">
        </header>
        <nav>
            <h4>TEKNOLOGI PERALATAN LUAR STUDIO</h4>
            <h5>No: <?= ($valueDinasShift['nomor_surat'] == NULL) ? $autoNomorSurat  : $valueDinasShift['nomor_surat']; ?>/ <?=$getKodeSuratShif['kode_klasifikasi'];?>/<?=$getKodeObvan['kode_klasifikasi_obvan'];?>/<?=$bulanForTandaTanganCount;?>/<?=$yearForTandaTanganCount;?></h5>
            <h5>Hal: Daftar Nama Petugas Teknik Produksi Luar Studio</h5><br>
            <h5>Dengan ini kami sampaikan bahwa pelaksanaan :</h5>
            <pre>
<span> KATEGORI    : <?= $valueDinasShift["nama_kategori_dinas_crew"]; ?></span>
<span> SHIFT       : <?= $valueDinasShift["nama_kategori_shif"]; ?></span>
<span> TANGGAL     : <?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?></span>
<span> ACARA       : <?= $valueDinasShift["nama_acara_shift"]; ?></span> 
<span> TEMPAT      : <?= $valueDinasShift["lokasi"]; ?></span>
</pre>
        <?php endforeach; ?>
        <h4>Satuan kerja Teknik Produksi Peralatan Luar Studio dengan ini menugaskan crew produksi dalam studio & penyiaran sebagai berikut:</h4>
        </nav>
        <section>
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
                            <th style="width:30px"><?= $number++; ?></th>
                            <td style="width:150px"><?= $valueDataCrewShiftJoinUsers['fullname']; ?></td>
                            <td style="width:130px"><?= $valueDataCrewShiftJoinUsers['nip']; ?></td>
                            <td style="width:80px"><?= $valueDataCrewShiftJoinUsers['golongan']; ?></td>
                            <td style="width:130px"><?= $valueDataCrewShiftJoinUsers['npwp']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <footer>
            <h4 style="text-indent: 200px;">Jakarta,<?= $tanggalForTandaTanganCount; ?> <?= $bulanForTTD; ?> <?= $yearForTandaTanganCount; ?>
            </h4>
            <h4 style="text-indent: 200px;">KETUA TIM TEKNOLOGI PERALATAN LUAR STUDIO</h4>
            <img src="img/ttdJansenWeb.png" alt="logo-tvri" width="100px" height="60px" style="text-align: center;">
            <h4 style="text-indent: 200px;">JANSEN STEPPEN JOU SINAGA</h4>
            <h4 style="text-indent: 200px;">198809232022211006</h4>

        </footer>
</body>

</html>