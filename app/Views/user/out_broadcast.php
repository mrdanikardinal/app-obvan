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
            width: 100%;

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
            /* height: 20px;
            line-height:10px; */
        }

        span {
            word-spacing: 10px;
        }
    </style>
</head>

<body>

    <header>
        <img src="img/tvri.png" alt="logo-tvri" width="100px" height="50px">
    </header>
    <nav>
        <h4>TEKNOLOGI PERALATAN LUAR STUDIO</h4>
        <h5>No: 44/TK.02.02 /1.4.3.2/II/2024</h5>
        <h5>Hal: Daftar Nama Petugas</h5>
        <div class="container px-4">
            <h5>Dengan ini kami sampaikan bahwa pelaksanaan :</h6>
                <br>
                <?php foreach ($showAllJoinsOBKategori as $key => $valueShowBroadcast) : ?>
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('d', strtotime($valueShowBroadcast['tanggal']));
                    $bulan = date('F', strtotime($valueShowBroadcast['tanggal']));
                    $tahun = date('Y', strtotime($valueShowBroadcast['tanggal']));

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

                    // Mengganti nama bulan dalam bahasa Inggris dengan nama bulan dalam bahasa Indonesia
                    $bulan_indonesia = $bulan_huruf[$bulan];
                    $bulan_indonesia_sampai_dengan = $bulan_huruf[$bulanSampaiDengan];
                    ?>

                  <span>ACARA</span> <span style="text-indent: 200px;"> : <?= $valueShowBroadcast['acara']; ?></span> <br>
                    TEMPAT<span> : <?= $valueShowBroadcast['lokasi']; ?></span>
                    <h6>HUNTING/SURVAY/TGL</h6> 
                    <h6>CHECKING/SETTING/TGL</h6>
                    <h6>OB/LIVE/TGL</h6> 
                    <h6> :
                        <?php if ($valueShowBroadcast['tanggal'] != $valueShowBroadcast['sampai_dengan']) : ?>
                            <?= $tanggal; ?>
                            <?= $bulan_indonesia; ?>
                            <?= $tahun; ?> S.D
                            <?= $tanggalSampaiDengan; ?>
                            <?= $bulan_indonesia_sampai_dengan; ?>
                            <?= $tahunSampaiDengan; ?>
                        <?php else : ?>
                            <?= $tanggal; ?>
                            <?= $bulan_indonesia; ?>
                            <?= $tahun; ?>
                        <?php endif; ?>
                    </span>
                <?php endforeach; ?>

                <h5>Satuan kerja Teknik Produksi Peralatan Luar Studio dengan ini memberi tugas kerabat kerja sebagai berikut:</h6>
        </div>
    </nav>
    <section>
        <table>
            <!-- <table cellpadding="5"> -->
            <table cellpadding="5" style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="width:7%">NO</th>
                        <th>NAMA</th>
                        <th>NIP</th>
                        <th>GOLONGAN</th>
                        <th>NPWP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 1; ?>
                    <?php foreach ($showAllJoinsOBKategori as $key => $valueShowBroadcast) : ?>
                        <?php foreach ($allDataOutBroadcast as $j) : ?>
                            <?php if ($valueShowBroadcast['id_ob'] == $j['id_ob']) : ?>
                                <tr>
                                    <th class="text-center" style="width:7%"><?= $number++; ?></th>
                                    <td class="text-center">
                                        <?php foreach ($allUsers as $k) : ?>
                                            <?php if ($j['id_users'] == $k['id']) : ?>
                                                <?= $k['fullname']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($allUsers as $k) : ?>
                                            <?php if ($j['id_users'] == $k['id']) : ?>
                                                <?= $k['nip']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </td>
                                    <td>
                                        <?php foreach ($allUsers as $k) : ?>
                                            <?php if ($j['id_users'] == $k['id']) : ?>
                                                <?= $k['golongan']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </td>
                                    <td>
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
                <!-- <tfoot>
                    <tr>
                        <td>Sum</td>
                        <td>$180</td>
                    </tr>
                </tfoot> -->
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

        <!-- <table cellspacing="0" cellpadding="0" style="text-align: right ; width: 50%;">
            <thead>
                <tr>
                    <td markdown="span" style="padding: 0.5vw; border: none; max-width:100%; max-height:10%; background: transparent;">
                        <h5>KETUA TIM TEKNOLOGI PERALATAN LUAR STUDIO</h5>
                    </td>
                </tr>
                <tr>
                    <td markdown="span" style="padding: 0.5vw; border: none; max-width:100%; max-height:10%; background: transparent;">
                        <img src="img/tvri.png" alt="logo-tvri" width="100px" height="50px" style="text-align: right">
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td markdown="span" style="padding: 0.5vw; border: none; max-width:100%; max-height:10%; background: transparent;">
                        <h5>JANSEN STEPPEN JOU SINAGA</h5>

                    </td>
                </tr>

                <tr>
                    <td markdown="span" style="padding: 0.5vw; border: none; max-width:100%; max-height:10%; background: transparent;">
                        <h5>198809232022211006</h5>
                    </td>
                </tr>

            </tbody>
        </table> -->
        <h5 style="text-indent: 200px;">KETUA TIM TEKNOLOGI PERALATAN LUAR STUDIO</h5>
        <img src="img/ttdJansen.png" alt="logo-tvri" width="300px" height="100px" style="text-align: center;">
        <h5 style="text-indent: 200px;">JANSEN STEPPEN JOU SINAGA</h5>
        <h5 style="text-indent: 200px;">198809232022211006</h5>
        <!-- <h5 style="text-align: right">KETUA TIM TEKNOLOGI PERALATAN LUAR STUDIO</h5>
        <img src="img/tvri.png" alt="logo-tvri" width="100px" height="50px" style="text-align: right">

        <h5 style="text-align: right">JANSEN STEPPEN JOU SINAGA</h5>
        <h5 style="text-align: right">198809232022211006</h5> -->

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>