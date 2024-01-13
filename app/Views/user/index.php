<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Golongan</th>
                <th>Jab_Fung</th>
                <th>NPWP</th>
            </tr>
        </thead>

        <tbody>
            <?php $number = 1; ?>
            <?php foreach ($testing as $key => $valuePDF) : ?>
                <tr>
                    <th><?= $number++; ?></th>
                    <td><?= $valuePDF['fullname']; ?></td>
                    <td><?= $valuePDF['golongan']; ?></td>
                    <td><?= $valuePDF['jab_fung']; ?></td>
                    <td><?= $valuePDF['npwp']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</body>

</html>