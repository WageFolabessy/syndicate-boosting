$(document).ready(function () {
    $("#rankTierDetailTable").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        ajax: "/dashboard/rank-tier-details/datatables", // pastikan route ini mengembalikan data yang tepat
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                data: "game_name",
                name: "game_name",
            },
            {
                data: "category_name",
                name: "category_name",
            },
            {
                data: "tier_name",
                name: "tier_name",
            },
            {
                data: "star_number",
                name: "star_number",
            },
            {
                data: "price",
                name: "price",
            },
            {
                data: "created_at",
                name: "created_at",
            },
            {
                data: "updated_at",
                name: "updated_at",
            },
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
