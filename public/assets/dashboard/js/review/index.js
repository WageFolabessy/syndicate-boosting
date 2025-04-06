$(document).ready(function () {
    $("#reviewTable").DataTable({
        processing: false,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        ajax: "/dashboard/reviews/datatables",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
                className: "text-center",
            },
            {
                data: "transaction_number",
                name: "transactions.transaction_number",
                className: "text-center",
            },
            {
                data: "transaction_id",
                name: "transaction_id",
                className: "text-center",
            },
            {
                data: "rating",
                name: "rating",
                className: "text-center",
            },
            {
                data: "comment",
                name: "comment",
                className: "text-center",
            },
            {
                data: "created_at",
                name: "created_at",
                className: "text-center",
            },
        ],
        dom:
            "<'row p-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row p-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        language: {
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>',
            },
        },
    });
});
