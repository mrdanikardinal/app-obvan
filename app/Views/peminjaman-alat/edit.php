<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar') ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar') ?>
    <div id="layoutSidenav_content">
        <style>
            .error {
                color: var(--bs-danger);
            }
        </style>
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"> Update Form Peminjaman Alat</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">

                        <form id="formMerkUpdate" action="<?= base_url() ?>peminjaman-alat/update/<?= $dataPinjam['id_pinjam']; ?>" method="post">

                            <?= csrf_field(); ?>
                            <input type="hidden" value="" name="numberSession" id="getCountNumber">
                            <input type="hidden" class="form-control" id="idGetForJs" placeholder="Nama Barang" value="<?= $dataPinjam['id_pinjam']; ?>">
                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <?php $convert = $dataPinjam['tanggal'];
                                $date = str_replace('/', '-', $convert);
                                $tanggalconvert = date('d/m/Y', strtotime($date));
                                ?>


                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tanggal" id="tanggal" name="tanggal" value="<?= $tanggalconvert; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sampai_dengan" class="col-sm-2 col-form-label">Sampai Dengan</label>
                                <?php $convertSampaiDengan = $dataPinjam['sampai_dengan'];
                                $dateSampaiDengan = str_replace('/', '-', $convertSampaiDengan);
                                $tanggalconvertSampaiDengan = date('d/m/Y', strtotime($dateSampaiDengan));
                                ?>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Klik disini" id="sampai_dengan" name="sampai_dengan" value="<?= $tanggalconvertSampaiDengan; ?>">

                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-sm-10 offset-sm-2">
                                    <table class="table formTambahEdit">

                                        <tr>

                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Barang</th>
                                            <th class="text-center">Merk</th>
                                            <th class="text-center">S.N</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        <?php $number2 = 1; ?>
                                        <?php foreach ($allDataParentMerk as $key => $j) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <input type="hidden" class="form-control" name="idParentMerk[]" value="<?= $j['id']; ?>">
                                                    <td class="rownumber">
                                                        <?= $number2++; ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="naBarEdit[]" value="<?= $j['nama_barang']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="merkEdit[]" value="<?= $j['merk']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sNEdit[]" value="<?= $j['serial_number']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="jumlahEdit[]" value="<?= $j['jumlah']; ?>">
                                                    </td>
                                                    <td>
                                                        <select name="checkAlat[]" class="myselect
                                                        
                                                        
                                                        form-select form-select-sm" aria-label="Small select example">
                                                            <option hidden>Pengembalian</option>
                                                            <option value="1" <?= ($j['status'] == true) ? 'selected' : null ?>>
                                                                <span>YES</span>
                                                            </option>
                                                            <option value="0" <?= ($j['status'] == false) ? 'selected' : null ?>>
                                                                <span>NO</span>

                                                            </option>

                                                        </select>

                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btnAddFormEdit"><i class="fa-solid fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php foreach (array_slice($allDataParentMerk, 1) as $i) : ?>
                                            <?php if ($i != null) : ?>
                                                <tr>
                                                    <input type="hidden" class="form-control" name="idParentMerk[]" placeholder="Nama Barang" value="<?= $i['id']; ?>">
                                                    <td class="rownumber">
                                                        <?= $number2++; ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="naBarEdit[]" placeholder="Nama Barang" value="<?= $i['nama_barang']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="merkEdit[]" placeholder="Merk" value="<?= $i['merk']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sNEdit[]" placeholder="Serial Number" value="<?= $i['serial_number']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="jumlahEdit[]" placeholder="Jumlah" value="<?= $i['jumlah']; ?>">
                                                    </td>
                                                    <td>
                                                        <select name="checkAlat[]" class="myselect form-select form-select-sm" aria-label="Small select example">

                                                            <option value="1" <?= ($i['status'] == true) ? 'selected' : null ?>>
                                                                <span>YES</span>
                                                            </option>
                                                            <option value="0" <?= ($i['status'] == false) ? 'selected' : null ?>>
                                                                <span>NO</span>

                                                            </option>

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btnHapusFormEdit" value="<?= $i['id']; ?>"><i class="fa-solid fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>


                                    </table>
                                </div>


                            </div>

                            <div class="row mb-3">
                                <label for="acara" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Acara" id="acara" name="acara" value="<?= $dataPinjam['acara']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tempat" id="tempat" name="tempat" value="<?= $dataPinjam['tempat']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="durasi_pinjam" class="col-sm-2 col-form-label">Durasi Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Durasi Pinjam" id="durasi_pinjam" name="durasi_pinjam" value="<?= $dataPinjam['durasi_pinjam']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Peminjam" id="nama_peminjam" name="nama_peminjam" value="<?= $dataPinjam['nama_peminjam']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="noHPPeminjam" class="col-sm-2 col-form-label">NO.HP Peminjam</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="NO.HP Peminjam" id="noHPPeminjam" name="noHPPeminjam" value="<?= $dataPinjam['no_hp_peminjam']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3" id="endInputPeminjaman">
                                <label for="nama_pemberi" class="col-sm-2 col-form-label">Nama Pemberi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Pemberi" id="nama_pemberi" name="nama_pemberi" value="<?= $dataPinjam['nama_pemberi']; ?>">
                                </div>
                            </div>
                            <!-- start pengembalian  -->

                            <!-- end pengembalian -->


                            <div class="row mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>



            </div>

        </main>
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

                        form.classList.add('was-validated')
                    }, false)
                })
            })()

            //validation ok javascript
            $("#formMerkUpdate").validate({
                errorPlacement: function($error, $element) {
                    // $error.appendTo($element.closest("td").css({"color": "red"}));
                    $error.appendTo($element.closest("td"));
                },
                rules: {
                    'naBarEditUpdate[]': {
                        required: true
                    },
                    'merkEditUpdate[]': {
                        required: true
                    },
                    'sNEditUpdate[]': {
                        required: true
                    },
                    'jumlahEditUpdate[]': {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    'naBarEditUpdate[]': {
                        required: "nama baru harus di isi !"
                    },
                    'merkEditUpdate[]': {
                        required: "merk baru harus di isi !"
                    },
                    'sNEditUpdate[]': {
                        required: "serial baru number harus di isi !"
                    },
                    'jumlahEditUpdate[]': {
                        required: "jumlah baru harus di isi !",
                        digits: "isi dengan angka !"

                    }

                },
                errorElement: "em",



            });

            // jQuery.validator.addMethod("validDate", function(value, element) {
            //         return this.optional(element) || moment(value, "DD/MM/YYYY").isValid();
            //     }, "Please enter a valid date in the format DD/MM/YYYY");
            //start function add pengembalian

            function addPengembalian() {
                let addHTML = `<div id="showAddPengembalian" class="card mb-3">
    <h5 class="card-header text-center">Pengembalian</h5>
    <div class="card-body">
        <div class="row mb-3">
            <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
            <div class="col-sm-10">
             
                <input type="text" class="form-control" placeholder="Klik disini" id="tanggal_kembali" name="tanggal_kembali">
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama_penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nama Penerima" id="nama_penerima" name="nama_penerima">
            </div>
        </div>
        <div class="row mb-3">
            <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Catatan" id="catatan" name="catatan">
            </div>
        </div>
        </div>
    </div>`;
                $('#endInputPeminjaman').empty().append(addHTML);
            }


            $(function() {
                let arr = [];
                let arr2 = [];
                // start check status default
                $(".myselect").each(function() {
                    let statusDefault = $(this).val();
                    let angka = parseInt(statusDefault);
                    arr.push(angka);
                });
                let sumStatus = 0;
                for (let e of arr) {
                    sumStatus += e;
                }
                if (sumStatus !== 0) {
                    addPengembalian();
                    $("#tanggal_kembali").datepicker({
                        dateFormat: 'dd/mm/yy',
                        timespicker: false
                    });

                }
                // end check status default
                console.log(sumStatus);
                // changed

                $(".myselect").on("change", function() {
                    let isiStatus = $(this).val();
                    // console.log(i);
                    // let newName=parseInt(isiStatus);
                    let newName=0;


                    let indexOfNameToReplace = arr.indexOf(newName);

                    if (indexOfNameToReplace > -1) {
                        arr[indexOfNameToReplace] = parseInt(isiStatus);
                        console.log(`New array is YES: ${arr}`);
                        // New array is: [X1,X2,X3,X4,X11,X6,X7,X8,X9,X10]
                    } else {
                        console.log(`No guest found by the given name: "${isiStatus}"`);

                    }
                    console.log(arr);

                    if (sumStatus !== 0) {
                        addPengembalian();
                        $("#tanggal_kembali").datepicker({
                            dateFormat: 'dd/mm/yy',
                            timespicker: false
                        });

                    } else {
                        $('#showAddPengembalian').remove();

                    }

                });



                // inputs
                // let currentNames = ["X1", "X2", "X3", "X4", "X5", "X6", "X7", "X8", "X9", "X10"]

                // this variable will have the result of the first prompt() call (new guest)
                // let newName = "X11";

                // this variable will have the result of the second prompt() call (guest to replace the new guest with)
                // let nameToReplace = "X5";

                // implementation
                // let indexOfNameToReplace = currentNames.indexOf(nameToReplace);
                // if (indexOfNameToReplace > -1) {
                //     currentNames[indexOfNameToReplace] = newName;
                //     console.log(`New array is: ${currentNames}`);
                // New array is: [X1,X2,X3,X4,X11,X6,X7,X8,X9,X10]
                // } else {
                //     console.log(`No guest found by the given name: "${nameToReplace}"`)
                // }




                // if (sumStatus2 >= 1) {
                //     addPengembalian();
                //     $("#tanggal_kembali").datepicker({
                //         dateFormat: 'dd/mm/yy',
                //         timespicker: false
                //     });
                // } else {
                //     $('#showAddPengembalian').remove();

                // }


                // $('.myselect').change(function() {
                //     console.log($(this).val());
                //     let isiStatus = $(this).val();

                //     if (isiStatus === '1') {
                //         addPengembalian();
                //         $("#tanggal_kembali").datepicker({
                //             dateFormat: 'dd/mm/yy',
                //             timespicker: false
                //         });
                //     } else {
                //         $('#showAddPengembalian').remove();

                //     }
                // });


            });



            //end function add pengembalian
        </script>
        <?= $this->include('layout/footer'); ?>


    </div>
</div>
<?= $this->endSection('content'); ?>