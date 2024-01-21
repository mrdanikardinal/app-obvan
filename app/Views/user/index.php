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

    <h2>HTML Table</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Golongan</th>
            <th>Divisi</th>
            <th>Jabatan Fungsional</th>
            <th>NPWP</th>
        </tr>
        <?php $number = 1; ?>
        <?php foreach ($testing as $key => $valuePDF) : ?>
            <tr>
                <th><?= $number++; ?></th>
                <td><?= $valuePDF['fullname']; ?></td>
                <td><?= $valuePDF['golongan']; ?></td>
                <td><?= $valuePDF['divisi']; ?></td>
                <td><?= $valuePDF['jab_fung']; ?></td>
                <td><?= $valuePDF['npwp']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>