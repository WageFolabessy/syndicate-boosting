$(document).ready(function () {
    var table = $("#customBoostingTransactionTable").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        order: [[10, "desc"]],
        ajax: {
            url: "/dashboard/transactions/custom-boosting/datatables",
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
                name: "transaction_number",
                className: "text-center",
            },
            {
                data: "payment_status",
                name: "payment_status",
                className: "text-center",
            },
            { data: "game", name: "game", className: "text-center" },
            {
                data: "current_rank",
                name: "current_rank",
                className: "text-center",
            },
            {
                data: "desired_rank",
                name: "desired_rank",
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
            { data: "price", name: "price", className: "text-center" },
            {
                data: "progress_status",
                name: "progress_status",
                className: "text-center all"
            },
            { data: "created_at", name: "created_at", className: "text-center", orderData: [13] },
            { data: "updated_at", name: "updated_at", className: "text-center", orderData: [14] },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
                className: "text-center",
            },
            { data: "created_at_raw", name: "created_at_raw", visible: false, searchable: false },
            { data: "updated_at_raw", name: "updated_at_raw", visible: false, searchable: false },
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

    $("#btnExport").on("click", function (e) {
        e.preventDefault();
        var month = $("#filterMonth").val() || "";
        var year = $("#filterYear").val() || "";
        var progressStatus = $("#filterProgressStatus").val() || "";
        
        var baseUrl = $(this).attr("href").split("?")[0];
        window.location.href = baseUrl + "?month=" + month + "&year=" + year + "&progress_status=" + progressStatus;
    });
});
