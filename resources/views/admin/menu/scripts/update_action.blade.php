<script>
    $(document).on('click', '#updateMenu', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
          
            $('#name_upd').val("");
            $('#description_upd').val("");
            $('#category_upd').val('').trigger('change');
            $('#price_upd').val('');
            $("#featuredSwitch_upd").prop("checked", false);

            $.ajax({
                url: href,
                success: function(result) {

            $('#modal_update').modal('show');

                    $("#updateMenuForm").attr('action', 'menu/api/update/' + result.menu.id);
                    $('#name_upd').val((result.menu.name).toUpperCase());
                    $('#category_upd').val(result.menu.category_id).trigger('change');
                    $('#description_upd').val(result.menu.description);
                    if(result.menu.featured){
                        $("#featuredSwitch_upd").prop("checked", true);
                    }
                    $('#price_upd').val(result.menu.price);
                 
                   

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
            title: 'Are you sure you want to update this Menu?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = new FormData(document.getElementById("updateMenuForm"));
                    var url = $("#updateMenuForm").attr('action');
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
                                    $('#menu_datatable').DataTable().ajax.reload(null, false);
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