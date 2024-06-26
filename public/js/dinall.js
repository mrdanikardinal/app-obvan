//Strat Peminjaman=================================================================================
$(document).ready(function () {

    $('#dinallTable').DataTable({

        // scrollX: true,

        // scrollCollapse: true,
        // scrollY: '70vh'

        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true
    },

    );

});

$(document).ready(function () {
    $('#tableInputBarang').DataTable({

        scrollY: true
    });
});
let startDate;
let endDate;
$(document).ready(function () {


    $(function () {
        $("#tanggal").datepicker({
            dateFormat: 'dd/mm/yy',
            timespicker: false

        });


        $("#sampai_dengan").datepicker({
            dateFormat: 'dd/mm/yy',
            timespicker: false


        });



    });

});



$('#tanggal').change(function () {

    startDate = $(this).datepicker('getDate');
    $('#sampai_dengan').datepicker('option', 'minDate', startDate);
    let checkNulltanggal = $('#tanggal').val();
    let checkNullsampai_dengan = $('#sampai_dengan').val();
    if (checkNulltanggal != '' && checkNullsampai_dengan != '') {
        countDays();
    }

});


$('#sampai_dengan').change(function () {

    endDate = $(this).datepicker('getDate');
    $('#tanggal').datepicker('option', 'maxDate', endDate);
    let checkNulltanggal = $('#tanggal').val();
    let checkNullsampai_dengan = $('#sampai_dengan').val();
    if (checkNulltanggal != '' && checkNullsampai_dengan != '') {
        countDays();
    }


});



function countDays() {

    let start = $("#tanggal").datepicker("getDate");
    let end = $("#sampai_dengan").datepicker("getDate");
    days = (end - start) / (1000 * 60 * 60 * 24);
    let plusSatu = days + 1;
    // console.log(Math.round(plusSatu));

    $("#durasi_pinjam").addClass('bg-warning-subtle');
    $('#durasi_pinjam').prop('readonly', true);
    $("#durasi_pinjam").val(Math.round(plusSatu) + ' Hari');
}


//validation from javascript
//start add number dinamis & add element table row
$(function () {
    // Add Row


    $(".btnAddForm").click(function () {
        addnewrow();
        renumberRows();
    });

    // Remove Row
    $("body").delegate('.btnHapusForm', 'click', function () {
        $(this).parent().parent().remove();
        renumberRows();
        // $(this).parents('tr').remove();
    });


});
// function addnewrow() {
//     let tr = `<tr>
//         <td class="rownumber">

//         </td>
//         <td class="search">
//         <button type="button" required class="btn btn-primary searchBarang" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-search"></i></button>

//         </td>
//         <td>
//             <input type="text" required id="dinall-js-${$('.rownumber').last().text()}" class="form-control" name="naBar[]" placeholder="Nama Barang">
//         </td>
//         <td>
//             <input type="text" required class="form-control" name="merk[]" placeholder="Merk">
//         </td>
//         <td>
//             <input type="text" required class="form-control" name="sN[]" placeholder="Serial Number">
//         </td>
//         <td>
//             <input type="text" required id="dinall-js-jumlah-${$('.rownumber').last().text()}" class="form-control" name="jumlah[]" placeholder="Jumlah">
//         </td>
//         <td>
//             <button type="button" required class="btn btn-danger btnHapusForm"><i class="fa-solid fa-trash"></i></button>
//         </td>
//     </tr>`;
//     $('.formTambah').append(tr);
// };
function addnewrow() {
    let tr = `<tr>
        <td class="rownumber text-center">
        </td>
        <td class="text-center">
        <button type="button" class="btn btn-primary searchBarang" data-bs-toggle="modal" data-bs-target="#dinallModal"><i class="fa-solid fa-search"></i></button>
        </td>
        <td class="text-center">
            <input type="text" required id="dinall-js-${$('.rownumber').last().text()}" class="form-control" name="naBar[]" placeholder="Nama Barang">
        </td>
        <td class="text-center">
            <input type="text" required class="form-control" name="merk[]" placeholder="Merk">
        </td>
        <td class="text-center">
            <input type="text" required class="form-control" name="sN[]" placeholder="Serial Number">
        </td>
        <td class="text-center">
            <input type="text" required id="dinall-js-jumlah-${$('.rownumber').last().text()}" class="form-control" name="jumlah[]" placeholder="Jumlah" value="1">
        </td>
        <td class="text-center">
            <button type="button" required class="btn btn-danger btnHapusForm"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.formTambah').append(tr);
};

function renumberRows() {
    $(".formTambah").children().children().each(function (i, v) {

        $(this).find(".rownumber").text(i);
        //   $(this).find(".rownumber").val(i + 1); index i dimulai dari 0
        // console.log(i);
    });
}
// end add number dinamis & add element table row


//start add number dinamis & add element table row
$(function () {
    // Add Row

    $(".btnAddFormEdit").click(function () {
        addnewrowEdit();
        renumberRowsEdit();
    });

    // Remove Row parent merk
    $("body").delegate('.btnHapusFormEdit', 'click', function (e) {
        e.preventDefault();
        let a = $("#idGetForJs").val();
        let id = $(this).val();
        if (id !== '') {
            Swal.fire({
                title: 'Yakin Hapus Data Ini?',

                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        // url: "/peminjaman_alat/edit/PJM-0001/"+id,
                        url: `/peminjaman-alat/edit/${a}/${id}`,
                        type: "POST",
                        success: function (response) {


                            Swal.fire(
                                'Berhasil!',
                                'Data sudah dihapus.',
                                'success'
                            );

                        }
                    });
                    $(this).parent().parent().remove();
                    renumberRowsEdit();
                    window.location.reload(true);
                }
            })

        }
        else {
            $(this).parent().parent().remove();
            renumberRowsEdit();

        }

    });

});




function addnewrowEdit() {
    let tr = `<tr>
        <td class="rownumber text-center">
        <?= $number2++; ?>
        </td>
        <td class="text-center">
        <button type="button" class="btn btn-primary searchBarangEdit" data-bs-toggle="modal" data-bs-target="#dinallModalEdit"><i class="fa-solid fa-search"></i></button>
        </td>
        <td class="text-center">
            <input type="text" required id="dinall-js-${$('.rownumber').last().text()}" class="form-control" name="naBarEditUpdate[]" placeholder="Nama Barang">
        </td>
        <td class="text-center">
            <input type="text" required class="form-control" name="merkEditUpdate[]" placeholder="Merk">
        </td>
        <td class="text-center">
            <input type="text" required class="form-control" name="sNEditUpdate[]" placeholder="Serial Number">
        </td>
        <td class="text-center">
            <input type="text" required class="form-control" name="jumlahEditUpdate[]" placeholder="Jumlah" value="1">
        </td>
        <td class="text-center">
        <p class="text-success">baru..</p>
        </td>
        <td class="text-center">
            <button type="button" required class="btn btn-danger btnHapusFormEdit"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.formTambahEdit').append(tr);
};

