
@extends('master.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('content')
     <!-- Page Content -->
     <div class="content">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach ($subjects as $item)
                <tr>
                    <td>{{$item->slug}}</td>
                    <td>{{$item->subject_name}}</td>
                    <td>{{$item->subject_code}}</td>
                    <td>{{$item->status}}</td>

                    <td><a class="btn btn-primary" href="{{route('subject.edit', $item)}}">Edit</a></td>
                    <form action="{{ route('subject.destroy',$item) }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('DELETE')
                            <td>
                                <button class="btn btn-primary" type="submit">Delete</button>
                    
                            </td>
                    </form>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <!-- END Page Content -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@endsection











