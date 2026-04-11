$(document).ready(function () {
    var table = $("#gameAccountTransactionTable").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        ajax: {
            url: "/dashboard/transactions/game-account/datatables",
            data: function (d) {
                d.month = $("#filterMonth").val();
                d.year  = $("#filterYear").val();
                d.progress_status = $("#filterProgressStatus").val();
            },
        },
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
                name: "transaction.transaction_number",
                className: "text-center",
            },
            {
                data: "payment_status",
                name: "payment_status",
                className: "text-center",
            },
            {
                data: "customer_name",
                name: "customer_name",
                className: "text-center",
            },
            {
                data: "customer_contact",
                name: "customer_contact",
                className: "text-center",
            },
            {
                data: "game_account_name",
                name: "gameAccount.account_name",
                className: "text-center",
            },
            {
                data: "game_name",
                name: "gameAccount.game.name",
                className: "text-center",
            },
            { data: "price", name: "price", className: "text-center" },
            {
                data: "progress_status",
                name: "progress_status",
                className: "text-center all",
            },
            {
                data: "created_at",
                name: "created_at",
                className: "text-center",
            },
            {
                data: "updated_at",
                name: "updated_at",
                className: "text-center",
            },
        ],
        createdRow: function (row, data, dataIndex) {},
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

    $("#filterMonth, #filterYear, #filterProgressStatus").on("change", function () {
        table.ajax.reload();
    });

    $("#btnResetFilter").on("click", function () {
        $("#filterMonth").val("");
        $("#filterYear").val("");
        $("#filterProgressStatus").val("");
        table.ajax.reload();
    });
});