function renumberRowsEdit() {
    $(".formTambahEdit").children().children().each(function (i, v) {
        $(this).find(".rownumber").text(i);
    });
}
// end add number dinamis & add element table row

//confirm ok
$('.hapusPjm').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});



// Fungsi untuk menginisialisasi DataTable setelah modal dimuat

//==============skrip berhasil untuk cari product
// $(document).ready(function () {
//     let previousEventTarget;
//      $(document).on('click', '.searchBarang', function (event) {

//         let previousEvent;
//         previousEventTarget = $(event.target);
//         previousEvent = $(event);
//         kirimCari(previousEventTarget);

//     });


//     function kirimCari($this) {
//         let table = $('#tableInvShow').DataTable();
//         $('#tableInvShow tbody').on('click', 'tr', function () {
//             rowData = table.row(this).data();
//             console.log(rowData[1]);
//             $this.parent().next().children().val(rowData[1]);
//             $this.parent().next().next().children().val(rowData[2]);
//             $this.parent().next().next().next().children().val(rowData[3]);
//             $this = $($this.target);
//             $('#dinallModal').modal('hide');

//         });
//     }


// });
//============== end skrip berhasil untuk cari product




$(document).ready(function () {
    $('#dinallModal').on('shown.bs.modal', function () {
        $('.dataTables_filter input').focus();
    });
    $(document).on('click', '.searchBarang', function (event) {
        // Menyimpan elemen yang diklik untuk digunakan nanti
        let $currentSearchBarang = $(event.currentTarget);
        let allSearchBarang = $('.searchBarang');

        // Mengatur event handler untuk elemen .select menggunakan event delegation
        $(document).off('click', '.select').on('click', '.select', function () {
            let idInv = $(this).data('id');
            let barcode = $(this).data('barcode');
            let barang = $(this).data('barang');
            let merk = $(this).data('merk');
            let sn = $(this).data('sn');

            // Mengisi nilai input pada elemen .searchBarang
            $currentSearchBarang.parent().next().children().val(barang);
            $currentSearchBarang.parent().next().next().children().val(merk);
            $currentSearchBarang.parent().next().next().next().children().val(sn);
            let currentIndex = allSearchBarang.index($currentSearchBarang);
            let isLastElement = currentIndex === allSearchBarang.length - 1;

            if (isLastElement) {
                // Jika iya, tambahkan baris baru dan nomori ulang
                // addnewrow();
                renumberRows();
            }
            $('#dinallModal').modal('hide');

        });
    });
});

$(document).ready(function () {
    $('#dinallModalEdit').on('shown.bs.modal', function () {
        $('.dataTables_filter input').focus();
    });
    $(document).on('click', '.searchBarangEdit', function (event) {
        // Menyimpan elemen yang diklik untuk digunakan nanti
        let $currentSearchBarang = $(event.currentTarget);
        let allSearchBarang = $('.searchBarangEdit');

        // Mengatur event handler untuk elemen .select menggunakan event delegation
        $(document).off('click', '.selectEdit').on('click', '.selectEdit', function () {
            let idInv = $(this).data('id');
            let barcode = $(this).data('barcode');
            let barang = $(this).data('barang');
            let merk = $(this).data('merk');
            let sn = $(this).data('sn');

            // Mengisi nilai input pada elemen .searchBarang
            $currentSearchBarang.parent().next().children().val(barang);
            $currentSearchBarang.parent().next().next().children().val(merk);
            $currentSearchBarang.parent().next().next().next().children().val(sn);
            let currentIndex = allSearchBarang.index($currentSearchBarang);
            let isLastElement = currentIndex === allSearchBarang.length - 1;

            if (isLastElement) {
                // Jika iya, tambahkan baris baru dan nomori ulang
                // addnewrow();
                renumberRows();
            }
            $('#dinallModalEdit').modal('hide');

        });
    });
});


//event cari barang yang digunakan
// $(document).on('click', '.searchBarang', function (event) {
//     // Menyimpan elemen yang diklik untuk digunakan nanti
//     let $currentSearchBarang = $(event.currentTarget);

