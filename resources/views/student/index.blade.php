
@extends('master.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('content')
     <!-- Page Content -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ session('success') }}
            </div>
        @endif
     <body>
     <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Rollno</th>
                <th>Department</th>
                <th>Subjects</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($students as $item)
            
            <tr>
                <td>{{$item->studentname}}</td>
                <td>{{$item->rollno}}</td>
                <td>{{$item->department}}</td>
                <td> 
                     @foreach ($item->subjects as $sub)
                    <span class="badge badge-primary">{{$sub->subject_name}}</span>
                    @endforeach

                </td>
                <td><a class="btn btn-primary" href="{{route('student.edit', $item)}}">Edit</a></td>
                <form action="{{route('student.destroy', $item)}}" method="post">
                 @method('delete')
                 @csrf
                    <td> <button class="btn btn-primary" type="submit">Delete</button></td> 
              
                  
                </form>
                       
              
                </tr>
            @endforeach
            
        </tbody>
    </table>
     </body>
    <!-- END Page Content -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@endsection











