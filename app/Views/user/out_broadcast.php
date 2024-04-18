<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Docoment</title>
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
    <?php foreach ($showAllJoinsOBKategoriByIDOB as $key => $valueShowBroadcast) : ?>

        <?php
        date_default_timezone_set('Asia/Jakarta');
   
        $bulanForTandaTanganCount = date('m',strtotime(' - 2 day', strtotime($valueShowBroadcast['tanggal'])));
        $yearForTandaTanganCount = date('Y',strtotime(' - 2 day', strtotime($valueShowBroadcast['tanggal'])));

        $tanggal = date('d', strtotime($valueShowBroadcast['tanggal']));
        $bulan = date('F', strtotime($valueShowBroadcast['tanggal']));
        $tahun = date('Y', strtotime($valueShowBroadcast['tanggal']));
        
        // echo $tanggalBeforeConvert;

        $tanggalSampaiDengan = date('d', strtotime($valueShowBroadcast['sampai_dengan']));
        $bulanSampaiDengan = date('F', strtotime($valueShowBroadcast['sampai_dengan']));
        $tahunSampaiDengan = date('Y', strtotime($valueShowBroadcast['sampai_dengan']));

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
            <h4>No: <?= ($valueShowBroadcast['nomor_surat'] == NULL) ? $autoNomorSurat  : $valueShowBroadcast['nomor_surat']; ?>/ TK.02.02/1.4.3.2/<?= $bulanForTandaTanganCount; ?>/<?= $yearForTandaTanganCount; ?></h4>
            <h4>Hal: Daftar Nama Petugas</h5><br>
                <h4>Dengan ini kami sampaikan bahwa pelaksanaan :</h4>
                <pre>
<span> ACARA       : <?= $valueShowBroadcast["acara"]; ?></span> 
<span> TEMPAT      : <?= $valueShowBroadcast["lokasi"]; ?></span>
<span> KATEGORI    : <?= $valueShowBroadcast["nama_kategori"]; ?></span> 
<span> TANGGAL     : <?php if ($valueShowBroadcast['tanggal'] != $valueShowBroadcast['sampai_dengan']) : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?> S.D <?= $tanggalSampaiDengan; ?> <?= $bulan_indonesia_sampai_dengan; ?> <?= $tahunSampaiDengan; ?><?php else : ?><?= $tanggal; ?> <?= $bulan_indonesia; ?> <?= $tahun; ?><?php endif; ?></span>
</pre>
            <?php endforeach; ?>
            <h4>Satuan kerja Teknik Produksi Peralatan Luar Studio dengan ini memberi tugas dinas out broadcast kepada crew sebagai berikut:</h4>
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
                    <?php foreach ($showAllJoinsOBKategoriByIDOB as $key => $valueShowBroadcast) : ?>
                        <?php foreach ($allDataOutBroadcast as $j) : ?>
                            <?php if ($valueShowBroadcast['id_ob'] == $j['id_ob']) : ?>
                                <tr>
                                    <th style="width:30px"><?= $number++; ?></th>
                                    <td style="width:150px">
                                        <?php foreach ($allUsers as $k) : ?>
                                            <?php if ($j['id_users'] == $k['id']) : ?>
                                                <?= $k['fullname']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td style="width:130px">
                                        <?php foreach ($allUsers as $k) : ?>
                                            <?php if ($j['id_users'] == $k['id']) : ?>
                                                <?= $k['nip']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </td>
                                    <td style="width:80px">
                                        <?php foreach ($allUsers as $k) : ?>
                                            <?php if ($j['id_users'] == $k['id']) : ?>
                                                <?= $k['golongan']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </td>
                                    <td style="width:130px">
                                        <?php foreach ($allUsers as $k) : ?>
                                            <?php if ($j['id_users'] == $k['id']) : ?>
                                                <?= $k['npwp']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <footer>
            <h4 style="text-indent: 200px;">Jakarta,
                <?php if ($valueShowBroadcast['tanggal'] != $valueShowBroadcast['sampai_dengan']) : ?>
                    <?= date('d',strtotime(' - 2 day', strtotime($valueShowBroadcast['tanggal']))); ?>
                    <?= $bulanForTTD; ?>
                    <?= $yearForTandaTanganCount; ?>
                <?php else : ?>
                    <?= date('d',strtotime(' - 2 day', strtotime($valueShowBroadcast['tanggal']))); ?>
                    <?= $bulanForTTD; ?>
                    <?= $yearForTandaTanganCount; ?>
               
                <?php endif; ?>
            </h4>
                
            <h4 style="text-indent: 200px;">KETUA TIM TEKNOLOGI PERALATAN LUAR STUDIO</h4>
            <img src="img/ttdJansenWeb.png" alt="logo-tvri" width="100px" height="60px" style="text-align: center;">
            <h4 style="text-indent: 200px;">JANSEN STEPPEN JOU SINAGA</h4>
            <h4 style="text-indent: 200px;">198809232022211006</h4>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>