//     // Mengatur event handler untuk elemen .select menggunakan event delegation
//     $(document).off('click', '.select').on('click', '.select', function () {
//         let idInv = $(this).data('id');
//         let barcode = $(this).data('barcode');
//         let barang = $(this).data('barang');
//         let merk = $(this).data('merk');
//         let sn = $(this).data('sn');

//         // Mengisi nilai input pada elemen .searchBarang
//         $currentSearchBarang.parent().next().children().val(barang);
//         $currentSearchBarang.parent().next().next().children().val(merk);
//         $currentSearchBarang.parent().next().next().next().children().val(sn);

//         // Menutup modal atau melakukan tindakan lain sesuai kebutuhan
//         $('#dinallModal').modal('hide');
//     });
// });
// end event cari barang yang digunakan


//End Peminjaman=================================================================================
//Start Inventaris===============================================================================
$(document).ready(function () {

    $('#inventarisTable').DataTable({

        // scrollX: true,

        // scrollCollapse: true,
        // scrollY: '70vh'
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true

    },
    );

});


$(document).ready(function () {
    $('#tableInvShow').DataTable({

    });
});


$('.hapusInv').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});

//End Inventaris=================================================================================


//Start OutBroadcast=============================================================================

$(document).ready(function () {

    $('#dinallTableOB').DataTable({

        // scrollX: true,

        // scrollCollapse: true,
        // scrollY: '70vh'
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true

    },
    );

});

$('.hapusOB').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});


let startDateOB;
let endDateOB;
$(document).ready(function () {


    $(function () {
        $("#tanggalOB").datepicker({
            dateFormat: 'dd/mm/yy',
            timespicker: false

        });


        $("#sampai_denganOB").datepicker({
            dateFormat: 'dd/mm/yy',
            timespicker: false


        });



    });

});



$('#tanggalOB').change(function () {

    startDateOB = $(this).datepicker('getDate');
    $('#sampai_denganOB').datepicker('option', 'minDate', startDateOB);
    let checkNulltanggal = $('#tanggalOB').val();
    let checkNullsampai_dengan = $('#sampai_denganOB').val();
    if (checkNulltanggal != '' && checkNullsampai_dengan != '') {
        countDaysOB();
    }

});


$('#sampai_denganOB').change(function () {

    endDateOB = $(this).datepicker('getDate');
    $('#tanggalOB').datepicker('option', 'maxDate', endDateOB);
    let checkNulltanggal = $('#tanggalOB').val();
    let checkNullsampai_dengan = $('#sampai_denganOB').val();
    if (checkNulltanggal != '' && checkNullsampai_dengan != '') {
        countDaysOB();
    }


});



function countDaysOB() {

    let startCount = $("#tanggalOB").datepicker("getDate");
    let endCount = $("#sampai_denganOB").datepicker("getDate");
    days = (endCount - startCount) / (1000 * 60 * 60 * 24);
    let plusSatu = days + 1;
    // console.log(Math.round(plusSatu));

    $("#durasi_ob").addClass('bg-warning-subtle');
    $('#durasi_ob').prop('readonly', true);
    // $("#durasi_ob").val(Math.round(plusSatu) + ' Hari');
    $("#durasi_ob").val(Math.round(plusSatu));
}


//Start tabel Input Crew

$(document).ready(function () {
    $('#dinallModalOB').on('shown.bs.modal', function () {
        $('.dataTables_filter input').focus();
    });
    $(document).on('click', '.clickShowAllCrew', function (event) {
        // Menyimpan elemen yang diklik untuk digunakan nanti
        let $currentSearchBarang = $(event.currentTarget);
        let allSearchBarang = $('.clickShowAllCrew');

        // Mengatur event handler untuk elemen .select menggunakan event delegation
        $(document).off('click', '.selectCrewOB').on('click', '.selectCrewOB', function () {
            let idCrew = $(this).data('id_crew');
            let fullname = $(this).data('fullname');
            let jabfung = $(this).data('jab_fung');
            let nip = $(this).data('nip');
            let npwp = $(this).data('npwp');

            // Mengisi nilai input pada elemen .searchBarang
            $currentSearchBarang.parent().next().children().val(fullname);
            $currentSearchBarang.parent().next().next().children().val(nip);
            $currentSearchBarang.parent().next().next().next().children().val(npwp);
            $currentSearchBarang.parent().next().next().next().next().children().val(idCrew);
            let currentIndex = allSearchBarang.index($currentSearchBarang);
            let isLastElement = currentIndex === allSearchBarang.length - 1;

            if (isLastElement) {
                // Jika iya, tambahkan baris baru dan nomori ulang
                // addnewrow();
                renumberRows();
            }
            $('#dinallModalOB').modal('hide');

        });
    });
});



$(document).ready(function () {
    $('#tableOBShow').DataTable({
   
        "lengthMenu": [[5, 20, 80, -1], [5, 20, 80, 200]]
 
    });
});


$(function () {
    // Add Row


    $(".btnAddFormOB").click(function () {
        addnewrowOB();
        renumberRowsOB();
    });

    // Remove Row
    $("body").delegate('.btnHapusFormOB', 'click', function () {
        $(this).parent().parent().remove();
        renumberRowsOB();
        // $(this).parents('tr').remove();
    });


});

