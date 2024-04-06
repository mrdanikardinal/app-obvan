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
                <a href="<?= base_url("admin/status-dinas-lembur-shifting") ?>" class="btn btn-warning my-2">Kembali</a>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url(); ?>admin/status-dinas-lembur-shifting/kategori_update/<?=$getIdKategori['id_kategori_dinas_crew'];?>">
                            <div class="mb-3">
                                <label for="nama_kategori_edit" class="form-label">Nama Kategori</label>
                                <input type="tesx" class="form-control" id="nama_kategori_edit" name="nama_kategori_edit" value="<?=$getIdKategori['nama_kategori_dinas_crew'];?>">
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