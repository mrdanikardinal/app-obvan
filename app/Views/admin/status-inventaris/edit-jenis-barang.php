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
                <a href="<?= base_url("admin/status-inventaris") ?>" class="btn btn-warning my-2">Kembali</a>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url(); ?>admin/status-inventaris/update_jenis_barang/<?=$getDataIdJenisBarang['id_jns_barang'];?>">
                            <div class="mb-3">
                                <label for="nama_jenis_barang" class="form-label">Nama Jenis Barang</label>
                                <input type="tesx" class="form-control" id="nama_jenis_barang" name="nama_jenis_barang" value="<?=$getDataIdJenisBarang['nama_jns_barang']?>" placeholder="tidak boleh kosong">
                                <div class="text-danger">
                                    <?= validation_show_error('nama_jenis_barang'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </main>

        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>