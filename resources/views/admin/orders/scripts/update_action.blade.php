<script>
    $(document).on('click', '#update_status', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
          
            $('#status').val($(this).attr('data-mystatus'));
            $("#updateOrderForm").attr('action', 'orders/api/update_status/' + $(this).attr('data-myid'));
        });

    function updateFunc(){
            
            Swal.fire({
            title: 'Are you sure you want to update the status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = new FormData(document.getElementById("updateOrderForm"));
                    var url = $("#updateOrderForm").attr('action');
                    var csrfToken = $('meta[name="csrf-token"]').attr('content'); 
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: form,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken 
                            },
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                if(data.status == 200){
                                    $('#modal_update_status').modal('hide');
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                     })

                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    })
                                    $('#order_datatable').DataTable().ajax.reload(null, false);
                                }
                                else{
                                    Swal.fire({
                                        title: data.message,
                                        icon: 'error'
                                    });
                                }
                            },
                            complete: function() {
                                $('#loader').hide();
                            },
                            error: function(jqXHR, testStatus, error) {
                                Swal.fire({
                                    title: "Opps.. There is something wrong!",
                                    icon: 'error'
                                });
                            },
                        });
                }
            })
           
        }
</script>