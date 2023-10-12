@extends('layouts.home_page')
@section('css')
@include('layouts.css.datatables')
<style>
#thumbnail{ 
    width: 100%;
    height: 200px; 
    background-image: url('/assets/images/food_thumbnail.jpeg'); 
    background-size: cover; 
    padding-top: 100px;
    background-position: center; 
}
th{
    border: 0 !important;
}
</style>
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
   
   <div class="container-fluid bg-dark" id="thumbnail">
    <center>
            <div class="col-5" style="">
                <div class="input-group">
                    <select id="search"  multiple class="form-control form-control-lg">
                        <option value="" selected></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
    </center>
   </div>
   <center>
        <h1 class="font-weight-bold m-4">
            Food Menu
        </h1>
   </center>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">

                    <table id="menu_datatable" style="width:100%" class="table  table-striped">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>
                    </tbody>
                        <tfoot>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Category</th>
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
    @include('home.modals.create')

   
@endsection

@section('js')

@include('layouts.admin.scripts.datatables')

@include('home.scripts.main-table')
@include('home.scripts.order_action')


<script>
   $(document).ready(function() {
        $('#search').select2({
            width: "100%",
            placeholder: "Select Category",
            allowClear: true,
        })

     
    })
    
</script>

@endsection
