<script>
    function activeInactiveMenuFunc(id, is_active){
            let href = $('#activateMenu').attr('data-attr') + id + '/' + is_active;
            title_text = (is_active) ? 'deactivate' : "activate";
            Swal.fire({
            title: 'Are you sure you want to ' + title_text + ' this Menu?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ' + title_text + ' it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: "GET",
                        success: function(data) {
                            if(data.status == 200){
                                Swal.fire({
                                        title: data.message,
                                        icon: 'success'
                                    });
                                $('#menu_datatable').DataTable().ajax.reload(null, false);
                            }
                        },
                        error:function(error){
                            console.log(error);
                            Swal.fire({
                                title: 'Error Failed!',
                                icon: 'error'
                            });
                        }
                    });
                }
            })
           
        }
</script>