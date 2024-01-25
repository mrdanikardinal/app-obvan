<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <ul class="nav nav-tabs">
            <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=base_url()?>surat-tugas">Out Broadcast</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>surat-tugas/pemberi_pinjam">Pemberi Pinjam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>surat-tugas/penerima_pinjam">Penerima Pinjam</a>
                </li>
              
            </ul>

        </main>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>