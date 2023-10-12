<div class="modal fade" id="modal_order"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="createOrderForm" method="POST" action="{{route('user.store')}}">
                    @csrf
                    <center><strong>Order Details</strong></center>
                    <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control form-control-border"  readonly  id="order_name" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    
                      <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="name">Price (₱) *</label>
                                <input type="number" class="form-control form-control-border"  readonly  id="price" name='price' placeholder="Name">
                        </div>
                        </div>
                    </div>
                    

                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                                <input type="hidden" class="form-control form-control-border"  readonly  id="menu_id" name="menu_id" placeholder="Name">
                        </div>
                    </div>

                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="name">Quantity *</label>
                                <input type="number" class="form-control form-control-border"    id="quantity" name="quantity" placeholder="" value=1 min=1> 
                        </div>
                        </div>
                    </div>
                    
              
                    <center><strong>Delivery Details</strong></center>

                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control form-control-border" name="name" id="name" placeholder="Name">
                            </div>
                        </div>
                    </div>


                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="remarks">Phone Number *</label>
                                <input type="number" class="form-control form-control-border" name="number" id="number" placeholder="E.g 09123000000">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label>Address *</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="E.g  Building, Street, Barangay, City"></textarea>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="createBtn()" id="create_btn" class="btn btn-primary">Order</button>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>