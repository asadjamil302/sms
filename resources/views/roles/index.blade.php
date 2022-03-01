
@extends('master.app')
@section('css')
         <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">

@endsection
@section('content')
<!-- Page Content -->

<div class="content">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ session('success') }}
        </div>
    @endif

    <!-- Dynamic Table Full -->
                    <div class="block block-themed">
                        <div class="block-header bg-corporate-light">
                            <h3 class="block-title">Roles</h3>
                        </div>
                        <div class="block-content block-content-full">
                                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->

                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Role Name</th>
                                            <th>permissions</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                            @php
                                                $usy_no = 1;
                                            @endphp
                                            @foreach ($roles as $item)
                                
                                                <tr>
                                                    <th>{{$usy_no++}}</th>
                                                    <td>{{$item->name}}</td>
                
                                                    <td> 
                                                        @foreach ($item->permissions as $sub)
                                                            <span class="badge badge-primary">{{$sub->name}}</span>
                                                        @endforeach

                                                    </td>

                                                    <td class="text-center">
                                                        <div class="btn-group">

                                                            <a class="btn btn-warning" href="{{route('roles.edit', $item)}}">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <form action="{{route('roles.destroy', $item)}}" method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger ml-1" type="submit">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            
                                                                
                                                            </form>
                                                        </div>
                                                    </td>  
                                                </tr>
                                            @endforeach
                                
                                    </tbody>
                                </table>
                        </div>
                    </div>
    <!-- END Dynamic Table Full -->
</div>
    
@endsection
@section('script')
    <!-- Page JS Plugins -->
        <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('assets/js/pages/be_tables_datatables.min.js')}}"></script>

@endsection