<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <style>
            .error {
                color: var(--bs-danger);
            }
        </style>
        <main>
            <div class="container-fluid px-4">
                <h5 class="mt-4">

                </h5>
                <a href="<?= base_url("dinas-shifting") ?>" class="btn btn-warning my-2">Kembali</a>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <?= $title ?>
                    </div>
                    <div class="card-body">
                        <?php
                        $nomor = 1;
                        $nomor2 = 1;
                        $nomor3 = 1;

                        ?>
                        <form id="formAddDinasShifting" method="post" action="<?= base_url("/dinas-shifting/save"); ?>" class="needs-dinall">

                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <label for="kategoriDinasCrewDinas" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">

                                    <select name="kategoriDinasCrewDinas" id="kategoriDinasCrewDinas" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allKategoriDinasShifLembur as $key => $valueKategoriShifLembur) : ?>
                                            <option value="<?= $valueKategoriShifLembur['id_kategori_dinas_crew'] ?>"><?= $nomor3++ . '. ' . $valueKategoriShifLembur['nama_kategori_dinas_crew'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kategoriDinasShif" class="col-sm-2 col-form-label">Shift</label>
                                <div class="col-sm-10">

                                    <select name="kategoriDinasShif" id="kategoriDinasShif" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allKategoriDinasShif as $key => $valueKategori) : ?>
                                            <option value="<?= $valueKategori['id_kategori_shif'] ?>"><?= $nomor++ . '. ' . $valueKategori['nama_kategori_shif'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggalDinas" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Klik disini" id="tanggalDinas" name="tanggalDinas" value="<?= old('tanggalDinas'); ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="namaAcaraDinasShif" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <select name="namaAcaraDinasShif" id="namaAcaraDinasShif" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allNamaAcaraShif as $key => $valueNamaAcara) : ?>
                                            <option value="<?= $valueNamaAcara['id_acara_shift'] ?>"><?= $nomor2++ . '. ' . $valueNamaAcara['nama_acara_shift'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Lokasi" id="lokasi" name="lokasi" value="<?= old('lokasi'); ?>">
                                    <div class="text-danger">
                                        <?= validation_show_error('lokasi'); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">

                                <div class="col-sm-10 offset-sm-2">
                                    <table class="table formTambahDinasShif">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Search</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">NIP</th>
                                            <th class="text-center">NPWP</th>
                                            <th class="text-center"></th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        <tr>
                                            <td class="rownumberDinasShif text-center">
                                                1
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary clickShowAllCrewForDinasShif" data-bs-toggle="modal" data-bs-target="#dinallModalDinasShif"><i class="fa-solid fa-search"></i></button>
                                            </td>
                                            <td class="text-center">
                                                <input type="text" readonly="true" class="form-control" name="nama[]" placeholder="Nama di isi dari search">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" readonly="true" class="form-control" name="nip[]" placeholder="NIP di isi dari search">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" readonly="true" class="form-control" name="npwp[]" placeholder="NPWP di isi dari search">
                                            </td>
                                            <td class="text-center"><input type="hidden" name="id_user[]"></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btnAddForDinasShif"><i class="fa-solid fa-plus"></i></button>
                                            </td>

                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>

        </main>
        <!-- Start Modal show all user-->
        <div class="modal fade" id="dinallModalDinasShif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pegawai OBVAN</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--  -->
                        <table id="tableOBShow" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Crew</th>
                                    <th>Golongan</th>
                                    <th>Jabatan Fungsional</th>
                                    <th>NIP</th>
                                    <th>NPWP</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($allDataUsers as $key => $valueDataUsers) : ?>
                                    <tr>
                                        <td><?= $number++; ?></td>
                                        <td><?= $valueDataUsers['fullname']; ?></td>
                                        <td><?= $valueDataUsers['golongan']; ?></td>
                                        <td><?= $valueDataUsers['jab_fung']; ?></td>
                                        <td><?= $valueDataUsers['nip']; ?></td>
                                        <td><?= $valueDataUsers['npwp']; ?></td>
                                        <td>
                                            <button type="button" required class="btn btn-success selectCrewDinasShif" data-id_crew="<?= $valueDataUsers['id']; ?>" data-fullname="<?= $valueDataUsers['fullname']; ?>" data-golongan="<?= $valueDataUsers['golongan']; ?>" data-nip="<?= $valueDataUsers['nip']; ?>" data-jab_fung="<?= $valueDataUsers['jab_fung'] ?>" data-golongan="<?= $valueDataUsers['golongan']; ?>" data-npwp="<?= $valueDataUsers['npwp'] ?>">
                                                <i class="fa-solid fa-check"></i></button>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>
                            </tbody>

                        </table>

                        <!--  -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal show all user-->
        <script type="text/javascript">
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll('.needs-dinall')

                // Loop over them and prevent submission
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        //check validation green and red
                        form.classList.add('was-validated')
                    }, false)
                })
            })()

            //validation ok javascript
            $("#formAddDinasShifting").validate({
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest("td"));
                },
                rules: {
                    'nama[]': {
                        required: true
                    },
                    'nip[]': {
                        required: true
                    },
                    'npwp[]': {
                        required: true
                    }


                },
                messages: {
                    'nama[]': {
                        required: "nama di isi dari search !"
                    },
                    'nip[]': {
                        required: "nip di isi dari search !"
                    },
                    'npwp[]': {
                        required: "npwp di isi dari search !"
                    }



                },
                errorElement: "em",




            });

            // jQuery.validator.addMethod("validDate", function(value, element) {
            //         return this.optional(element) || moment(value, "DD/MM/YYYY").isValid();
            //     }, "Please enter a valid date in the format DD/MM/YYYY");
        </script>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>