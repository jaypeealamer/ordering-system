<div class="modal fade" id="modal_update"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="updateUserForm" method="POST" action="{{route('user.store')}}">
                    @csrf
                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control form-control-border" name="name" id="name_upd" placeholder="Name">
                            </div>
                        </div>
                    </div>


                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="remarks">Email *</label>
                                <input type="email" class="form-control form-control-border" name="email" id="email_upd" placeholder="example@email.com">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="remarks">Password * <span class="text-danger"> Please leave it blank to not update </span></label>
                                <input type="password" class="form-control form-control-border" name="password" id="password_upd" placeholder="Password">
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="updateFunc()" id="update_btn" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>