function addnewrowOB() {
    let tr = `<tr>
        <td class="rownumberob text-center">
        </td>
        <td class="text-center">
        <button type="button" class="btn btn-primary clickShowAllCrew" data-bs-toggle="modal" data-bs-target="#dinallModalOB"><i class="fa-solid fa-search"></i></button>
        </td>
        <td class="text-center">
        <input type="text" readonly="true" class="form-control" name="nama[]" placeholder="Nama di isi dari search">
        </td>
        <td class="text-center">
        <input type="text"readonly="true" class="form-control" name="nip[]" placeholder="NIP di isi dari search">
        </td>
        <td class="text-center">
        <input type="text" readonly="true" class="form-control" name="npwp[]" placeholder="NPWP di isi dari search">
        </td>
        <td class="text-center"><input type="hidden" name="id_user[]"></td>
        <td class="text-center">
            <button type="button" class="btn btn-danger btnHapusFormOB"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.formTambahOB').append(tr);
};

function renumberRowsOB() {
    $(".formTambahOB").children().children().each(function (i, v) {

        $(this).find(".rownumberob").text(i);
        //   $(this).find(".rownumber").val(i + 1); index i dimulai dari 0
        // console.log(i);
    });
}
//Start tabel Input Crew
//Start tabel Input Alat OB
$(document).ready(function () {
    $('#dinallModalBarangInv').on('shown.bs.modal', function () {
        $('.dataTables_filter input').focus();
    });
    $(document).on('click', '.clickShowBarangInv', function (event) {
        // Menyimpan elemen yang diklik untuk digunakan nanti
        let $currentSearchBarang = $(event.currentTarget);
        let allSearchBarang = $('.clickShowBarangInv');

        // Mengatur event handler untuk elemen .select menggunakan event delegation
        $(document).off('click', '.selectBarangForOB').on('click', '.selectBarangForOB', function () {
            let idInv = $(this).data('id_alat');
            let barcode = $(this).data('barcode');
            let barang = $(this).data('barang');
            let merk = $(this).data('merk');
            let sn = $(this).data('sn');

            // Mengisi nilai input pada elemen .searchBarang
            $currentSearchBarang.parent().next().children().val(barang);
            $currentSearchBarang.parent().next().next().children().val(merk);
            $currentSearchBarang.parent().next().next().next().children().val(sn);
            $currentSearchBarang.parent().next().next().next().next().next().children().val(idInv);
            let currentIndex = allSearchBarang.index($currentSearchBarang);
            let isLastElement = currentIndex === allSearchBarang.length - 1;

            if (isLastElement) {
                // Jika iya, tambahkan baris baru dan nomori ulang
                // addnewrow();
                renumberRows();
            }
            $('#dinallModalBarangInv').modal('hide');

        });
    });
});

$(document).ready(function () {
    $('#tableInvShowForOB').DataTable({

    });
});


$(function () {
    // Add Row
    $(".btnAddFormForBarangOB").click(function () {
        addnewrowBarangForOB();
        renumberRowsBarangForOB();
    });

    // Remove Row
    $("body").delegate('.btnHapusFormBarangForOB', 'click', function () {
        $(this).parent().parent().remove();
        renumberRowsBarangForOB();
        // $(this).parents('tr').remove();
    });


});

function addnewrowBarangForOB() {
    let tr = `<tr>
        <td class="rownumberBarangForOB text-center">
        </td>
        <td class="text-center">
        <button type="button" class="btn btn-primary clickShowBarangInv" data-bs-toggle="modal" data-bs-target="#dinallModalBarangInv"><i class="fa-solid fa-search"></i></button>
        </td>
        <td class="text-center">
            <input type="text" readonly="true" id="dinall-js-${$('.rownumberBarangForOB').last().text()}" class="form-control" name="naBar[]" placeholder="Nama Barang di isi dari search">
        </td>
        <td class="text-center">
            <input type="text" readonly="true" class="form-control" name="merk[]" placeholder="Merk di isi dari search">
        </td>
        <td class="text-center">
            <input type="text" readonly="true" class="form-control" name="sN[]" placeholder="Serial Number di isi dari search">
        </td>
        <td class="text-center">
            <input type="text" id="dinall-js-jumlah-${$('.rownumberBarangForOB').last().text()}" class="form-control" name="jumlahAlatOB[]" placeholder="Jumlah" value="1">
        </td>
        <td class="text-center"><input type="hidden" name="id_peralatan[]"></td>
        <td class="text-center">
            <button type="button" class="btn btn-danger btnHapusFormBarangForOB"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.formTambahBarangOB').append(tr);
    // console.log('testing');

};

function renumberRowsBarangForOB() {
    $(".formTambahBarangOB").children().children().each(function (i, v) {

        $(this).find(".rownumberBarangForOB").text(i);
        //   $(this).find(".rownumber").val(i + 1); index i dimulai dari 0
        // console.log(i);
    });
}


$(document).on('click', '.clickModalSearchIDOB', function (event) {
    let varId = $(this).data('ob');
    console.log(varId);

});

//End tabel Input Alat OB

// start menampilkan alat ob diindex ob
$(document).ready(function () {
    $('.tombol_alat').click(function () {
        let id = $(this).data('idob');
        console.log(id);

        $.ajax({
            url: 'out-broadcast', // Lokasi controller Anda
            type: 'POST',
            dataType: 'json',
            data: { id: id },
            success: function (response) {
                // Tampilkan data dalam modal
            }
        });
    });
});
// end menampilkan alat ob diindex ob



