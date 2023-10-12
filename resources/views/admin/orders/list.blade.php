@extends('layouts.admin.app')
@section('css')
@include('layouts.css.datatables')
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
   
    @include('layouts.partials._page_header',['mainTitle' => "Manage Orders", 'subTitle' => "Orders"])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">

                    <table id="order_datatable" style="width:100%" class="table  table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>
                    </tbody>
                        <tfoot>
                            <th></th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Image</th>
                        </tfoot>
                    </table>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    @include('admin.orders.modals.update')
    @include('admin.orders.modals.status_history')

@endsection

@section('js')

@include('layouts.admin.scripts.datatables')
@include('admin.orders.scripts.main-table')
@include('admin.orders.scripts.history-table')
@include('admin.orders.scripts.update_action')

<script>
   $(document).ready(function() {
        $('#category').select2({
            dropdownParent: $("#modal_new .modal-content"),
            width: "100%",
            placeholder: "Select Category",
            allowClear: false,
        })


        $('#category_upd').select2({
            dropdownParent: $("#modal_update .modal-content"),
            width: "100%",
            placeholder: "Select Category",
            allowClear: false,
        })
    })
</script>
@endsection
