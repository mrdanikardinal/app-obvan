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
                        <form id="formUpdateOutBroadcast" method="post" action="<?= base_url(); ?>out-broadcast/update/<?= $showObByid['id_ob']; ?>" class="needs-dinall">

                            <?= csrf_field(); ?>
                            <input type="hidden" class="form-control" id="idObGerForJs" placeholder="Nama Barang" value="<?= $showObByid['id_ob']; ?>">
                            <div class="row mb-3">
                                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select name="kategori" id="kategori" class="form-select form-select-sm" aria-label="Small select example">
                                        <?php foreach ($allKategori as $key => $valueKategori) : ?>
                                            <option value="<?= $valueKategori['id'] ?>" <?= $showObByid['id_kategori'] == $valueKategori['id'] ? 'selected' : null ?>>
                                                <?= $nomor++ . '. ' . $valueKategori['nama_kategori'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggalOB" class="col-sm-2 col-form-label">Tanggal</label>
                                <?php $convert = $showObByid['tanggal'];
                                $date = str_replace('/', '-', $convert);
                                $tanggalconvert = date('d/m/Y', strtotime($date));
                                ?>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Klik disini" id="tanggalOB" name="tanggalOB" value="<?= $tanggalconvert ?>">

                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="sampai_denganOB" class="col-sm-2 col-form-label">Sampai Dengan</label>
                                <?php $convert2 = $showObByid['sampai_dengan'];
                                $dateSampaiDengan = str_replace('/', '-', $convert2);
                                $sampaiDengan = date('d/m/Y', strtotime($dateSampaiDengan));

                                ?>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Klik disini" id="sampai_denganOB" name="sampai_denganOB" value="<?= $sampaiDengan; ?>">
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="acara_ob" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Acara" id="acara_ob" name="acara_ob" value="<?= $showObByid['acara']; ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasi_ob" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Lokasi" id="lokasi_ob" name="lokasi_ob" value="<?= $showObByid['lokasi']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="durasi_ob" class="col-sm-2 col-form-label">Durasi OB(ADM Hari)</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Durasi OB(Hari)" readonly="1" id="durasi_ob" name="durasi_ob" value="<?= $showObByid['durasi']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tp_ob" class="col-sm-2 col-form-label">Technical Producer</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Technical Producer(TP)/Kosongkan" id="tp_ob" name="tp_ob" value="<?= $showObByid['tp']; ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="td_ob" class="col-sm-2 col-form-label">Technical Director</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " placeholder="Technical Director(TD)/Kosongkan" id="td_ob" name="td_ob" value="<?= $showObByid['td']; ?>">
                                    <div class="text-danger">

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="asst_td" class="col-sm-2 col-form-label">Assistant.TD</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " placeholder="Assistant.TD/Kosongkan" id="asst_td" name="asst_td" value="<?= $showObByid['ass_td']; ?>">
                                    <div class="text-danger">

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="um_ob" class="col-sm-2 col-form-label">Um</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " placeholder="Unit Manager/Kosongkan" id="um_ob" name="um_ob" value="<?= $showObByid['um']; ?>">
                                    <div class="text-danger">

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Crew OB</label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <table class="table tableCrewDinasOb">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Search</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">NIP</th>
                                            <th class="text-center">NPWP</th>
                                            <th class="text-center"></th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        <?php $number = 1; ?>
                                        <?php foreach ($showDataCrewJoinUsers as $key => $valueJoinUser) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <input type="hidden" class="form-control" name="id_dinas_crew_ob[]" value="<?= $valueJoinUser['id_crew_ob']; ?>">
                                                    <td class="rownumberobEdit text-center">
                                                        <?= $number++; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary clickShowAllCrewEdit" data-bs-toggle="modal" data-bs-target="#dinallModalOBEdit"><i class="fa-solid fa-search"></i></button>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" readonly="true" class="form-control" name="namaEdit[]" value="<?= $valueJoinUser['fullname']; ?>" placeholder="Nama di isi dari search">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" readonly="true" class="form-control" name="nipEdit[]" value="<?= $valueJoinUser['nip']; ?>" placeholder="NIP di isi dari search">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" readonly="true" class="form-control" name="npwpEdit[]" value="<?= $valueJoinUser['npwp']; ?>" placeholder="NPWP di isi dari search">
                                                    </td>
                                                    <td><input type="hidden" name="idUserFromSelectModal[]" value="<?= $valueJoinUser['id_users']; ?>"></td>
                                                    <td class="text-center">
                                                        <button type="button"  class="btn btn-primary btnAddEditCrewDinasOb"><i class="fa-solid fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php foreach (array_slice($showDataCrewJoinUsers, 1) as $valueJoinUser) : ?>
                                            <?php if ($valueJoinUser != null) : ?>
                                                <tr>
                                                    <input type="hidden" class="form-control" name="id_dinas_crew_ob[]" value="<?= $valueJoinUser['id_crew_ob']; ?>">
                                                    <td class="rownumberobEdit text-center">
                                                        <?= $number++; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary clickShowAllCrewEdit" data-bs-toggle="modal" data-bs-target="#dinallModalOBEdit"><i class="fa-solid fa-search"></i></button>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" readonly="true" class="form-control" name="namaEdit[]" value="<?= $valueJoinUser['fullname']; ?>" placeholder="Nama di isi dari search">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" readonly="true" class="form-control" name="nipEdit[]" value="<?= $valueJoinUser['nip']; ?>" placeholder="NIP di isi dari search">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" readonly="true" class="form-control" name="npwpEdit[]" value="<?= $valueJoinUser['npwp']; ?>" placeholder="NIP di isi dari search">
                                                    </td>
                                                    <td><input type="hidden" name="idUserFromSelectModal[]" value="<?= $valueJoinUser['id_users']; ?>"></td>
                                                    <td class="text-center">
                                                        <button type="button"  class="btn btn-danger btnEditHpusCrewDinasOb" value="<?= $valueJoinUser['id_crew_ob']; ?>"><i class="fa-solid fa-trash"></i></button>
                                                    </td>

                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header text-center">
                                    Pengunaan Barang Out Broadcast(OB)
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <table class="table formTambahBarangOBUpdate">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Search</th>
                                                <th class="text-center">Nama Barang</th>
                                                <th class="text-center">Merk</th>
                                                <th class="text-center">S.N</th>
                                                <th class="text-center"></th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Aksi</th>

                                            </tr>
                                            <?php $number5 = 1; ?>
                                            <?php foreach ($showDataAlatJoinInv as $key => $valueJoinInv) : ?>
                                                <?php if ($key == 0) : ?>
                                                    <tr>
                                                        <input type="hidden" class="form-control" name="id_ob_from_alat[]" value="<?= $valueJoinInv['id_parent_alat_ob']; ?>">
                                                        <td class="rownumberBarangForOBUpdate text-center">
                                                            <?= $number5++; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-primary clickShowBarangInvEditUpdate" data-bs-toggle="modal" data-bs-target="#dinallModalBarangInvEditUpdate"><i class="fa-solid fa-search"></i></button>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" readonly="true" class="form-control" name="naBar[]" value="<?= $valueJoinInv['nama_barang']; ?>" placeholder="Nama Barang di isi dari search">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" readonly="true" class="form-control" name="merk[]" value="<?= $valueJoinInv['merk']; ?>" placeholder="Merk di isi dari search">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" readonly="true" class="form-control" name="sN[]" value="<?= $valueJoinInv['serial_number']; ?>" placeholder="SN di isi dari search">
                                                        </td>
                                                        <td class="text_center">
                                                            <input type="hidden" class="form-control" name="idBarangFromSelectModal[]" value="<?= $valueJoinInv['id_inv']; ?>">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" class="form-control" name="jumlahAlatOB[]" placeholder="Jumlah" value="<?= $valueJoinInv['jumlah']; ?>">
                                                        </td>
                                                        <td class="text-center">

                                                            <button type="button"  class="btn btn-primary btnAddFormForBarangOBUpdate"><i class="fa-solid fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                            <?php endforeach; ?>

                                            <?php foreach (array_slice($showDataAlatJoinInv, 1) as $valueJoinInv) : ?>
                                                <?php if ($valueJoinInv != null) : ?>

                                                    <tr>
                                                        <input type="hidden" class="form-control" name="id_ob_from_alat[]" value="<?= $valueJoinInv['id_parent_alat_ob']; ?>">
                                                        <td class="rownumberBarangForOBUpdate text-center">
                                                            <?= $number5++; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-primary clickShowBarangInvEditUpdate" data-bs-toggle="modal" data-bs-target="#dinallModalBarangInvEditUpdate"><i class="fa-solid fa-search"></i></button>

                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" readonly="true" class="form-control" name="naBar[]" value="<?= $valueJoinInv['nama_barang']; ?>" placeholder="Nama Barang di isi dari search">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" readonly="true" class="form-control" name="merk[]" value="<?= $valueJoinInv['merk']; ?>" placeholder="Merk di isi dari search">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" readonly="true" class="form-control" name="sN[]" value="<?= $valueJoinInv['serial_number']; ?>" placeholder="SN di isi dari search">
                                                        </td>
                                                        <td class="text_center">
                                                            <input type="hidden" class="form-control" name="idBarangFromSelectModal[]" value="<?= $valueJoinInv['id_inv']; ?>">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text"  class="form-control" name="jumlahAlatOB[]" placeholder="Jumlah" value="<?= $valueJoinInv['jumlah']; ?>">
                                                        </td>

                                                        <td class="text-center">

                                                            <button type="button"  class="btn btn-danger btnHapusFormBarangForOBUpdate" value="<?= $valueJoinInv['id_parent_alat_ob']; ?>"><i class="fa-solid fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>

        </main>
        <!-- Start Modal show all user-->
        <div class="modal fade" id="dinallModalOBEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pegawai OBVAN</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--  -->
                        <table id="tableOBShowEdit" class="table table-bordered table-hover text-center align-middle">
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
                                            <button type="button" required class="btn btn-success selectCrewOBEdit" data-id_crew="<?= $valueDataUsers['id']; ?>" data-fullname="<?= $valueDataUsers['fullname']; ?>" data-golongan="<?= $valueDataUsers['golongan']; ?>" data-nip="<?= $valueDataUsers["nip"] ?>" data-jab_fung="<?= $valueDataUsers['jab_fung'] ?>" data-golongan="<?= $valueDataUsers['golongan']; ?>" data-npwp="<?= $valueDataUsers['npwp'] ?>">
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
        <div class="modal fade" id="dinallModalBarangInvEditUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang Inventaris</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--  -->
                        <table id="tableInvShowForOBUpdate" class="table table-bordered table-hover text-center align-middle">
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
                                            <button type="button" required class="btn btn-success selectBarangForOBUpdate" data-id_alat="<?= $valueInv['id_inv']; ?>" data-barcode="<?= ($valueInv['serial_number'] != NULL) ? $valueInv['serial_number'] : $valueInv['kode_barcode']; ?>" data-barang="<?= $valueInv['nama_barang']; ?>" data-merk="<?= $valueInv['merk']; ?>" data-sn="<?= ($valueInv['serial_number'] != NULL) ? $valueInv['serial_number'] : '-'; ?>">
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
            $("#formUpdateOutBroadcast").validate({
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest("td"));
                },
                rules: {
                    'namaEdit[]': {
                        required: true
                    },
                    'nipEdit[]': {
                        required: true,
                        digits: true
                    },
                    'npwpEdit[]': {
                        required: true
                    },
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
                    },
                    'namaEditUpdate[]': {
                        required: true
                    },
                    'nipEditUpdate[]': {
                        required: true
                    },
                    'npwpEditUpdate[]': {
                        required: true,
                        digits: true
                    },
                    'naBarUpdate[]': {
                        required: true
                    },
                    'merkUpdate[]': {
                        required: true
                    },
                    'sNUpdate[]': {
                        required: true
                    },
                    'jumlahAlatOBUpdate[]': {
                        required: true,
                        digits: true
                    }

                },
                messages: {
                    'namaEdit[]': {
                        required: "nama di isi dari search !"
                    },
                    'nipEdit[]': {
                        required: "nip di isi dari search !",
                        digits: "isi dengan angka !"
                    },
                    'npwpEdit[]': {
                        required: "npwp di isi dari search !"
                    },
                    'naBar[]': {
                        required: "nama barang di isi dari search !",
                        
                    },
                    'merk[]': {
                        required: "merk di isi dari search !"
                    },
                    'sN[]': {
                        required: "SN di isi dari search !"
                    },
                    'jumlah[]': {
                        required: "jumlah tidak boleh kosong !",
                        digits: "isi dengan angka !"
                    },
                    'namaEditUpdate[]': {
                        required: "nama di isi dari search !"
                    },
                    'nipEditUpdate[]': {
                        required: "nip di isi dari search !",
                        digits: "isi dengan angka !"
                    },
                    'npwpEditUpdate[]': {
                        required: "npwp di isi dari search !"
                    },
                    'naBarUpdate[]': {
                        required: "nama barang di isi dari search !",
                        
                    },
                    'merkUpdate[]': {
                        required: "merk di isi dari search !"
                    },
                    'sNUpdate[]': {
                        required: "SN di isi dari search !"
                    },
                    'jumlahAlatOBUpdate[]': {
                        required: "jumlah tidak boleh kosong !",
                        digits: "isi dengan angka !"
                    }


                },
                errorElement: "em",




            });
        </script>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>