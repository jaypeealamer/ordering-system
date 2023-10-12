<script>
    $(document).on('click', '#create_order', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            
            $('#name').val('');
            $('#quantity').val(1);
            $('#number').val('');
            $('#address').val('');
          
            $.ajax({
                url: href,
                success: function(result) {

                    $('#modal_order').modal('show');
                    $('#order_name').val((result.menu.name).toUpperCase());
                    $('#price').val((result.menu.price).toUpperCase());
                    $('#menu_id').val((result.menu.id));
                    
                    $("#createOrderForm").attr('action', 'order/api/update/' + result.menu.id);
                   

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


                var href = $('#createOrderForm').attr('action');
                var data = new FormData(document.getElementById("createOrderForm"));
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
                            $("#email").val('');
                            $("#password").val('');
                            $('#modal_order').modal('hide');
                            $('#order_datatable').DataTable().ajax.reload(null, false);


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