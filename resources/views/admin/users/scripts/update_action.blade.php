<script>
    $(document).on('click', '#updateUser', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
          
            $('#name_upd').val("");
            $('#email_upd').val("");
            $('#password_upd').val("");
            $.ajax({
                url: href,
                success: function(result) {

            $('#modal_update').modal('show');

                    $("#updateUserForm").attr('action', 'user/api/update/' + result.user.id);
                    $('#name_upd').val(result.user.name);
                    $('#email_upd').val(result.user.email);

                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
            });
        });

    function updateFunc(){
            
            Swal.fire({
            title: 'Are you sure you want to update this User?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = new FormData(document.getElementById("updateUserForm"));
                    var url = $("#updateUserForm").attr('action');
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
                                    $('#modal_update').modal('hide');
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
                                    $('#user_datatable').DataTable().ajax.reload(null, false);
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