//menu edit crew dinas out broadcast
$(function () {
    // Add Row
    $(".btnAddEditCrewDinasOb").click(function () {
        addnewrowCrewOBEdit();
        renumberRowsEditCrewOb();
    });
        // Remove Row Crew Dinas Edit Out Broadcast
        $("body").delegate('.btnEditHpusCrewDinasOb', 'click', function (e) {
            e.preventDefault();
            let idOb = $("#idObGerForJs").val();
            let idCrewDinas = $(this).val();
            if (idCrewDinas !== '') {
                Swal.fire({
                    title: 'Yakin Hapus Data Ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            // url: "/peminjaman_alat/edit/22/"+id,
                               // url: `${idOb}/${idCrewDinas}`,
                            url: `/out-broadcast/edit/${idOb}/${idCrewDinas}`,
                            type: "POST",
                            success: function (response) {
                                Swal.fire(
                                    'Berhasil!',
                                    'Data sudah dihapus.',
                                    'success'
                                );
    
                            }
                        });
                        $(this).parent().parent().remove();
                        renumberRowsEditCrewOb();
                        window.location.reload(true);
                    }
                })
    
            }
            else {
                $(this).parent().parent().remove();
                renumberRowsEditCrewOb();
    
            }
    
        });


});


function addnewrowCrewOBEdit() {
    let tr = `<tr>
        <input type="hidden" class="form-control" name="id_dinas_crew_ob[]" value="<?= $valueJoinUser['id_crew_ob']; ?>">
        <td class="rownumberobEdit text-center">
        </td>
        <td class="text-center">
        <button type="button" class="btn btn-primary clickShowAllCrewEdit" data-bs-toggle="modal" data-bs-target="#dinallModalOBEdit"><i class="fa-solid fa-search"></i></button>
        </td>
        <td class="text-center">
        <input type="text" readonly="true" class="form-control" name="namaEditUpdate[]" placeholder="Nama di isi dari search">
        </td>
        <td class="text-center">
        <input type="text" readonly="true" class="form-control" name="nipEditUpdate[]" placeholder="NIP di isi dari search">
        </td>
        <td class="text-center">
        <input type="text" readonly="true" class="form-control" name="npwpEditUpdate[]" placeholder="NPWP di isi dari search">
        </td>
        <td><input type="hidden" name="idUserFromSelectModalUpdate[]"></td>
        <td class="text-center">
            <button type="button"  class="btn btn-danger btnEditHpusCrewDinasOb"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.tableCrewDinasOb').append(tr);
};

function renumberRowsEditCrewOb() {
    $(".tableCrewDinasOb").children().children().each(function (i, v) {
        $(this).find(".rownumberobEdit").text(i);
    });
}





$(document).ready(function () {
    $('#dinallModalOBEdit').on('shown.bs.modal', function () {
        $('.dataTables_filter input').focus();
    });
    $(document).on('click', '.clickShowAllCrewEdit', function (event) {
        // Menyimpan elemen yang diklik untuk digunakan nanti
        let $currentSearchBarang = $(event.currentTarget);
        let allSearchBarang = $('.clickShowAllCrewEdit');

        // Mengatur event handler untuk elemen .select menggunakan event delegation
        $(document).off('click', '.selectCrewOBEdit').on('click', '.selectCrewOBEdit', function () {
            let idCrew = $(this).data('id_crew');
            let fullname = $(this).data('fullname');
            let jabfung = $(this).data('jab_fung');
            let nip = $(this).data('nip');
            let npwp = $(this).data('npwp');

            // Mengisi nilai input pada elemen .searchBarang
            $currentSearchBarang.parent().next().children().val(fullname);
            $currentSearchBarang.parent().next().next().children().val(nip);
            $currentSearchBarang.parent().next().next().next().children().val(npwp);
            $currentSearchBarang.parent().next().next().next().next().children().val(idCrew);
            let currentIndex = allSearchBarang.index($currentSearchBarang);
            let isLastElement = currentIndex === allSearchBarang.length - 1;

            if (isLastElement) {
                // Jika iya, tambahkan baris baru dan nomori ulang
                // addnewrow();
                renumberRows();
            }
            $('#dinallModalOBEdit').modal('hide');

        });
    });
});

$(document).ready(function () {
    $('#tableOBShowEdit').DataTable({
        "lengthMenu": [[5, 20, 80, -1], [5, 20, 80, 200]]
 
    });
});

//end menu edit crew dinas out broadcast

//star menu edit alat ob
$(document).ready(function () {
    $('#tableInvShowForOBUpdate').DataTable({

    });
})
$(document).ready(function () {
    $('#dinallModalBarangInvEditUpdate').on('shown.bs.modal', function () {
        $('.dataTables_filter input').focus();
    });
    $(document).on('click', '.clickShowBarangInvEditUpdate', function (event) {
        // Menyimpan elemen yang diklik untuk digunakan nanti
        let $currentSearchBarang = $(event.currentTarget);
        let allSearchBarang = $('.clickShowBarangInvEditUpdate');

        // Mengatur event handler untuk elemen .select menggunakan event delegation
        $(document).off('click', '.selectBarangForOBUpdate').on('click', '.selectBarangForOBUpdate', function () {
            let idInv = $(this).data('id_alat');
            let barcode = $(this).data('barcode');
            let barang = $(this).data('barang');
            let merk = $(this).data('merk');
            let sn = $(this).data('sn');

            // Mengisi nilai input pada elemen .searchBarang
            $currentSearchBarang.parent().next().children().val(barang);
            $currentSearchBarang.parent().next().next().children().val(merk);
            $currentSearchBarang.parent().next().next().next().children().val(sn);
            $currentSearchBarang.parent().next().next().next().next().children().val(idInv);
            let currentIndex = allSearchBarang.index($currentSearchBarang);
            let isLastElement = currentIndex === allSearchBarang.length - 1;

            if (isLastElement) {
                // Jika iya, tambahkan baris baru dan nomori ulang
                // addnewrow();
                renumberRows();
            }
            $('#dinallModalBarangInvEditUpdate').modal('hide');

        });
    });
});



$(function () {
    // Add Row
    $(".btnAddFormForBarangOBUpdate").click(function () {
        addnewrowBarangForOBUpdate();
        renumberRowsBarangForOBUpdate();
    });

    // Remove Row
    // $("body").delegate('.btnHapusFormBarangForOBUpdate', 'click', function () {
    //     $(this).parent().parent().remove();
    //     renumberRowsBarangForOBUpdate();
    //     // $(this).parents('tr').remove();
    // });

    $("body").delegate('.btnHapusFormBarangForOBUpdate', 'click', function (e) {
        e.preventDefault();
        let idOb = $("#idObGerForJs").val();
        let idBarangINV = $(this).val();
        // console.log(idOb);
        // console.log(idBarangINV);
      
        if (idBarangINV !== '') {
            Swal.fire({
                title: 'Yakin Hapus Data Ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/out-broadcast/edit/${idOb}/${idBarangINV}`,
                        type: "PUT",
                        success: function (response) {
                            Swal.fire(
                                'Berhasil!',
                                'Data sudah dihapus.',
                                'success'
                            );

                        }
                    });
                    $(this).parent().parent().remove();
                    renumberRowsBarangForOBUpdate();
                    window.location.reload(true);
                }
            })

        }
        else {
            $(this).parent().parent().remove();
            renumberRowsBarangForOBUpdate();

        }

    });



});


   $("body").delegate('.btnEditHpusCrewDinasOb', 'click', function (e) {
            e.preventDefault();
            let idOb = $("#idObGerForJs").val();
            let idCrewDinas = $(this).val();
            if (idCrewDinas !== '') {
                Swal.fire({
                    title: 'Yakin Hapus Data Ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            // url: "/peminjaman_alat/edit/22/"+id,
                               // url: `${idOb}/${idCrewDinas}`,
                            url: `/out-broadcast/edit/${idOb}/${idCrewDinas}`,
                            type: "POST",
                            success: function (response) {
                                Swal.fire(
                                    'Berhasil!',
                                    'Data sudah dihapus.',
                                    'success'
                                );
    
                            }
                        });
                        $(this).parent().parent().remove();
                        renumberRowsEditCrewOb();
                        window.location.reload(true);
                    }
                })
    
            }
            else {
                $(this).parent().parent().remove();
                renumberRowsEditCrewOb();
    
            }
    
        });


