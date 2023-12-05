<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
  
    <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>