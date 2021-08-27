




// menu aktif tapi ini tidak berguna
$(function(){
    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
    return this.href == url;
    }).parent().addClass('active');
    // for treeview
    $('ul.treeview-menu a').filter(function() {
    return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

    $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
        }).parent().addClass('active');
});




//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4',
	//placeholder: "Select a State",
    // containerCssClass: ':all:'
    // theme: 'bootstrap'
});
// $('.select2').select2()


// untuk notifikasi sweet alert
const dataswal = $('.swal').data('swal');
        if(dataswal){ //jika ada dataswal (ada pesan session yang di tampung di div dengan kelas 'swal')
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            // timer: 3000,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        Toast.fire({
            title: "Notifikasi\n"+dataswal,
            icon: 'info',
            // type: 'success',
            // type: 'info',
            // icon: 'success',
            //text: dataswal
        })
        //alert(dataswal)
        }

// untuk konfirmasi tombol hapus
$(document).on('click', '#btnHapus', function(e) {
e.preventDefault()
var link = $(this).attr('href');
Swal.fire({
    title: 'Apakah anda yakin ?',
    text: "Data Akan dihapus!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya'
}).then((result) => {
    if (result.isConfirmed) {
    window.location = link;
    
    }
})
});

$(document).on('click', '.btnProgress', function(e) {
e.preventDefault()
var link = $(this).attr('href');
Swal.fire({
    title: 'Apakah anda yakin ?',
    text: "Status Data Akan diubah!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya'
}).then((result) => {
    if (result.isConfirmed) {
    window.location = link;
    
    }
})
});

// $(document).ready(function() {
//     $('#tombol').click(function() {
//     var teks = $(".kata").text();
// alert(teks);
// });
// });