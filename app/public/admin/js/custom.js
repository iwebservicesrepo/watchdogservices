$(function () {
    window.setTimeout(function () {
        $(".removeAlert").alert('close');
    }, 4000);
    //for datatables
    $("#usersList").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        buttons: {
            buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                }
            ]
        }
    }).buttons().container().appendTo('#usersList_wrapper .col-md-6:eq(0)');

    /*$("#example1").DataTable({
     "responsive": true, "lengthChange": false, "autoWidth": false,
     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');*/
});