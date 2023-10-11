@extends('layouts.admin.app')
@section('css')
@include('layouts.css.datatables')

@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
   
    @include('layouts.partials._page_header',['mainTitle' => "Manage Users", 'subTitle' => "User Management"])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                <div class="table-responsive">
                    <table id="user_datatable" style="width:100%"  class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
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
    @include('admin.users.modals.create')
    @include('admin.users.modals.update')

@endsection

@section('js')

@include('layouts.admin.scripts.datatables')
@include('admin.users.scripts.main-table')
@include('admin.users.scripts.create_action')
@include('admin.users.scripts.update_action')
@include('admin.users.scripts.delete_action')
@endsection
