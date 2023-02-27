$(document).ready(function(){
      $("#table-datatable").dataTable();
    });

    $(document).ready(function(){
                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});

         });

$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)    
      $("#check-all").click(function(){ // Ketika user men-cek checkbox all      
       if($(this).is(":checked")) // Jika checkbox all diceklis        
      $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"      
     else // Jika checkbox all tidak diceklis        
    $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"   
  });       
  //    $("#btn-delete").click(function(){ // Ketika user mengklik tombol delete      
  //      var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi            
    //  if(confirm) // Jika user mengklik tombol "Ok"        
    // $("#form-delete").submit(); 
  // }); 
    });  
$(function() {
  $('#nav a[href~="' + location.href + '"]').parents('div').addClass('active');
});


//=============================================================
const flashData = $('.flash-tambah').data('flashdata');
if(flashData){
	Swal.fire({
		title:'Data Anda',
		text:'Berhasil ' + flashData,
		type:'success'
	});
}

const flashWarning = $('.flash-warning').data('flashwarning');
if(flashWarning){
	Swal.fire({
    title: flashWarning,
		text:'Silakan Cek Kembali ' ,
		type:'warning'
	});
}

const flashError = $('.flash-error').data('flasherror');
if(flashError){
	Swal.fire({
		title: flashError,
		text:'Silakan Cek Kembali ' ,
		type:'error'
	});
}

///=================Alert Hapus=====================


$('.tombol-hapus').on('click',function(e){
e.preventDefault();
const href=$(this).attr('href');
Swal.fire({
  title: 'Apakah anda yakin',
  text: "Data akan dihapus",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Hapus Data!'
}).then((result) => {
  if (result.value) {
    document.location.href=href;
    
  }
})
});
$('.tombol-aktif').on('click',function(e){
  e.preventDefault();
  const href=$(this).attr('href');
  Swal.fire({
    title: 'Apakah anda yakin',
    text: "Data akan diaktifkan",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aktifkan User!'
  }).then((result) => {
    if (result.value) {
      document.location.href=href;
      
    }
  })
  });
  $('.tombol-nonaktif').on('click',function(e){
    e.preventDefault();
    const href=$(this).attr('href');
    Swal.fire({
      title: 'Apakah anda yakin',
      text: "Data akan dinonaktifkan",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Nonaktifkan User!'
    }).then((result) => {
      if (result.value) {
        document.location.href=href;
        
      }
    })
    });

$('.hapus-kategori').on('click',function(e){
e.preventDefault();
const hrefKategori=$(this).attr('href');
Swal.fire({
  title: 'Apakah anda yakin',
  text: "Data Merk akan dihapus",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Hapus Data!'
}).then((result) => {
  if (result.value) {
    document.location.href=hrefKategori;
    
  }
})
});