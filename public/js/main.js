$(function() {
    jQuery(document).ready(function($) {
        $('#example').DataTable({
            searching: false,
            responsive: true,
            "autoWidth": false,
        });
        var table = $('#example').DataTable();
        $('#example tbody').on('click', 'tr', function () {
            //console.log(table.row(this).data());
            $(".modal-body div span").text("");
            $(".username span").text(table.row(this).data()[0]);
            $(".position span").text(table.row(this).data()[1]);
            $(".office span").text(table.row(this).data()[2]);
            $(".age span").text(table.row(this).data()[3]);
            $(".date span").text(table.row(this).data()[4]);
            $(".salary span").text(table.row(this).data()[5]);
            $("#myModal").modal("show");
        });
    } );

});

