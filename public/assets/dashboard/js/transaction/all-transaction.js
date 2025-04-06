$(document).ready(function () {
    $("#allTransactionTable").DataTable({
        processing: false,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        ajax: "/dashboard/transactions/all/datatables",
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
            { data: "created_at", name: "created_at" },
            { data: "updated_at", name: "updated_at" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
        createdRow: function (row, data, dataIndex) {
            console.log(data);
            if (
                data.payment_status === "Failed" ||
                data.payment_status === "Pending" ||
                data.payment_status === "Pending or Failed"
            ) {
                $(row).addClass("status-failed");
            }
            if (
                data.payment_status === "Settlement" ||
                data.payment_status === "Success"
            ) {
                $(row).addClass("status-success");
            }
        },
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
