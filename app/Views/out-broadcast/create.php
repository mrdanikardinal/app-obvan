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
                <a href="<?= base_url("out-broadcast") ?>" class="btn btn-warning my-2">Kembali</a>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <?= $title ?>
                    </div>
                    <div class="card-body">
                        <?php
                        $nomor = 1;
                        ?>
                        <form id="formAddOutBroadcast" method="post" action="<?= base_url("/out-broadcast/save"); ?>">

                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <!-- <input type="text" required class="form-control" placeholder="Kategori" id="kategori" name="kategori" value="<?= old('kategori'); ?>"> -->
                                    <select name="kategori" id="kategori" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allKategori as $key => $valueKategori) : ?>
                                            <option value="<?= $valueKategori['id'] ?>"><?= $nomor++ . '. ' . $valueKategori['nama_kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggalOB" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Klik disini" id="tanggalOB" name="tanggalOB" value="<?= old('tanggalOB'); ?>">

                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="sampai_denganOB" class="col-sm-2 col-form-label">Sampai Dengan</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Klik disini" id="sampai_denganOB" name="sampai_denganOB" value="<?= old('sampai_denganOB'); ?>">
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="acara_ob" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Acara" id="acara_ob" name="acara_ob" value="<?= old('acara_ob'); ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasi_ob" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Lokasi" id="lokasi_ob" name="lokasi_ob" value="<?= old('lokasi_ob'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="durasi_ob" class="col-sm-2 col-form-label">Durasi OB(ADM Hari)</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Durasi OB(Hari)" id="durasi_ob" name="durasi_ob" value="<?= old('durasi_ob'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tp_ob" class="col-sm-2 col-form-label">Technical Producer</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Technical Producer(TP)" id="tp_ob" name="tp_ob" value="<?= old('tp_ob'); ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="td_ob" class="col-sm-2 col-form-label">Technical Director</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control " placeholder="Technical Director(TD)" id="td_ob" name="td_ob" value="<?= old('td_ob'); ?>">
                                    <div class="text-danger">

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="asst_td" class="col-sm-2 col-form-label">Assistant.TD</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control " placeholder="Assistant.TD" id="asst_td" name="asst_td" value="<?= old('asst_td'); ?>">
                                    <div class="text-danger">

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="um_ob" class="col-sm-2 col-form-label">Um</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control " placeholder="Unit Manager" id="um_ob" name="um_ob" value="<?= old('um_ob'); ?>">
                                    <div class="text-danger">

                                    </div>
                                </div>
                            </div>
           
                            <div class="row mb-3">

                                <div class="col-sm-10 offset-sm-2">
                                    <table class="table formTambahOB">
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
                                            <td class="rownumberob text-center">
                                                1
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary clickShowAllCrew" data-bs-toggle="modal" data-bs-target="#dinallModalOB"><i class="fa-solid fa-search"></i></button>
                                            </td>
                                            <td class="text-center">
                                                <input type="text" required class="form-control" name="nama[]" placeholder="Nama">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" required class="form-control" name="nip[]" placeholder="NIP">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" required class="form-control" name="npwp[]" placeholder="NPWP">
                                            </td>
                                            <td class="text-center"><input type="hidden" name="id_user[]"></td>
                                            <td class="text-center">
                                                <button type="button" required class="btn btn-primary btnAddFormOB"><i class="fa-solid fa-plus"></i></button>
                                            </td>

                                        </tr>
                                    </table>
                                </div>




                            </div>

                            <div class="card mb-4">
                                <div class="card-header text-center">
                                    Pengunaan Barang Out Broadcast(OB)
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <table class="table formTambahBarangOB">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Search</th>
                                                <th class="text-center">Nama Barang</th>
                                                <th class="text-center">Merk</th>
                                                <th class="text-center">S.N</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center"></th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                            <tr>
                                                <td class="rownumberBarangForOB text-center">
                                                    1
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary clickShowBarangInv" data-bs-toggle="modal" data-bs-target="#dinallModalBarangInv"><i class="fa-solid fa-search"></i></button>

                                                </td>
                                                <td class="text-center">
                                                    <input type="text" required class="form-control" name="naBar[]" placeholder="Nama Barang">
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" required class="form-control" name="merk[]" placeholder="merk">
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" required class="form-control" name="sN[]" placeholder="Serial Number">
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" required class="form-control" name="jumlahAlatOB[]" placeholder="Jumlah" value="1">
                                                </td>
                                                <td class="text-center"><input type="hidden" name="id_peralatan[]"></td>
                                                <td class="text-center">
                                                    <!-- <button type="button" required class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i></button> -->
                                                    <button type="button" required class="btn btn-primary btnAddFormForBarangOB"><i class="fa-solid fa-plus"></i></button>
                                                </td>
                                            </tr>
                                        </table>



                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>

        </main>
        <!-- Start Modal show all user-->
        <div class="modal fade" id="dinallModalOB" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pegawai OBVAN</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--  -->
                        <table id="tableOBShow" class="table table-bordered table-hover text-center align-middle">
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
                                            <button type="button" required class="btn btn-success selectCrewOB" data-id_crew="<?= $valueDataUsers['id']; ?>" data-fullname="<?= $valueDataUsers['fullname']; ?>" data-golongan="<?= $valueDataUsers['golongan']; ?>" data-nip="<?= $valueDataUsers['nip']; ?>" data-jab_fung="<?= $valueDataUsers['jab_fung'] ?>" data-golongan="<?= $valueDataUsers['golongan']; ?>" data-npwp="<?= $valueDataUsers['npwp'] ?>">
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

        <!-- Start Modal show all Barang Inventaris-->
        <div class="modal fade" id="dinallModalBarangInv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang Inventaris</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--  -->
                        <table id="tableInvShowForOB" class="table table-bordered table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barcode</th>
                                    <th>Jenis barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Serial Number</th>
                                    <th>Lokasi</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $numberBarang = 1; ?>
                                <?php foreach ($allDataInv as $key => $valueInv) : ?>
                                    <tr>
                                        <td><?= $numberBarang++; ?></td>
                                        <?php if ($valueInv['serial_number'] != NULL) : ?>
                                            <td class="text-center">
                                                <div>
                                                    <?= '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($valueInv['serial_number'], $generator::TYPE_CODE_128)) . '">'; ?>
                                                </div>
                                                <span><?= $valueInv['serial_number']; ?></span>
                                            </td>
                                        <?php elseif ($valueInv['serial_number'] == NULL) : ?>
                                            <td class="text-center">
                                                <div>
                                                    <?= '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($valueInv['kode_barcode'], $generator::TYPE_CODE_128)) . '">'; ?>
                                                </div>
                                                <span><?= $valueInv['kode_barcode']; ?></span>

                                            </td>
                                        <?php endif; ?>

                                        <td><?= $valueInv['nama_jns_barang']; ?></td>
                                        <td><?= $valueInv['nama_barang']; ?></td>
                                        <td><?= $valueInv['merk']; ?></td>
                                        <td>
                                            <?php if ($valueInv['serial_number'] != NULL) : ?>
                                                <?= $valueInv['serial_number']; ?>
                                            <?php elseif ($valueInv['serial_number'] == NULL) : ?>
                                                <h4><?= '-'; ?></h4>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $valueInv['nama_lokasi']; ?></td>
                                        <td>
                                            <button type="button" required class="btn btn-success selectBarangForOB" data-id_alat="<?= $valueInv['id_inv']; ?>" data-barcode="<?= ($valueInv['serial_number'] != NULL) ? $valueInv['serial_number'] : $valueInv['kode_barcode']; ?>" data-barang="<?= $valueInv['nama_barang']; ?>" data-merk="<?= $valueInv['merk']; ?>" data-sn="<?= ($valueInv['serial_number'] != NULL) ? $valueInv['serial_number'] : '-'; ?>">
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
        <!-- End Modal show all Barang Inventaris -->
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