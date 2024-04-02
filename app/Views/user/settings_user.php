<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <a href="<?= base_url() ?>user/setting_user/<?= user_id(); ?>" class="btn btn-primary my-2">
                    <i class="fa-solid fa-arrows-rotate"></i> Refresh
                </a>
                <div class="card mb-4">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Pengguna
                    </div>
                    <div class="card-body">

                        <form method="post" action="<?= base_url(); ?>change-password/<?= user_id(); ?>">
                            <!-- <div class="mb-3">
                                <label for="InputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div> -->
                            <div class="mb-3">
                                <label for="InputPassword1" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" id="InputPassword1" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="InputPassword1" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="InputPassword1" name="Bpassword">
                            </div>
                            <div class="mb-3">
                                <label for="ConfirmInputPassword1" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" id="ConfirmInputPassword1" name="KBpassword">
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