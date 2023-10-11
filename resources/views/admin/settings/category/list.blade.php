@extends('layouts.admin.app')
@section('css')
@include('layouts.css.datatables')

@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
   
    @include('layouts.partials._page_header',['mainTitle' => "Manage Categories", 'subTitle' => "Category"])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                <div class="table-responsive">
                    <table id="category_datatable" style="width:100%"  class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <th></th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
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
    @include('admin.settings.category.modals.create')
    @include('admin.settings.category.modals.update')

@endsection

@section('js')

@include('layouts.admin.scripts.datatables')
@include('admin.settings.category.scripts.main-table')
@include('admin.settings.category.scripts.create_action')
@include('admin.settings.category.scripts.update_action')
@include('admin.settings.category.scripts.delete_action')
@include('admin.settings.category.scripts.active_inactive_action')
@endsection
