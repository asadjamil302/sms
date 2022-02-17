
@extends('master.app')
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
    <div class="block block-themed">
        <div class="block-header bg-gd-dusk">
            <h3 class="block-title">Student</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <div class="table-responsive">

                <table class="table table-striped table-vcenter">    
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Rollno</th>
                            <th>Department</th>
                            <th>Subjects</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sr_no = 1;
                        @endphp
                        @foreach ($students as $item)
            
                        <tr>
                            <th>{{$sr_no++}}</th>
                            <td>{{$item->studentname}}</td>
                            <td>{{$item->rollno}}</td>
                            <td>{{$item->department}}</td>
                            <td> 
                                    @foreach ($item->subjects as $sub)
                                <span class="badge badge-primary">{{$sub->subject_name}}</span>
                                @endforeach
            
                            </td>
                            <td class="text-center">
                                <div class="btn-group">

                                    <a class="btn btn-warning" href="{{route('student.edit', $item)}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{route('student.destroy', $item)}}" method="post">
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
    </div>
</div>
    
@endsection











