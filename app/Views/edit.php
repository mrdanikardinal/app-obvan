<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar') ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar') ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"> Update Form Peminjaman Alat</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">

                        <form action="/peminjaman_alat/update/<?= $dataPinjam['id_pinjam']; ?>" method="post">

                            <?= csrf_field(); ?>
                            <input type="hidden" value="" name="numberSession" id="getCountNumber">
                            <input type="hidden" class="form-control" id="idGetForJs" placeholder="Nama Barang" value="<?= $dataPinjam['id_pinjam']; ?>">
                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <?php $convert = $dataPinjam['tanggal'];
                                $date = str_replace('/', '-', $convert);
                                $tanggalconvert = date('d/m/Y', strtotime($date));
                                ?>


                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tanggal" id="tanggal" name="tanggal" value="<?= $tanggalconvert; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-sm-10 offset-sm-2">
                                    <table class="table formTambahEdit">
                                        
                                        <tr>

                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Barang</th>
                                            <th class="text-center">Merk</th>
                                            <th class="text-center">S.N</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        <?php $number2 = 1; ?>
                                        <?php foreach ($allDataParentMerk as $key => $j) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <input type="hidden" class="form-control" name="idParentMerk[]" value="<?= $j['id']; ?>">
                                                    <td class="rownumber">
                                                        <?= $number2++; ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="naBarEdit[]" value="<?= $j['nama_barang']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="merkEdit[]" value="<?= $j['merk']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sNEdit[]" value="<?= $j['serial_number']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="jumlahEdit[]" value="<?= $j['jumlah']; ?>">
                                                    </td>
                                                    <td>
                                                        <select name="checkAlat[]" class="form-select form-select-sm" aria-label="Small select example">
                                                            <option hidden>Pengembalian</option>
                                                            <option value="1" <?= ($j['status'] == true) ? 'selected' : null ?>>
                                                                <span>YES</span>
                                                            </option>
                                                            <option value="0" <?= ($j['status'] == false) ? 'selected' : null ?>>
                                                                <span>NO</span>

                                                            </option>

                                                        </select>

                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btnAddFormEdit"><i class="fa-solid fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php foreach (array_slice($allDataParentMerk, 1) as $i) : ?>
                                            <?php if ($i != null) : ?>
                                                <tr>
                                                    <input type="hidden" class="form-control" name="idParentMerk[]" placeholder="Nama Barang" value="<?= $i['id']; ?>">
                                                    <td class="rownumber">
                                                        <?= $number2++; ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="naBarEdit[]" placeholder="Nama Barang" value="<?= $i['nama_barang']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="merkEdit[]" placeholder="Merk" value="<?= $i['merk']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sNEdit[]" placeholder="Serial Number" value="<?= $i['serial_number']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="jumlahEdit[]" placeholder="Jumlah" value="<?= $i['jumlah']; ?>">
                                                    </td>
                                                    <td>
                                                        <select name="checkAlat[]" class="form-select form-select-sm" aria-label="Small select example">

                                                            <option value="1" <?= ($i['status'] == true) ? 'selected' : null ?>>
                                                                <span>YES</span>
                                                            </option>
                                                            <option value="0" <?= ($i['status'] == false) ? 'selected' : null ?>>
                                                                <span>NO</span>

                                                            </option>

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btnHapusFormEdit" value="<?= $i['id']; ?>"><i class="fa-solid fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>


                                    </table>
                                </div>


                            </div>

                            <div class="row mb-3">
                                <label for="acara" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Acara" id="acara" name="acara" value="<?= $dataPinjam['acara']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tempat" id="tempat" name="tempat" value="<?= $dataPinjam['tempat']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="durasi_pinjam" class="col-sm-2 col-form-label">Durasi Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Durasi Pinjam" id="durasi_pinjam" name="durasi_pinjam" value="<?= $dataPinjam['durasi_pinjam']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Peminjam" id="nama_peminjam" name="nama_peminjam" value="<?= $dataPinjam['nama_peminjam']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_pemberi" class="col-sm-2 col-form-label">Nama Pemberi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Pemberi" id="nama_pemberi" name="nama_pemberi" value="<?= $dataPinjam['nama_pemberi']; ?>">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>



            </div>
        </main>

        <?= $this->include('layout/footer'); ?>


    </div>
</div>
<?= $this->endSection('content'); ?>