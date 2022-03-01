@extends('master.app')
@section('content')

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
                            <h3 class="block-title">Subject</h3>
                        </div>
                        <div class="block-content block-content-full">
                                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->

                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                   <thead>
                        <tr>
                            <th>#</th>
                            <th>student Name</th>
                            <th>student rollno</th>
                            <th>date</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sr_no = 1;
                        @endphp
                        @foreach ($attendance as $item)
            
                        <tr>
                            
                            <td>{{$sr_no++}}</td>
                            <td>{{$item->student_name}}</td>
                            <td>{{$item->rollno}}</td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->attendance}}</td>
                            <td class="text-center">
                                {{-- <div class="btn-group">

                                    <a class="btn btn-warning" href="{{route('subject.edit', $item)}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('subject.destroy',$item) }}" method="post" enctype="multipart/form-data">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger ml-1" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    
                                        
                                    </form>
                                </div> --}}
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