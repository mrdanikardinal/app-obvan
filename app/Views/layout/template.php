<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Apps-Obvan | Pusat | Jakarta</title>
  <!-- JQuery -->
  <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <!-- End-JQuery -->

  <!-- validation JQuery -->
  <script src="/js/validation.js"></script>
  <!-- Endvalidation JQuery -->

  <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
  <!-- End-Sweetalert -->
  <!--datatables-css -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <!--end-datatables-css -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  


</head>

<body class="sb-nav-fixed">
  <?= $this->renderSection('content'); ?>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Mode Exit</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah <?=  strtoupper(user()->username); ?> yakin, akan keluar apps-obvan ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-danger">Logout</button> -->
          <a class="btn btn-danger" href="<?= base_url('logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="/js/scripts.js"></script> -->
  <script src="<?= base_url("/js/bootstrap.bundle.min.js"); ?>"></script>
  <script src="<?= base_url("/js/scripts.js"); ?>"></script>
  <!-- //datatables-js -->
  <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
  <script src="<?= base_url("/js/jquery.dataTables.min.js"); ?>"></script>
  <script src="<?= base_url("/js/dataTables.bootstrap5.min.js"); ?>"></script>
  <script src="<?= base_url("/js/dinall.js"); ?>"></script>
  <!-- //end-datatable-js -->
  <!-- SBAdmin -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script> -->
  <!-- EndSBAdmin -->


</body>

</html>