function addnewrowBarangForOBUpdate() {
    let tr = `<tr>
        <input type="hidden" class="form-control" name="id_ob_from_alat[]" value="<?= $valueJoinInv['id_parent_alat_ob']; ?>">
        <td class="rownumberBarangForOBUpdate text-center">
        </td>
        <td class="text-center">
        <button type="button" class="btn btn-primary clickShowBarangInvEditUpdate" data-bs-toggle="modal" data-bs-target="#dinallModalBarangInvEditUpdate"><i class="fa-solid fa-search"></i></button>
        </td>
        <td class="text-center">
            <input type="text" readonly="true" id="dinall-js-${$('.rownumberBarangForOBUpdate').last().text()}" class="form-control" name="naBarUpdate[]" placeholder="Nama Barang di isi dari search">
        </td>
        <td class="text-center">
            <input type="text" readonly="true" class="form-control" name="merkUpdate[]" placeholder="Merk di isi dari search">
        </td>
        <td class="text-center">
            <input type="text" readonly="true" class="form-control" name="sNUpdate[]" placeholder="SN di isi dari search">
        </td>
        <td class="text_center"> 
            <input type="hidden" class="form-control" name="idBarangFromSelectModalUpdate[]" value="<?= $valueJoinInv['id_inv']; ?>">
        </td>
        <td class="text-center">
            <input type="text" id="dinall-js-jumlah-${$('.rownumberBarangForOBUpdate').last().text()}" class="form-control" name="jumlahAlatOBUpdate[]" placeholder="Jumlah" value="1">
        </td>
        <td class="text-center">
            <button type="button"  class="btn btn-danger btnHapusFormBarangForOBUpdate"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.formTambahBarangOBUpdate').append(tr);
    // console.log('testing');

};

function renumberRowsBarangForOBUpdate() {
    $(".formTambahBarangOBUpdate").children().children().each(function (i, v) {

        $(this).find(".rownumberBarangForOBUpdate").text(i);
        //   $(this).find(".rownumber").val(i + 1); index i dimulai dari 0
        // console.log(i);
    });
}





//end menu edit alat ob




//End OutBroadcast===============================================================================
//Start View Alat================================================================================

$(document).ready(function () {

    $('#AlatOBTable').DataTable({
        scrollX: true,
        scrollCollapse: true,
        scrollY: '70vh',
        "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, 200]]

    },
    );

    $('#dinallTableKelolaAkun').DataTable({
        scrollX: true,
        scrollCollapse: true,
        scrollY: '70vh',
        "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, 200]]

    },
    );

});
//End View Alat==================================================================================

//Start table surat tugas ===================================================================


$(document).ready(function () {

    let ob = $('#dinallTableCrewDinasByID').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '300px',
        scrollCollapse: true
    });

    let pemberiPinjam = $('#dinallTablePemberiPinjam').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '300px',
        scrollCollapse: true
    });
    let penerimaPinjam = $('#dinallTablePenerimaPinjam').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '300px',
        scrollCollapse: true
    });

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
        let tabID = $(event.target).attr('data-bs-target');
        if (tabID === '#pemberiPinjam') {
            pemberiPinjam.columns.adjust();
        }else if(tabID === '#penerimaPinjam'){
            penerimaPinjam.columns.adjust();
        }else if(tabID === '#outBroadcast'){
            ob.columns.adjust();

        }
    });

});



//End table surat tugas ====================================================================
//start table KategoriDinasLembur/Shifting =================================================
$(document).ready(function () {

    let kategoriDinasLemburShifting = $('#dinallTablekategoriDinas').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true
    });

    let kategoriAcaraLemburShifting = $('#tableDinallAcaraDinas').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true
    });
 

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
        let tabID = $(event.target).attr('data-bs-target');
        if (tabID === '#acaraDinas') {
            kategoriAcaraLemburShifting.columns.adjust();
        }else if(tabID === '#kategoriDinasLemburShifting'){
            kategoriDinasLemburShifting.columns.adjust();
        }
    });

});

//Start statu inventaris ===================================================================

// Start Kelola Pengguna

$(document).ready(function () {

    let aktivasi = $('#dinallTablekdinallTableKelolaAkunategoriDinas').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true
    });

    let resetPassword = $('#dinallTableResetPassword').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true
    });
 

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
        let tabID = $(event.target).attr('data-bs-target');
        if (tabID === '#aktivasi') {
            aktivasi.columns.adjust();
        }else if(tabID === '#resetPassword'){
            resetPassword.columns.adjust();
        }
    });

});


// end Kelola Pengguna


$(document).ready(function () {


    let jenisBarang = $('#dinallTableJenisBarang').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true
    });
    let lokasi = $('#dinallTableLokasi').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true
    });
    let kondisi = $('#dinallTableKondisi').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true
    });
    let status = $('#dinallTableStatus').DataTable({
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true
    });

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
        let tabID = $(event.target).attr('data-bs-target');
        if (tabID === '#jenisBarang') {
            jenisBarang.columns.adjust();
        }else if(tabID === '#lokasi'){
            lokasi.columns.adjust();
        }else if(tabID === '#kondisi'){
            kondisi.columns.adjust();
        }else if(tabID === '#status'){
            status.columns.adjust();

        }
    });

});



$('.hapusStatusJenisBarang').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});

$('.hapusNamaLokasi').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});
$('.hapusNamaKondisi').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});
$('.hapusNamaStatus').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});



//End Status inventaris ====================================================================


$('.hapusKategoriDinas').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});

$('.hapusAcaraDinas').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});

//End table KategoriDinasLembur/Shifting ===================================================



//start Dinas Shifting

$(document).ready(function () {

    $('#dinallTableDinasShift').on('shown.bs.modal', function () {
        $('.dataTables_filter input').focus();
    });
    $(function () {
        $("#tanggalDinas").datepicker({
            dateFormat: 'dd/mm/yy',
            timespicker: false

        });
    });
    $( "#tanggalDinas" ).datepicker({dateFormat:"dd/mm/yy"}).datepicker("setDate",new Date());

});

$(document).ready(function () {
    $('#dinallModalDinasShif').on('shown.bs.modal', function () {
        $('.dataTables_filter input').focus();
    });
    $(document).on('click', '.clickShowAllCrewForDinasShif', function (event) {
        // Menyimpan elemen yang diklik untuk digunakan nanti
        let $currentSearchBarang = $(event.currentTarget);
        let allSearchBarang = $('.clickShowAllCrewForDinasShif');

        // Mengatur event handler untuk elemen .select menggunakan event delegation
        $(document).off('click', '.selectCrewDinasShif').on('click', '.selectCrewDinasShif', function () {
            let idCrew = $(this).data('id_crew');
            let fullname = $(this).data('fullname');
            let jabfung = $(this).data('jab_fung');
            let nip = $(this).data('nip');
            let npwp = $(this).data('npwp');

            // Mengisi nilai input pada elemen .searchBarang
            $currentSearchBarang.parent().next().children().val(fullname);
            // $currentSearchBarang.parent().next().children().append(fullname);
            $currentSearchBarang.parent().next().next().children().val(nip);
            $currentSearchBarang.parent().next().next().next().children().val(npwp);
            $currentSearchBarang.parent().next().next().next().next().children().val(idCrew);
            let currentIndex = allSearchBarang.index($currentSearchBarang);
            let isLastElement = currentIndex === allSearchBarang.length - 1;

            if (isLastElement) {
                // Jika iya, tambahkan baris baru dan nomori ulang
                // addnewrow();
                renumberRows();
            }
            $('#dinallModalDinasShif').modal('hide');

        });
    });
});


$(".btnAddForDinasShif").click(function () {
    addnewrowDinasShif();
    renumberDinasShif();
});
    // Remove Row
    $("body").delegate('.btnHapusForDinasShif', 'click', function () {
        $(this).parent().parent().remove();
        renumberDinasShif();
        // $(this).parents('tr').remove();
    });

function addnewrowDinasShif() {
    let tr = `<tr>
        <td class="rownumberDinasShif text-center">
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
            <button type="button" required class="btn btn-danger btnHapusForDinasShif"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.formTambahDinasShif').append(tr);
};

