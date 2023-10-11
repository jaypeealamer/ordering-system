<script>
   $(document).ready(function() {
    $(function () {
        $("#category_datatable").DataTable({
            processing: true,
            serverSide: true,
            responsive: false,
            "pagingType": "full_numbers",
            orderCellsTop: true,
            fixedHeader: true,
            "pageLength":10,
            ajax: "{{ route('get.all.category.api', ['limit' => (\Request::get('limit')) ? \Request::get('limit') : 200]) }}",
            columns: [
                {data: 'action', name: 'action', "orderable": false},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'is_active', name: 'is_active'}
            ]
        });

        $(".dataTables_filter").append(' <button id="add_new" data-toggle="modal" data-target="#modal_new" class="btn btn-sm ml-2 btn-warning" style="float: right"><i class="fas fa-plus"></i> New </button>');
    });
});

</script>