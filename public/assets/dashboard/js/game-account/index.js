$(document).ready(function () {
    $("#gameAccountTable").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        ajax: "/dashboard/game-accounts/datatables",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                data: "image",
                name: "image",
                orderable: false,
                searchable: false,
            },
            { data: "account_name", name: "account_name" },
            { data: "game_id", name: "game_id"},
            { data: "subtitle", name: "subtitle"},
            { data: "level", name: "level"},
            { data: "account_age", name: "account_age"},
            { data: "original_price", name: "original_price"},
            { data: "sale_price", name: "sale_price"},
            {
                data: "labels",
                name: "labels",
                orderable: false,
                searchable: false,
            },
            { data: "created_at", name: "created_at" },
            { data: "updated_at", name: "updated_at" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
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
