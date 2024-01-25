<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>Surat Tugas</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Golongan</th>
            <th>Divisi</th>
            <th>Jabatan Fungsional</th>
            <th>NPWP</th>
        </tr>
        <?php $number = 1;$number2=1;?>
        <?php foreach ($testing as $key => $valuePDF) : ?>
            <tr>
                <th><?= $number++; ?></th>
                <td><?= $valuePDF['fullname']; ?></td>
                <td><?= $valuePDF['golongan']; ?></td>
                <td><?= $valuePDF['divisi']; ?></td>
                <td><?= $valuePDF['jab_fung']; ?></td>
                <td><?= $valuePDF['npwp']; ?></td>
            </tr>

            <?php foreach ($dataBarangDipinjam as $j) : ?>
                <?php if ($valuePDF['id_pinjam'] == $j['id_pinjaman_alat']) : ?>
                    <tr>
                        <th><?= $number2++; ?></th>
                        <td class="text-center"><?= $j['nama_barang']; ?></td>
                        <td class="text-center"><?= $j['merk']; ?></td>
                        <td class="text-center"><?= $j['serial_number']; ?></td>
                        <td class="text-center"><?= $j['jumlah']; ?></td>
                        <td class="text-center">
                            <?php if ($j['status'] == true) : ?>
                                <button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i>


                                </button>
                            <?php elseif ($j['status'] == false) : ?>
                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-circle-exclamation"></i></button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

        <?php endforeach; ?>
    </table>

</body>

</html>