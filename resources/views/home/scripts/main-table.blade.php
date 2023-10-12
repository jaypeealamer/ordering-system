<script>
   $(document).ready(function() {
    $(function () {
        $("#menu_datatable").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            "pagingType": "full_numbers",
            orderCellsTop: true,
            fixedHeader: true,
            "pageLength":10,
            ajax: "{{ route('get.all.order.api', ['limit' => (\Request::get('limit')) ? \Request::get('limit') : 200]) }}",
            columns: [
                {data: 'action', name: 'action', "orderable": false},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'description', name: 'description'},
                {data: 'category', name: 'category'},
                {data: 'image', name: 'image'},
            ]
        });
        $("#menu_datatable_length").html('');

    });
});

</script>