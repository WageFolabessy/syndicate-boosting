$("#customBoostingTransactionTable").DataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    responsive: true,
    ajax: "/dashboard/transactions/custom-boosting/datatables",
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
        { data: "created_at", name: "created_at", className: "text-center" },
        { data: "updated_at", name: "updated_at", className: "text-center" },
        {
            data: "action",
            name: "action",
            orderable: false,
            searchable: false,
            className: "text-center",
        },
    ],
    createdRow: function (row, data, dataIndex) {
        console.log(data);
        if (
            data.payment_status === "Failed" ||
            data.payment_status === "Pending" ||
            data.payment_status === "Pending Or Failed"
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
