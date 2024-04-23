<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <a href="<?= base_url("admin/kelola-pengguna") ?>" class="btn btn-primary my-2">
                    <i class="fa-solid fa-arrows-rotate"></i> Refresh
                </a>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('pesanGagal')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('pesanGagal'); ?>
                    </div>
                <?php endif; ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Admin Kelola Pengguna
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="ob-tab" data-bs-toggle="tab" data-bs-target="#aktivasi" type="button" role="tab" aria-controls="aktivasi" aria-selected="true">Aktivasi</button>

                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pemberi-tab" data-bs-toggle="tab" data-bs-target="#resetPassword" type="button" role="tab" aria-controls="resetPassword" aria-selected="true">Reset Password</button>

                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="user-level" data-bs-toggle="tab" data-bs-target="#userLevel" type="button" role="tab" aria-controls="userLevel" aria-selected="true">User Role</button>

                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane show active" id="aktivasi">
                                <h3>Aktivasi</h3>
                                <table id="dinallTableKelolaAkun" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                                    <thead>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIP</th>
                                        <th>Status Aktivasi</th>
                                        <th>Setting</th>
                                    </thead>
                                    <?php
                                    $number2 = 1;
                                    $aktif = 'Active';
                                    $noAktif = 'Not active';
                                    ?>
                                    <input type="hidden" class="test" value="">
                                    <tbody>
                                        <?php foreach ($allGetDataUsers as $key => $valueDataUsers) : ?>
                                            <?php if ($valueDataUsers['nip'] != 199303172022211009) : ?>
                                                <tr>
                                                    <th><?= $number2++; ?></th>
                                                    <td class="text-start"><?= $valueDataUsers['username']; ?></td>
                                                    <td class="text-start"><?= $valueDataUsers['fullname']; ?></td>
                                                    <td><?= $valueDataUsers['nip']; ?></td>
                                                    <?php if ($valueDataUsers['active'] == true) : ?>
                                                        <td>
                                                            <div class="badge bg-success text-wrap" style="width: 8rem; height: 2rem">
                                                                <h6>
                                                                    <?= $aktif; ?>
                                                                </h6>
                                                            </div>
                                                        </td>
                                                    <?php elseif ($valueDataUsers['active']  == false) : ?>
                                                        <td>
                                                            <div class="badge bg-danger text-wrap" style="width: 8rem; height: 2rem">
                                                                <h6>
                                                                    <?= $noAktif; ?>
                                                                </h6>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/kelola-pengguna/setting/<?= $valueDataUsers['id']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Settings</a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="resetPassword">
                                <h3>Reset Password</h3>
                                <!-- isi table dan tombol -->
                                <table id="dinallTableResetPassword" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                                    <thead>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIP</th>
                                        <th>Reset Password</th>
                                    </thead>
                                    <?php $number3 = 1; ?>
                                    <input type="hidden" class="test" value="">
                                    <tbody>
                                        <?php foreach ($allGetDataUsers as $key => $valueDataUsers) : ?>
                                            <?php if ($valueDataUsers['nip'] != 199303172022211009) : ?>
                                                <tr>
                                                    <th><?= $number3++; ?></th>
                                                    <td class="text-start"><?= $valueDataUsers['username']; ?></td>
                                                    <td class="text-start"><?= $valueDataUsers['fullname']; ?></td>
                                                    <td><?= $valueDataUsers['nip']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/kelola-pengguna/reset-password/<?= $valueDataUsers['id']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Settings</a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="userLevel">
                                <h3>User Role Next Fitur</h3>
                                <!-- isi table dan tombol -->
                                <table id="dinallTableUserLevel" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                                    <thead>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIP</th>
                                        <!-- <th>User Level</th> -->
                                        <th>Role Next Fitur</th>
                                    </thead>
                                    <?php $number3 = 1; ?>
                                    <input type="hidden" class="test" value="">
                                    <tbody>
                                        <?php foreach ($allGetDataUsers as $key => $valueDataUsers) : ?>
                                            <?php if ($valueDataUsers['nip'] != 199303172022211009) : ?>
                                                <tr>
                                                    <th><?= $number3++; ?></th>
                                                    <td class="text-start"><?= $valueDataUsers['username']; ?></td>
                                                    <td class="text-start"><?= $valueDataUsers['fullname']; ?></td>
                                                    <td><?= $valueDataUsers['nip']; ?></td>
                                                    <!-- <td><?=in_groups('user')?></td> -->
                                                    <td>
                                                        <!-- <a href="<?= base_url() ?>admin/kelola-pengguna/reset-password/<?= $valueDataUsers['id']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Next Fitur</a> -->
                                                        <a href="" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Next Fitur</a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>