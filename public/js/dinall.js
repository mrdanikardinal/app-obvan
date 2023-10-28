// $(document).ready(function() {
//     $('#dinallTable').DataTable( {
//         dom: 'Bfrtip',
//         scrollX: true,
//         buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ]
//     } );
// } );

$(document).ready(function () {
    
    $('#dinallTable').DataTable({
  
        scrollX: true,

        scrollCollapse: true,
        scrollY: '70vh'
      
        
    },
   
    
    // ,
    // {
    //     label: 'Registered date:',
    //     name: 'registered_date',
    //     type: 'datetime',
    //     def: () => new Date(),
    //     displayFormat: 'dddd D MMMM YYYY',
    //     wireFormat: 'YYYY-MM-DD',
    //     fieldInfo: 'Verbose date format'
    // }
    
    
    );
    
});


// columns: [
//   { data: 'name' },
//   { data: 'position' },
//   { data: 'office' },
//   { data: 'extn' },
//   { data: 'start_date', render: fnRenderDate },
//   { data: 'salary' }
// ],
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
       
        // startDate = nowDate.getDate()  + '/' + (nowDate.getMonth() + 1) + '/' + nowDate.getFullYear();
        // $('#tanggal').val(startDate);
        // $('#tanggal').datepicker('option','maxDate',startDate);
        

        $("#sampai_dengan").datepicker({
            dateFormat: 'dd/mm/yy',
            timespicker: false
        
                          
        });
        //menampilkan tanggal sekarang
    //    endDate = nowDate.getDate()  + '/' + (nowDate.getMonth() + 1) + '/' + nowDate.getFullYear();
        // $('#sampai_dengan').val(endDate);
        // $('#sampai_dengan').datepicker('option','minDate',endDate);
        
    });
   
});

// $(document).ready(function () {
 
//             $(function () {
//                 $("#sampai_dengan").datepicker({
//                     dateFormat: 'dd/mm/yy',
//                     timespicker: false,
//                     onSelect: function () {
//                         countDays();
//                     }
                                  
//                 });
                
//                 let now = new Date();
//                  endDate = now.getDate()  + '/' + (now.getMonth() + 1) + '/' + now.getFullYear();
//                 $('#sampai_dengan').val(endDate);
//                 $('#sampai_dengan').datepicker('option','minDate',endDate);
                
               
//             });
 

// });


    $('#tanggal').change(function(){

        startDate=$(this).datepicker('getDate');
        $('#sampai_dengan').datepicker('option','minDate',startDate);
        let checkNulltanggal=$('#tanggal').val();
        let checkNullsampai_dengan=$('#sampai_dengan').val();
        if(checkNulltanggal!=''&&checkNullsampai_dengan!=''){
            countDays();
        }
       
    });
    
    
    $('#sampai_dengan').change(function(){
    
        endDate=$(this).datepicker('getDate');
        $('#tanggal').datepicker('option','maxDate',endDate);
        let checkNulltanggal=$('#tanggal').val();
        let checkNullsampai_dengan=$('#sampai_dengan').val();
        if(checkNulltanggal!=''&&checkNullsampai_dengan!=''){
            countDays();
        }
       
    
    });

 	
function countDays(){

    let start= $("#tanggal").datepicker("getDate");
    let end= $("#sampai_dengan").datepicker("getDate");
    days = (end- start) / (1000 * 60 * 60 * 24);
    let plusSatu= days+1;
    // console.log(Math.round(plusSatu));
    
    $("#durasi_pinjam").addClass('bg-warning-subtle');
    $('#durasi_pinjam').prop('readonly', true);
    $("#durasi_pinjam").val(Math.round(plusSatu)+' Hari');
}

// $(function () {
// checkTanggalSampaiDengan();
        
// });
// function checkTanggalSampaiDengan(){
//     let a=$("#sampai_dengan").val();
//     let b=$("#tanggal").val();
//     if(a>=b){
//         console.log('valid');
//     }else{
//         console.log('invalid');
//     }

//         console.log(a);
//         console.log(b);
// }

