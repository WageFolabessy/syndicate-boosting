$(document).ready(function () {
    $("#rankCategoryTable").DataTable({
        processing: false,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        ajax: "/dashboard/rank-categories/datatables",
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
            { data: "name", name: "name" }, // Category Name
            {
                data: "system_type",
                name: "system_type",
                render: function (data, type, row) {
                    // Contoh: tampilkan huruf kapital di awal
                    return data
                        ? data.charAt(0).toUpperCase() + data.slice(1)
                        : "-";
                },
            },
            { data: "game_id", name: "game_id" }, // Sejak controller mengembalikan nama game melalui relasi
            { data: "display_order", name: "display_order" },
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
