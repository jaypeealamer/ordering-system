<div class="modal fade" id="modal_update"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="updateCategoryForm" method="POST" >
                    @csrf
                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control form-control-border"  id="name_upd" name="name" placeholder="Category Name">
                            </div>
                        </div>
                    </div>


                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <input type="text" class="form-control form-control-border" id="description_upd"  name="description" placeholder="Remarks">
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