//validation from php
// $(document).ready(function (e) {
//     $('.btnAddForm').click(function (e) {
//         e.preventDefault();
//         // console.log('dinall');
//         $('.formTambah').append(`<tr>
//         <td>
//             <input type="text" class="form-control <?= (validation_show_error('naBar.*') ? 'is-invalid' : null); ?>" name="naBar[]" placeholder="Nama Barang">
//         </td>
//         <td>
//             <input type="text" class="form-control" name="merk[]" placeholder="Merk">
//         </td>
//         <td>
//             <input type="text" class="form-control" name="sN[]" placeholder="Serial Number">
//         </td>
//         <td>
//             <input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah">
//         </td>
//         <td>
//             <button type="button" class="btn btn-danger btnHapusForm"><i class="fa-solid fa-trash"></i></button>
//         </td>
//     </tr>`);

//     });
// });
//validation from javascript
//start add number dinamis & add element table row
$(function()
	{
      // Add Row

    
		$(".btnAddForm").click(function()
		{
			addnewrow();
            renumberRows();
		});
      
      // Remove Row
      	$("body").delegate('.btnHapusForm','click',function()
		{
			$(this).parent().parent().remove();
            renumberRows();
            // $(this).parents('tr').remove();
		});	
      
       
    });
	function addnewrow()
	{
        let tr= `<tr>
        <td class="rownumber">
        
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
            <input type="text" required id="dinall-js-jumlah-" class="form-control" name="jumlah[]" placeholder="Jumlah">
        </td>
        <td>
            <button type="button" required class="btn btn-danger btnHapusForm"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.formTambah').append(tr);
	};

    function renumberRows() {
        $(".formTambah").children().children().each(function(i, v) {
            
          $(this).find(".rownumber").text(i);
        //   $(this).find(".rownumber").val(i + 1); index i dimulai dari 0
        // console.log(i);
        });
      }
// end add number dinamis & add element table row



// $("#formAdd").validate();
// addValidationRules();
// function addValidationRules() {
//     $(".in").each((i, e) => {
//         $(e).rules("add", {
//             required: true
//         })
//     });
// }


// $("#formAdd").validate()

// $('[name^="naBar"]').each(function() {
//     $(this).rules('add', {
//         required: true
    
//     });
// });

// $("#formAdd").validate();
// $('[name^="naBar"]').each(function() {
//     $(this).rules('add', {
//         required: true,
//         minlength: 2,
//         messages: {
//             required: "Enter Reg Number",
//             minlength: "Enter at least {0} characters",
//         }
//     })
// });
     


// $(document).on('click', '.btnHapusForm', function (e) {
    // e.preventDefault();
    // $('.output').val('');
    // let counter = $('.output').length;
    // $('.output').attr('value', ''); 
    // $('.output').text(''); 
    // $('.output').text(counter-1); 
    // $('.output').text(counter-1); 
   

//     $(this).parents('tr').remove();
// });






//start add number dinamis & add element table row
$(function()
	{
      // Add Row

    
		$(".btnAddFormEdit").click(function()
		{
			addnewrowEdit();
            renumberRowsEdit();
		});
      
      // Remove Row
      	$("body").delegate('.btnHapusFormEdit','click',function(e)
		{
                e.preventDefault();
                let a = $("#idGetForJs").val();
                let id = $(this).val();         
                if(id!== ''){
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
                                url: `/peminjaman_alat/edit/${a}/${id}`,
                                type: "POST",
                                success: function (response) {
                                    
                                 
                                    Swal.fire(
                                        'Berhasil!',
                                        'Data berhasil dihapus.',
                                        'success'
                                      )
                                   
                                }
                            });
                            $(this).parent().parent().remove();
                            renumberRowsEdit();
                        }
                      })
                
            }
            else{
                $(this).parent().parent().remove();
                renumberRowsEdit();
                console.log('no-database');
            }
            
            });
		});	
      
       
   
	function addnewrowEdit()
	{
        let tr= `<tr>
        <td class="rownumber">
        <?= $number2++; ?>
        </td>
        <td>
            <input type="text" required class="form-control" name="naBarEditUpdate[]" placeholder="Nama Barang">
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
        $(".formTambahEdit").children().children().each(function(i, v) {
            
          $(this).find(".rownumber").text(i);
        //   $('#getCountNumber').val(i);
        //   $('#getCountNumber').attr('name', i);
        //   $(this).find(".rownumber").val(i + 1); index i dimulai dari 0
        // console.log(i);
        });
      }
