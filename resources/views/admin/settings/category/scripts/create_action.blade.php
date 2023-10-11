<script>
    function createBtn(){
        Swal.fire({
            title: 'Submit Request?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#create_btn').html('PROCESSING....')


                var href = $('#createCategoryForm').attr('action');
                var data = new FormData(document.getElementById("createCategoryForm"));
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); 

                $.ajax({
                    type: "POST",
                    url: href,
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken 
                    },
                    contentType: false,
                    processData: false,
                    success: function(result) {
                        if(result.status == 200){
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
                                title: result.message
                            })
                            $("#name").val('');
                            $("#description").val('');
                            $('#modal_new').modal('hide');
                            $('#category_datatable').DataTable().ajax.reload(null, false);


                        }else{
                            Swal.fire({
                                title: result.message,
                                icon: 'error',
                                confirmButtonColor: '#ffdb0f', 
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn text-dark btn-warning', 
                                },
                            });
                        }
                        $('#create_btn').html('Save');

                    }
                })

            }
         })
    }
</script>