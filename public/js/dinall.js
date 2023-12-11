//Strat Peminjaman=================================================================================
let angka4= 4;
let angka5= 5;
let angka6= 6;
let angka7= 7;


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
let nowDate = new Date();
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
function addnewrow() {
    let tr = `<tr>
        <td class="rownumber">
        
        </td>
        <td class="asem">
            <input type="text" required id="dinall-js-${$('.rownumber').last().text()}" class="form-control" name="naBar[]" placeholder="Nama Barang">
        </td>
        <td class="asem">
            <input type="text" required class="form-control" name="merk[]" placeholder="Merk">
        </td>
        <td class="asem">
            <input type="text" required class="form-control" name="sN[]" placeholder="Serial Number">
        </td>
        <td class="asem">
            <input type="text" required id="dinall-js-jumlah-${$('.rownumber').last().text()}" class="form-control" name="jumlah[]" placeholder="Jumlah">
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
            <input type="text" required id="dinall-js-${$('.rownumber').last().text()}" class="form-control" name="naBarEditUpdate[]" placeholder="Nama Barang">
        </td>
        <td>
            <input type="text" required class="form-control" name="merkEditUpdate[]" placeholder="Merk">
        </td>
        <td>
            <input type="text" required class="form-control" name="sNEditUpdate[]" placeholder="Serial Number">
        </td>
        <td>
            <input type="text" required class="form-control" name="jumlahEditUpdate[]" placeholder="Jumlah">
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
    if (!confirm('Are you sure?')) return false;

    let btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);

    return true;
});
//testing


//end
$(document).ready(function () {
    $(document).on('click','#select',function(){
        let idInv= $(this).data('id');
        let barcode= $(this).data('barcode');
        let barang= $(this).data('barang');
        let merk= $(this).data('merk');
        let sn= $(this).data('sn');

        // $('#dinall-js-nabar-01052013').val(barang);
        // $('#merkFirst').val(merk);
        // $('#snFirst').val(sn);
        // $('#dinall-js-jumlah-01052013').val(barcode);
        // $('#exampleModal').modal('toggle');
        // addnewrow();
        // renumberRows();
        let conveniancecount = $("td[class*='asem']").length;
        
        angka+=1; 
        if(conveniancecount===4){
            $('.asem').children().first().val(barang);
            $('.asem').next().children().val(merk);
            $('.asem').next().next().children().val(sn);
            $('.asem').next().next().next().children().val(barcode);
        }

        console.log(angka);
        // conveniancecount+=1;
        // console.log(conveniancecount);
        // $('.asem').children().first().val(barang);
        // $('.asem').next().children().val(merk);
        // $('.asem').next().next().children().val(sn);
        // $('.asem').next().next().next().children().val(barcode);
   
        // $('.asem').children().first().val(barang);
        // $('.asem').children().first().val(barang);
        // $('#2').val(merk);
        // $('#3').val(sn);
        // $('#4').val(barcode);
        $('#exampleModal').modal('toggle');
        addnewrow();
        renumberRows();
        // var conveniancecount = $("div[class*='conveniancecount']").length;
        // let conveniancecount = $("td[class*='asem']").length;
        // console.log(jQuery("div[id='yourWrapper_1']").length);
        // console.log(conveniancecount);
        // $('#merkFirst').val(merk);
        // $('#snFirst').val(sn);
        // $('#dinall-js-jumlah-01052013').val(barcode);
        // $('#exampleModal').modal('toggle');
        // addnewrow();
        // renumberRows();
        // $('#autocomplete').children().siblings().children().val(barang);

      

    });
});



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



//End Inventaris=================================================================================












