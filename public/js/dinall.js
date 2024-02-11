//Strat Peminjaman=================================================================================
let angka4 = 4;
let angka5 = 5;
let angka6 = 6;
let angka7 = 7;


$(document).ready(function () {

    $('#dinallTable').DataTable({

        scrollX: true,

        scrollCollapse: true,
        scrollY: '70vh'


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
        <td class="rownumber">
        </td>
        <td>
        <button type="button" class="btn btn-primary searchBarang" data-bs-toggle="modal" data-bs-target="#dinallModal"><i class="fa-solid fa-search"></i></button>
        </td>
        <td>
            <input type="text" required id="dinall-js-${$('.rownumber').last().text()}" class="form-control" name="naBar[]" placeholder="Nama Barang">
        </td>
        <td>
            <input type="text" required class="form-control" name="merk[]" placeholder="Merk">
        </td>
        <td>
            <input type="text" required class="form-control" name="sN[]" placeholder="Serial Number">
        </td>
        <td>
            <input type="text" required id="dinall-js-jumlah-${$('.rownumber').last().text()}" class="form-control" name="jumlah[]" placeholder="Jumlah" value="1">
        </td>
        <td>
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
        <td class="rownumber">
        <?= $number2++; ?>
        </td>
        <td>
        <button type="button" class="btn btn-primary searchBarangEdit" data-bs-toggle="modal" data-bs-target="#dinallModalEdit"><i class="fa-solid fa-search"></i></button>
        </td>
        <td>
            <input type="text" required id="dinall-js-${$('.rownumber').last().text()}" class="form-control" name="naBarEditUpdate[]" placeholder="Nama Barang">
        </td>
        <td>
            <input type="text" required class="form-control" name="merkEditUpdate[]" placeholder="Merk">
        </td>
        <td>
            <input type="text" required class="form-control" name="sNEditUpdate[]" placeholder="Serial Number">
        </td>
        <td>
            <input type="text" required class="form-control" name="jumlahEditUpdate[]" placeholder="Jumlah" value="1">
        </td>
        <td>
        <p class="text-success">baru..</p>
        </td>
        <td>
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

        scrollX: true,

        scrollCollapse: true,
        scrollY: '70vh'

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

        scrollX: true,

        scrollCollapse: true,
        scrollY: '70vh'

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
            let npwp = $(this).data('npwp');

            // Mengisi nilai input pada elemen .searchBarang
            $currentSearchBarang.parent().next().children().val(fullname);
            $currentSearchBarang.parent().next().next().children().val(npwp);
            $currentSearchBarang.parent().next().next().next().children().val(idCrew);
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
        <td class="rownumberob">
        </td>
        <td>
        <button type="button" class="btn btn-primary clickShowAllCrew" data-bs-toggle="modal" data-bs-target="#dinallModalOB"><i class="fa-solid fa-search"></i></button>
        </td>
        <td>
        <input type="text" required class="form-control" name="nama[]" placeholder="Nama">
        </td>
        <td>
        <input type="text" required class="form-control" name="nip[]" placeholder="NIP">
        </td>
        <td><input type="hidden" name="id_user[]"></td>
        <td>
            <button type="button" required class="btn btn-danger btnHapusFormOB"><i class="fa-solid fa-trash"></i></button>
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
        <td class="rownumberBarangForOB">
        </td>
        <td>
        <button type="button" class="btn btn-primary clickShowBarangInv" data-bs-toggle="modal" data-bs-target="#dinallModalBarangInv"><i class="fa-solid fa-search"></i></button>
        </td>
        <td>
            <input type="text" required id="dinall-js-${$('.rownumberBarangForOB').last().text()}" class="form-control" name="naBar[]" placeholder="Nama Barang">
        </td>
        <td>
            <input type="text" required class="form-control" name="merk[]" placeholder="Merk">
        </td>
        <td>
            <input type="text" required class="form-control" name="sN[]" placeholder="Serial Number">
        </td>
        <td>
            <input type="text" required id="dinall-js-jumlah-${$('.rownumberBarangForOB').last().text()}" class="form-control" name="jumlahAlatOB[]" placeholder="Jumlah" value="1">
        </td>
        <td><input type="hidden" name="id_peralatan[]"></td>
        <td>
            <button type="button" required class="btn btn-danger btnHapusFormBarangForOB"><i class="fa-solid fa-trash"></i></button>
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




//End tabel Input Alat OB

// start menampilkan alat ob diindex ob
$(document).ready(function(){
    $('.tombol_alat').click(function(){
        let id = $(this).data('idob');
        console.log(id);

        $.ajax({
            url: 'out-broadcast', // Lokasi controller Anda
            type: 'POST',
            dataType: 'json',
            data: {id: id},
            success: function(response){
                // Tampilkan data dalam modal
            }
        });
    });
});


// end menampilkan alat ob diindex ob

//End OutBroadcast===============================================================================










