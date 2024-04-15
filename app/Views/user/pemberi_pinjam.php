<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Docoment Pdf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
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
    </style>
</head>

<body>
    <?php foreach ($showGetPeminjamanAlatJoinUsers as $key => $valueShowPeminjamanAlat) : ?>
        <?php
        date_default_timezone_set('Asia/Jakarta');

        $bulanForTandaTanganCount = date('m',strtotime(' - 2 day', strtotime($valueShowPeminjamanAlat['tanggal'])));
        $yearForTandaTanganCount = date('Y',strtotime(' - 2 day', strtotime($valueShowPeminjamanAlat['tanggal'])));



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
            <h5>No: <?= ($valueShowPeminjamanAlat['nomor_surat_pemberi'] == NULL) ? $autoNomorSurat  : $valueShowPeminjamanAlat['nomor_surat_pemberi']; ?>/ TK.02.02/1.4.3.2/<?=$bulanForTandaTanganCount;?>/</h5>
            <h5>Hal: Daftar Petugas & Penyerahan Peralatan</h5> <br>

            <h5>Dengan ini kami sampaikan bahwa berdasarkan surat tentang <?= $valueShowPeminjamanAlat['acara'];?> perihal permintaan bantuan peralatan produksi dari, Teknologi peralatan luar studio sebagai berikut:</h5>
            <pre>
<span> ACARA       : <?= $valueShowPeminjamanAlat["acara"]; ?></span> 
<span> TEMPAT      : <?= $valueShowPeminjamanAlat["tempat"]; ?></span>
<span> DURASI      : <?= $valueShowPeminjamanAlat["durasi_pinjam"]; ?></span> 
<span> PEMINJAM    : <?= $valueShowPeminjamanAlat["nama_peminjam"]; ?></span> 
<span> KONTAK      : <?= $valueShowPeminjamanAlat["no_hp_peminjam"]; ?></span> 
<span> TANGGAL     : <?php if ($valueShowPeminjamanAlat['tanggal'] != $valueShowPeminjamanAlat['sampai_dengan']) : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?> S.D <?= $tanggalSampaiDengan; ?> <?= $bulan_indonesia_sampai_dengan; ?> <?= $tahunSampaiDengan; ?><?php else : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?><?php endif; ?></span>
</pre>
            <h5>Peralatan dari bidang teknologi peralatan luar studio yang dipinjam sebagai berikut:</h5>
            <table cellpadding="5" style="border-collapse: collapse; width:500px">
                <thead>
                    <tr>
                        <th style="width:30px">NO</th>
                        <th style="width:160px">NAMA</th>
                        <th style="width:140px">MERK</th>
                        <th style="width:90px">S/N</th>
                        <th style="width:65px">JUMLAH</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 1; ?>
                    <?php foreach ($showAllDataPeminjamanAlat as $key => $valueAllDataPeminjamanAlat) : ?>
                        <tr>
                            <td style="width:30px"><?= $number++ ?></td>
                            <td style="width:160px"><?= $valueAllDataPeminjamanAlat['nama_barang']; ?></td>
                            <td style="width:140px"><?= $valueAllDataPeminjamanAlat['merk']; ?></td>
                            <td style="width:90px"><?= $valueAllDataPeminjamanAlat['serial_number']; ?></td>
                            <td style="width:65px"><?= $valueAllDataPeminjamanAlat['jumlah']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
        <h5>Satuan kerja Teknik Produksi Peralatan Luar Studio menugaskan petugas ,menyediakan peralatan sebagai berikut:</h5>
        </nav>

        <main>
            <table cellpadding="5" style="border-collapse: collapse; width:500px">
                <thead>
                    <tr>
                        <th style="width:30px">NO</th>
                        <th style="width:150px">NAMA</th>
                        <th style="width:130px">NIP</th>
                        <th style="width:80px">GOLONGAN</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $number = 1; ?>
                    <?php foreach ($showGetPeminjamanAlatJoinUsers as $key => $valueShowPeminjamanAlat) : ?>
                        <tr>
                            <td style="width:30px"><?= $number++ ?></td>
                            <td style="width:150px"><?= $valueShowPeminjamanAlat['fullname']; ?></td>
                            <td style="width:130px"><?= $valueShowPeminjamanAlat['nip']; ?></td>
                            <td style="width:80px"><?= $valueShowPeminjamanAlat['golongan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
        <h5>Demikian kami sampaikan, atas bantuan dan kerjasamanya kami ucapkan terimakasih.</h5>
        <footer>
            <h5 style="text-indent: 200px;">Jakarta,
                <?php if ($valueShowPeminjamanAlat['tanggal'] != $valueShowPeminjamanAlat['sampai_dengan']) : ?>
                    <?= date('d',strtotime(' - 2 day', strtotime($valueShowPeminjamanAlat['tanggal']))); ?>
                    <?= $bulanForTTD; ?>
                    <?= $yearForTandaTanganCount; ?>
                <?php else : ?>
                    <?= date('d',strtotime(' - 2 day', strtotime($valueShowPeminjamanAlat['tanggal']))); ?>
                    <?= $bulanForTTD; ?>
                    <?= $yearForTandaTanganCount; ?>
               
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