<div class="modal fade" id="modal_new"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="createMenuForm" method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">
                    @csrf
                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                            <label>Category *</label>
                                <select class="form-control select2-custom" id="category" name='category' style="width: 100%;">
                                    <option value="" selected></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> 

                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control form-control-border" name="name" id="name" placeholder="Menu Name">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="name">Price *</label>
                                <input type="number" class="form-control form-control-border" name="price" id="price" placeholder="Price">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="input_image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" name="image" class="custom-file-input" id="input_image">
                                        <label class="custom-file-label" for="input_image">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" value=1 name="featured" id="featuredSwitch">
                                    <label class="custom-control-label" for="featuredSwitch">Featured</label>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="row" style="margin-top: 1.5rem !important">
                        <div class="col-md-12" id="delivery_location_layout">
                            <div class="form-group">
                                <label for="remarks">Description</label>
                                <textarea type="text" class="form-control form-control-border" name="description" id="description" placeholder="Remarks"></textarea>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="createBtn()" id="create_btn" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>