function renumberDinasShif() {
    $(".formTambahDinasShif").children().children().each(function (i, v) {

        $(this).find(".rownumberDinasShif").text(i);
        //   $(this).find(".rownumber").val(i + 1); index i dimulai dari 0
        // console.log(i);
    });
}

$('#dinallTableDinasShift').DataTable({
    scrollX: true,
    scrollCollapse: true,
    scrollY: '70vh',
    "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, 200]]

},
);
// $('#dinallTableDinaLemburKelola').DataTable({
//     scrollX: true,
//     scrollCollapse: true,
//     scrollY: '70vh',
//     "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, 200]]

// },

// );

$('#dinallTableDinaLemburKelola').DataTable({
    responsive: true,
    scrollX: true,
    scrollY: '300px',
    scrollCollapse: true
});

$('.hapusDinasShifting').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});

$(function () {
    $("#tanggalDinasEdit").datepicker({
        dateFormat: 'dd/mm/yy',
        timespicker: false

    });
});

$(document).ready(function () {
    $('#dinallModalDinasShifEdit').on('shown.bs.modal', function () {
        $('.dataTables_filter input').focus();
    });
    $(document).on('click', '.clickShowAllCrewForDinasShifEdit', function (event) {
        // Menyimpan elemen yang diklik untuk digunakan nanti
        let $currentSearchBarang = $(event.currentTarget);
        let allSearchBarang = $('.clickShowAllCrewForDinasShifEdit');

        // Mengatur event handler untuk elemen .select menggunakan event delegation
        $(document).off('click', '.selectCrewDinasShifEdit').on('click', '.selectCrewDinasShifEdit', function () {
            let idCrew = $(this).data('id_crew');
            let fullname = $(this).data('fullname');
            let jabfung = $(this).data('jab_fung');
            let nip = $(this).data('nip');
            let npwp = $(this).data('npwp');

            // Mengisi nilai input pada elemen .searchBarang
            $currentSearchBarang.parent().next().children().val(fullname);
            $currentSearchBarang.parent().next().next().children().val(nip);
            $currentSearchBarang.parent().next().next().next().children().val(npwp);
            $currentSearchBarang.parent().next().next().next().next().children().val(idCrew);
            let currentIndex = allSearchBarang.index($currentSearchBarang);
            let isLastElement = currentIndex === allSearchBarang.length - 1;

            if (isLastElement) {
                // Jika iya, tambahkan baris baru dan nomori ulang
                // addnewrow();
                renumberRows();
            }
            $('#dinallModalDinasShifEdit').modal('hide');

        });
    });
});

