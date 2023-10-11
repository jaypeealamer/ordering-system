<script>
    function delUserFunc(id){
            Swal.fire({
            title: 'Are you sure you want to delete this User?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var deleteUrl = '{{ route("user.destroy.api", ":id") }}'.replace(':id', id);
                    var csrfToken = $('meta[name="csrf-token"]').attr('content'); 
                    $.ajax({
                        method: "DELETE",
                        url: deleteUrl,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken 
                        },
                        success: function(data) {
                            if(data.status == 200){
                                Swal.fire({
                                        title: data.message,
                                        icon: 'success'
                                    });
                                $('#user_datatable').DataTable().ajax.reload(null, false);
                            }
                            else{
                                Swal.fire({
                                        title: "Error Failed",
                                        icon: 'error'
                                    });
                                $('#user_datatable').DataTable().ajax.reload(null, false);
                            }
                        },
                        error:function(error){
                            console.log(error);
                                Swal.fire({
                                        title: 'Opps.. There is something wrong!',
                                        icon: 'error'
                                    });
                        }
                    });
                }
            })
           
        }
</script>