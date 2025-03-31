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
                name: "games.name",
            },
            {
                data: "category_name",
                name: "game_rank_categories.name",
            },
            {
                data: "tier_name",
                name: "game_rank_tiers.tier",
            },
            {
                data: "star_number",
                name: "game_rank_tier_details.star_number",
            },
            {
                data: "price",
                name: "game_rank_tier_details.price",
            },
            {
                data: "created_at",
                name: "game_rank_tier_details.created_at",
            },
            {
                data: "updated_at",
                name: "game_rank_tier_details.updated_at",
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
