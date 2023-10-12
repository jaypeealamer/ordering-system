<div class="modal fade" id="modal_update_status"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="updateOrderForm" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                            <label>Status</label>
                                <select class="form-control" id="status" name='status' style="width: 100%;">
                                        <option value="ordered">Ordered</option>
                                        <option value="on delivery">On Delivery</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="cancelled">Cancelled</option>
                                </select>
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