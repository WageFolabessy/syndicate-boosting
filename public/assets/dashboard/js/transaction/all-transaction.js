$(document).ready(function () {
    var table = $("#allTransactionTable").DataTable({
        processing: false,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        ajax: {
            url: "/dashboard/transactions/all/datatables",
            data: function (d) {
                d.month = $("#filterMonth").val();
                d.year  = $("#filterYear").val();
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
                data: "transaction_status",
                name: "transaction_status",
                className: "text-center",
            },
            {
                data: "payment_status",
                name: "payment_status",
                className: "text-center",
            },
            { data: "order_type", name: "order_type" },
            { data: "customer_name", name: "customer_name" },
            { data: "customer_contact", name: "customer_contact" },
            { data: "price", name: "price" },
            { data: "created_at", name: "created_at" },
            { data: "updated_at", name: "updated_at" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
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

    $("#filterMonth, #filterYear").on("change", function () {
        table.ajax.reload();
    });

    $("#btnResetFilter").on("click", function () {
        $("#filterMonth").val("");
        $("#filterYear").val("");
        table.ajax.reload();
    });
});