$(".btnAddForDinasShifEdit").click(function () {
    addnewrowDinasShifEdit();
    renumberDinasShifEdit();
});

$("body").delegate('.btnHapusForDinasShifEdit', 'click', function (e) {
    e.preventDefault();
    let idCrewDinasShif = $("#idObGerForJs").val();
    let idCrewShif = $(this).val();
    if (idCrewShif !== '') {
        Swal.fire({
            title: 'Yakin hapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    // url: "/peminjaman_alat/edit/22/"+id,
                       // url: `${idOb}/${idCrewDinas}`,
                    url: `/dinas-shifting/edit/${idCrewDinasShif}/${idCrewShif}`,
                    type: "POST",
                    success: function (response) {
                        Swal.fire(
                            'Berhasil!',
                            'Data sudah dihapus.',
                            'success'
                        );

                    }
                });
                $(this).parent().parent().remove();
                renumberDinasShifEdit();
                window.location.reload(true);
            }
        })

    }
    else {
        $(this).parent().parent().remove();
        renumberDinasShifEdit();

    }

});

function addnewrowDinasShifEdit() {
    let tr = `<tr>
        <td class="rownumberDinasShifEdit text-center">
        </td>
        <td class="text-center">
        <button type="button" class="btn btn-primary clickShowAllCrewForDinasShifEdit" data-bs-toggle="modal" data-bs-target="#dinallModalDinasShifEdit"><i class="fa-solid fa-search"></i></button>
        </td>
        <td class="text-center">
        <input type="text" readonly="true" class="form-control" name="namaUpdate[]" placeholder="Nama di isi dari search">
        </td>
        <td class="text-center">
        <input type="text" readonly="true" class="form-control" name="nipUpdate[]" placeholder="Nip di isi dari search">
        </td>
        <td class="text-center">
        <input type="text" readonly="true" class="form-control" name="npwpUpdate[]" placeholder="NPWP di isi dari search">
        </td>
        <td class="text-center"><input type="hidden" name="id_userUpdate[]"></td>
        <td class="text-center">
            <button type="button" required class="btn btn-danger btnHapusForDinasShifEdit"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.formTambahDinasShifEdit').append(tr);
};

function renumberDinasShifEdit() {
    $(".formTambahDinasShifEdit").children().children().each(function (i, v) {

        $(this).find(".rownumberDinasShifEdit").text(i);
        //   $(this).find(".rownumber").val(i + 1); index i dimulai dari 0
        // console.log(i);
    });
}

//End Dinas Shifting


//Start Dinas Out Broadcast
$('#dinallTableStatusKategoriOB').DataTable({
    responsive: true,
    scrollX: true,
    scrollY: '500px',
    scrollCollapse: true
});

$('.hapusStatusKatOB').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Yakin anda akan menghapus data ini?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});


//End Dinas Out Broadcast


