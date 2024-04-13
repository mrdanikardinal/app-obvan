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
                <a href="<?= base_url("admin/kelola-pengguna") ?>" class="btn btn-warning my-2">Kembali</a>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url(); ?>admin/kelola-pengguna/update/<?= $getData['id'];?>">
                            <div class="mb-3">
                                <select name="setting" id="setting" class="form-select form-select-sm" aria-label="Small select example">
                                    <?php if ($getData['active'] == true) : ?>
                                        <option value="1" selected>Active</option>
                                        <option value="0">Not Active</option>
                                    <?php elseif ($getData['active'] == false) : ?>
                                        <option value="0" selected>Not Active</option>
                                        <option value="1">Active</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </main>

        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>