<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h5 class="mt-4">

                </h5>
                <a href="<?= base_url("admin/inventaris") ?>" class="btn btn-warning my-2">Kembali</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <?= $title ?>
                    </div>
                    <div class="card-body">
                    <?php 
                    $nomor=1;
                    $nomor1=1;
                    $nomor2=1;
                    $nomor3=1;
                    ?>
                        <form method="post" action="<?= base_url() ?>admin/inventaris/update/<?= $inventaris['id_inv']; ?>" class="needs-dinall">

                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
                                <div class="col-sm-10">
                                    
                                    <select id="jenis_barang" name="jenis_barang" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($jenisBarang as $key => $value) : ?>
                                            <option value="<?= $value['id_jns_barang'] ?>" <?= $inventaris['id_jns_barang'] == $value['id_jns_barang'] ? 'selected' : null ?>>
                                             <?= $nomor++.'. '. $value['nama_jns_barang'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Barang" id="nama_barang" name="nama_barang" value="<?= $inventaris['nama_barang'] ?>">
                                    <div class="text-danger">
                                        <?= validation_show_error('nama_barang'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Merk" id="merk" name="merk" value="<?= $inventaris['merk'] ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="type" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Type" id="type" name="type" value="<?= $inventaris['type'] ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="serial_number" class="col-sm-2 col-form-label">Serial Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " placeholder="Serial Number" id="serial_number" name="serial_number" value="<?= $inventaris['serial_number'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">

                                    <select name="lokasi" id="lokasi" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allLokasi as $key => $valueLokasi) : ?>
                                            <option value="<?= $valueLokasi['id_lokasi'] ?>" <?= $inventaris['id_lokasi'] == $valueLokasi['id_lokasi'] ? 'selected' : null ?>>
                                                <?=$nomor1++.'. '. $valueLokasi['nama_lokasi'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                                <div class="col-sm-10">
                                    <select name="kondisi" id="kondisi" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allKondisi as $key => $valueKondisi) : ?>
                                            <option value="<?= $valueKondisi['id_kondisi'] ?>" <?= $inventaris['id_kondisi'] == $valueKondisi['id_kondisi'] ? 'selected' : null ?>>
                                                <?=$nomor2++.'. '.  $valueKondisi['nama_kondisi'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">

                                    <select name="status" id="status" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allStatus as $key => $valueStatus) : ?>
                                            <option value="<?= $valueStatus['id_status'] ?>" <?= $inventaris['id_status'] == $valueStatus['id_status'] ? 'selected' : null ?>>
                                                <?=$nomor3++.'. '.  $valueStatus['nama_status'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tahun_pengadaan" class="col-sm-2 col-form-label">Tahun Pengadaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tahun Pengadaan" id="tahun_pengadaan" name="tahun_pengadaan" value="<?= $inventaris['thn_pengadaan']; ?>">
                                    <div class="text-danger">
                                        <?= validation_show_error('tahun_pengadaan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Keterangan (Optional)" id="keterangan" name="keterangan" value="<?= $inventaris['keterangan']; ?>">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>

        </main>
        <script type="text/javascript">
                (() => {
                'use strict'

                const forms = document.querySelectorAll('.needs-dinall')

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        //check validation green and red
                        form.classList.add('was-validated')
                    }, false)
                })
            })();
        </script>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>