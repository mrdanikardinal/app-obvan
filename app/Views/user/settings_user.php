<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h5 class="mt-4">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('passwordLamaSalah')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('passwordLamaSalah'); ?>
                        </div>
                    <?php endif; ?>
                </h5>
                <a href="<?= base_url() ?>user/setting_user/<?= user_id(); ?>" class="btn btn-primary my-2">
                    <i class="fa-solid fa-arrows-rotate"></i> Refresh
                </a>
                <div class="card mb-4">

                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Pengguna
                    </div>
                    <div class="card-body">

                        <form method="post" action="<?= base_url(); ?>change-password/<?= user_id(); ?>">
                            <!-- <form method="post" action="<?= base_url(); ?>change-password"> -->
                            <!-- <div class="mb-3">
                                <label for="InputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div> -->
                            <div class="mb-3">
                                <label for="password_lama" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" id="password_lama" name="password_lama">
                                <div class="text-danger">
                                    <?= validation_show_error('password_lama'); ?>
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