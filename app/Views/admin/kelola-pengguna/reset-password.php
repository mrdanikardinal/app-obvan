<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h5 class="mt-4">
                    <?php if (session()->getFlashdata('pesanGagal')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('pesanGagal'); ?>
                        </div>
                    <?php endif; ?>
                </h5>
        
                <div class="card mb-4">

                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Change Password <?= $getIdUser['fullname']; ?>
                    </div>
                  
                    
                    <div class="card-body">

                        <form method="post" action="<?= base_url(); ?>admin/kelola-pengguna/reset-password/update/<?= $getIdUser['id']; ?>">

                            <div class="mb-3">
                                <label for="token" class="form-label">Token</label>
                                <input type="text" class="form-control" id="token" name="token">
                                <div class="text-danger">
                                        <?= validation_show_error('token'); ?>
                                    </div>
                            </div>
                            <div class="mb-3">
                                <label for="password_baru" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="password_baru" name="password_baru">
                                <div class="text-danger">
                                        <?= validation_show_error('password_baru'); ?>
                                    </div>
                            </div>
                            <div class="mb-3">
                                <label for="password_konfirmasi" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" id="password_konfirmasi" name="password_konfirmasi">
                                <div class="text-danger">
                                        <?= validation_show_error('password_konfirmasi'); ?>
                                    </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
        </main>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>