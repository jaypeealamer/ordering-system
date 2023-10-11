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
            ajax: "{{ route('get.all.menu.api', ['limit' => (\Request::get('limit')) ? \Request::get('limit') : 200]) }}",
            columns: [
                {data: 'action', name: 'action', "orderable": false},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'description', name: 'description'},
                {data: 'image', name: 'image'},
                {data: 'featured', name: 'featured'},
                {data: 'category', name: 'category'},
                {data: 'is_active', name: 'is_active'}
            ]
        });

        $(".dataTables_filter").append(' <button id="add_new" data-toggle="modal" data-target="#modal_new" class="btn btn-sm ml-2 btn-warning" style="float: right"><i class="fas fa-plus"></i> New </button>');
    });
});

</script>