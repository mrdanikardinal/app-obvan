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
                </h5>
                <a href="<?= base_url() ?>user/setting-data-user" class="btn btn-primary my-2">
                    <i class="fa-solid fa-arrows-rotate"></i> Refresh
                </a>
                <div class="card mb-4">

                    <div class="card-header">
                        <i class="fas fa-user fa-fw"></i>
                       <?= 'Data'.' '.$dataUser['fullname'];?>
                    </div>
                    <div class="card-body">

                        <form method="post" action="<?= base_url(); ?>user/setting-data-user/<?= user_id(); ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $dataUser['username'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $dataUser['email'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $dataUser['fullname'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= $dataUser['nip'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="golongan" class="form-label">Golongan</label>
                                <input type="text" class="form-control" id="golongan" name="golongan" value="<?= $dataUser['golongan'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="jab_fung" class="form-label">Jabatan Fungsional</label>
                                <input type="text" class="form-control" id="jab_fung" name="jab_fung" value="<?= $dataUser['jab_fung'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $dataUser['npwp'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="divisi" class="form-label">Divisi</label>
                                <input type="text" class="form-control" id="divisi" name="divisi" value="<?= $dataUser['divisi'];?>">
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