<script>
   $(document).ready(function() {
    $(function () {
        $("#order_datatable").DataTable({
            processing: true,
            serverSide: true,
            responsive: false,
            "pagingType": "full_numbers",
            orderCellsTop: true,
            fixedHeader: true,
            "pageLength":10,
            ajax: "{{ route('get.all.orders.admin.api', ['limit' => (\Request::get('limit')) ? \Request::get('limit') : 200]) }}",
            columns: [
                {data: 'action', name: 'action', "orderable": false},
                {data: 'order_status', name: 'order_status'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'quantity', name: 'quantity'},
                {data: 'total_price', name: 'total_price'},
                {data: 'description', name: 'description'},
                {data: 'category', name: 'category'},
                {data: 'customer_name', name: 'customer_name'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'address', name: 'address'},
                {data: 'image', name: 'image'},
            ]
        });

    });
});

</script>