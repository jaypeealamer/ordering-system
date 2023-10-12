<script>
    var dataTable = null; 
    function viewStatusHistory(id){
        if (dataTable) {
            dataTable.destroy(); // Destroy the existing DataTable
        }
        $("#status_history_order_datatable").empty(); // Remove the existing DataTable element

        dataTable =  $("#status_history_order_datatable").DataTable({
            processing: true,
            serverSide: true,
            responsive: false,
            "pagingType": "full_numbers",
            "order": [ 2, "desc" ],
            fixedHeader: true,
            "pageLength":10,
            ajax: {
                url: "{{ route('get.all.orders.history.admin.api')}}",
                data: function (d) {
                    d.id = id;
                }
            },
            columns: [
                {data: 'order_status', name: 'order_status'},
                {data: 'created_date', name: 'created_date'},
                {data: 'id', name: 'id', visible: false},
            ]
        });

    }

</script>