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
                    <?php if (session()->getFlashdata('pesanHapus')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('pesanHapus'); ?>
                        </div>
                    <?php endif; ?>
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
                        <form id="formAddDinasShifting" method="post" action="<?= base_url();?>dinas-shifting/update/<?= $AllReadGetIdDinasShift['id_dinas_shifting']; ?>">
                            <?= csrf_field(); ?>
                            <input type="hidden" class="form-control" id="idObGerForJs" value="<?= $AllReadGetIdDinasShift['id_dinas_shifting']; ?>">
                            <div class="row mb-3">
                                <label for="kategoriDinasShifLemburEdit" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">

                                    <select name="kategoriDinasShifLemburEdit" id="kategoriDinasShifLemburEdit" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allNamaDinasShitfLembur as $key => $valueKategori) : ?>
                                            <option value="<?= $valueKategori['id_kategori_dinas_crew'] ?>" <?= $valueKategori['id_kategori_dinas_crew'] == $AllReadGetIdDinasShift['id_kategori_dinas_crew'] ? 'selected' : null ?>><?= $nomor3++ . '. ' . $valueKategori['nama_kategori_dinas_crew'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kategoriDinasShifEdit" class="col-sm-2 col-form-label">Shift</label>
                                <div class="col-sm-10">

                                    <select name="kategoriDinasShifEdit" id="kategoriDinasShifEdit" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allKategoriDinasShif as $key => $valueKategori) : ?>
                                            <option value="<?= $valueKategori['id_kategori_shif'] ?>" <?= $valueKategori['id_kategori_shif'] == $AllReadGetIdDinasShift['id_kategori_dinas_shif'] ? 'selected' : null ?>><?= $nomor++ . '. ' . $valueKategori['nama_kategori_shif'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggalDinasEdit" class="col-sm-2 col-form-label">Tanggal</label>
                                <?php $convert = $AllReadGetIdDinasShift['tanggal'];
                                $date = str_replace('/', '-', $convert);
                                $tanggalconvert = date('d/m/Y', strtotime($date));
                                ?>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Klik disini" id="tanggalDinasEdit" name="tanggalDinasEdit" value="<?= $tanggalconvert; ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="namaAcaraDinasShifEdit" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <select name="namaAcaraDinasShifEdit" id="namaAcaraDinasShifEdit" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allNamaAcaraShif as $key => $valueNamaAcara) : ?>
                                            <option value="<?= $valueNamaAcara['id_acara_shift'] ?>" <?= $valueNamaAcara['id_acara_shift'] == $AllReadGetIdDinasShift['id_acara'] ? 'selected' : null ?>><?= $nomor2++ . '. ' . $valueNamaAcara['nama_acara_shift'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasiDinasShifEdit" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Lokasi" id="lokasiDinasShifEdit" name="lokasiDinasShifEdit" value="<?= $AllReadGetIdDinasShift['lokasi']; ?>">
                                </div>
                            </div>


                            <div class="row mb-3">

                                <div class="col-sm-10 offset-sm-2">
                                    <table class="table formTambahDinasShifEdit">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Search</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">NIP</th>
                                            <th class="text-center">NPWP</th>
                                            <th class="text-center"></th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        <?php $number3 = 2; ?>
                                        <?php foreach ($showDataCrewDinasShiftJoinUsers as $key => $valueJoinUser) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <input type="hidden" class="form-control" name="id_crew_dinas_shift[]" value="<?= $valueJoinUser['id_crew_shifting']; ?>">
                                                    <td class="rownumberDinasShifEdit text-center">
                                                        1
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary clickShowAllCrewForDinasShifEdit" data-bs-toggle="modal" data-bs-target="#dinallModalDinasShifEdit"><i class="fa-solid fa-search"></i></button>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" required class="form-control" name="nama[]" placeholder="Nama" value="<?= $valueJoinUser['fullname']; ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" required class="form-control" name="nip[]" placeholder="NIP" value="<?= $valueJoinUser['nip']; ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" required class="form-control" name="npwp[]" placeholder="NPWP" value="<?= $valueJoinUser['npwp']; ?>">
                                                    </td>
                                                    <td class="text-center"><input type="hidden" name="id_userSelectEdit[]" value="<?= $valueJoinUser['id_users']; ?>"></td>
                                                    <td class="text-center">
                                                        <button type="button" required class="btn btn-primary btnAddForDinasShifEdit"><i class="fa-solid fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php foreach (array_slice($showDataCrewDinasShiftJoinUsers, 1) as $valueJoinUser) : ?>
                                            <?php if ($valueJoinUser != null) : ?>
                                                <tr>
                                                    <input type="hidden" class="form-control" name="id_crew_dinas_shift[]" value="<?= $valueJoinUser['id_crew_shifting']; ?>">
                                                    <td class="rownumberDinasShifEdit text-center">
                                                        <?= $number3++ ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary clickShowAllCrewForDinasShifEdit" data-bs-toggle="modal" data-bs-target="#dinallModalDinasShifEdit"><i class="fa-solid fa-search"></i></button>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" required class="form-control" name="nama[]" placeholder="Nama" value="<?= $valueJoinUser['fullname']; ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" required class="form-control" name="nip[]" placeholder="NIP" value="<?= $valueJoinUser['nip']; ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" required class="form-control" name="npwp[]" placeholder="NPWP" value="<?= $valueJoinUser['npwp']; ?>">
                                                    </td>
                                                    <td class="text-center"><input type="hidden" name="id_userSelectEdit[]" value="<?= $valueJoinUser['id_users']; ?>"></td>
                                                    <td class="text-center">
                                                        <button type="button" required class="btn btn-danger btnHapusForDinasShifEdit" value="<?= $valueJoinUser['id_crew_shifting']; ?>"><i class="fa-solid fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
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
        <div class="modal fade" id="dinallModalDinasShifEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <button type="button" required class="btn btn-success selectCrewDinasShifEdit" data-id_crew="<?= $valueDataUsers['id']; ?>" data-fullname="<?= $valueDataUsers['fullname']; ?>" data-golongan="<?= $valueDataUsers['golongan']; ?>" data-nip="<?= $valueDataUsers['nip']; ?>" data-jab_fung="<?= $valueDataUsers['jab_fung'] ?>" data-golongan="<?= $valueDataUsers['golongan']; ?>" data-npwp="<?= $valueDataUsers['npwp'] ?>">
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
                const forms = document.querySelectorAll('.needs-validation')

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
            $("#formAdd").validate({
                errorPlacement: function($error, $element) {
                    // $error.appendTo($element.closest("td").css({"color": "red"}));
                    $error.appendTo($element.closest("td"));
                },
                rules: {
                    'naBar[]': {
                        required: true
                    },
                    'merk[]': {
                        required: true
                    },
                    'sN[]': {
                        required: true
                    },
                    'jumlah[]': {
                        required: true,
                        digits: true
                    }

                },
                messages: {
                    'naBar[]': {
                        required: "nama harus di isi !"
                    },
                    'merk[]': {
                        required: "jika merk kosong beri tanda - !"
                    },
                    'sN[]': {
                        required: "jika serial number kosong beri tanda - !"
                    },
                    'jumlah[]': {
                        required: "jumlah harus di isi !",
                        digits: "isi dengan angka !"

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