@extends('layouts.admin.app')
@section('css')
@include('layouts.css.datatables')

@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
   
    @include('layouts.partials._page_header',['mainTitle' => "Manage Menus", 'subTitle' => "Menu"])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="category_datatable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                   </tbody>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    @include('admin.menu.modals.create')
    @include('admin.menu.modals.update')

@endsection

@section('js')

@include('layouts.admin.scripts.datatables')
@include('admin.menu.scripts.main-table')
@include('admin.menu.scripts.create_action')
@include('admin.menu.scripts.update_action')
@include('admin.menu.scripts.delete_action')
@include('admin.menu.scripts.active_inactive_action')
@endsection
