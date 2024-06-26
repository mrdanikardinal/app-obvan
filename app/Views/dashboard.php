<?= $this->extend('layout/template_dashboard'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar') ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar') ?>
    <div id="layoutSidenav_content" >
        <main >
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            
                            <div class="card-body"><h5>Jumlah Akun User</h5></div>
                            <h3 class="text-center"><?=$countAllUsers?></h3>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><h5>Jumlah Barang Inventaris</h5></div>
                            <h3 class="text-center"><?=$countAllInv?></h3>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><h5>Jumlah Out Broadcast</h5></div>
                            <h3 class="text-center"><?=$countAllCrewObById?></h3>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?=base_url('surat-tugas');?>">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><h5>Jumlah Peminjaman Alat</h5></div>
                            <h3 class="text-center"><?=$countAllPeminjamanAlat?></h3>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?=base_url('surat-tugas');?>">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><h5>Jumlah Dinas Shifting</h5></div>
                            <h3 class="text-center"><?=$countAllDinasShifting?></h3>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?=base_url()?>surat-tugas/shifting/<?=user_id();?>">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><h5>Jumlah Dinas Lembur</h5></div>
                            <h3 class="text-center"><?=$countAllDinasLembur?></h3>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?=base_url()?>surat-tugas/lembur/<?=user_id();?>">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie me-1"></i>
                                Pie Chart Example
                            </div>
                            <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                    </div>
                </div> -->



            </div>
        </main>
        <?= $this->include('layout/footer') ?>
    </div>
</div>
<?= $this->endSection('content'); ?>