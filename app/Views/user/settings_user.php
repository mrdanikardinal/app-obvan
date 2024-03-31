<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
            <a href="<?= base_url() ?>user/setting_user/<?=user_id();?>" class="btn btn-primary my-2">
                    <i class="fa-solid fa-arrows-rotate"></i> Refresh
                </a>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Pengguna
                    </div>
                    <div class="card-body">

                    </div>
                </div>
        </main>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>