// end add number dinamis & add element table row

//confirm ok
// $('.hapusPjm').click(function () {
//     // escape here if the confirm is false;
//     if (!confirm('Are you sure?')) return false;
        
//     let btn = this;
//     setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);
//     console.log("berhasil");
//     return true;
// });
$(document).ready(function(){
$('.hapusPjm').click(function(e){
    e.preventDefault();
    // let a = $('#hapus').attr('href');
    // let a = $('#hapus').attr('action');
    let id = $(this).parent().attr('id');
    let baseURl = document.baseURI;
    // let a = $('#hapus').attr('action');

    console.log(document.baseURI);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location=`${baseURl}/${id}`;
        }
    })

    
});

});






// $('.hapusPjm').click(function(){
  
//     swal({
//     title: 'Are you sure?',
//     text: "It will permanently deleted !",
//     type: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, delete it!'
//   }).then(function() {
//     swal(
//       'Deleted!',
//       'Your file has been deleted.',
//       'success'
//     );
//   })
    
//   })



//add element table row
// $(document).ready(function (e) {
//     $('.btnAddFormEdit').click(function (e) {
//         e.preventDefault();
//         // console.log('dinall');
//         $('.formTambahEdit').append(`<tr>
//         <td>
//             <input type="text" required class="form-control" name="naBarEditUpdate[]" placeholder="Nama Barang">
//         </td>
//         <td>
//             <input type="text" required class="form-control" name="merkEditUpdate[]" placeholder="Merk">
//         </td>
//         <td>
//             <input type="text" required class="form-control" name="sNEditUpdate[]" placeholder="Serial Number">
//         </td>
//         <td>
//             <input type="text" required class="form-control" name="jumlahEditUpdate[]" placeholder="Jumlah">
//         </td>
//         <td>
//             <button type="button" required class="btn btn-danger btnHapusFormEdit"><i class="fa-solid fa-trash"></i></button>
//         </td>
//     </tr>`);

//     });
// });



// $(document).ready(function () {

//     $('.btnHapusFormEdit').click(function (e) {
//         e.preventDefault();

//         confirmDialog = confirm("Are you sure you want to delete?");
//         if(confirmDialog)
//         {
//             var id = $(this).val();
//             alert(id);
     


//         }

//     });
// });

// $(document).ready(function edit($id) {

// });
// function edit(id_pinjam) {
//     $.ajax({
//         type: "post",
//         // url: "<?= site_url('peminjaman_alat/formedit')?>",
//         // url  : "<?php echo base_url(); ?>/PeminjamanAlat/formedit",
//         url: "/peminjaman_alat/formedit",
//         data: {
//             id_pinjam: id_pinjam

//         },
//         dataType: "json",
//         success: function (response) {
//             if (response.sukses) {
//                 $('.viewmodal').html(response).show();
//                 $('#modaledit').modal('show');
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//             alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
//         }
//     });
// }
// function hapus(name){
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//       }).then((result) => {
//         if (result.isConfirmed) {
//             // $.ajax({
//             //     type: "post",
//             //     // url: "<?= site_url('peminjaman_alat/formedit')?>",
//             //     // url  : "<?php echo base_url(); ?>/PeminjamanAlat/formedit",
//             //     url: "/peminjaman_alat/hapus",
//             //     data: {
//             //         id: 'id'
        
//             //     },
//             //     dataType: "json",
//             //     success: function (response) {
                    
//             //           console.log('sukses');
                    
//             //     },
//             //     error: function (xhr, ajaxOptions, thrownError) {
//             //         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
//             //     }
//             // });

//             $.ajax({
//                 method: "POST",
//                 url: "some.php",
//                 data: { name: "John", location: "Boston" }
//               })
//                 .done(function( msg ) {
//                   alert( "Data Saved: " + msg );
//                 });
        
        
        
        
//         //   Swal.fire(
//         //     'Deleted!',
//         //     'Your file has been deleted.',
//         //     'success'
//         //   )
//         }
//       })
    
// }






