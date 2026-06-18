$(document).ready(function () {
    var table = $("#allTransactionTable").DataTable({
        processing: false,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        order: [[8, "desc"]],
        ajax: {
            url: "/dashboard/transactions/all/datatables",
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
            },
            { data: "transaction_number", name: "transaction_number" },
            {
                data: "payment_status",
                name: "payment_status",
                className: "text-center",
            },
            { data: "order_type", name: "order_type" },
            { data: "customer_name", name: "customer_name" },
            { data: "customer_contact", name: "customer_contact" },
            { data: "price", name: "price" },
            {
                data: "progress_status",
                name: "progress_status",
                className: "text-center all",
            },
            { data: "created_at", name: "created_at", orderData: [11] },
            { data: "updated_at", name: "updated_at", orderData: [12] },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
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

    function updateExportUrl() {
        var month = $("#filterMonth").val() || "";
        var year = $("#filterYear").val() || "";
        var progressStatus = $("#filterProgressStatus").val() || "";
        
        var $btn = $("#btnExport");
        if ($btn.length) {
            var baseUrl = $btn.attr("href").split("?")[0];
            $btn.attr("href", baseUrl + "?month=" + month + "&year=" + year + "&progress_status=" + progressStatus);
        }
    }

    updateExportUrl();

    $("#filterMonth, #filterYear, #filterProgressStatus").on("change", function () {
        table.ajax.reload();
        updateExportUrl();
    });

    $("#btnResetFilter").on("click", function () {
        $("#filterMonth").val("");
        $("#filterYear").val("");
        $("#filterProgressStatus").val("");
        table.ajax.reload();
        updateExportUrl();
    });
});
