
@extends('master.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('content')
     <!-- Page Content -->
     <div class="content">
     
        <form action="{{route('subjects.update', $item->id)}}" method="POST">
            @csrf
            <div class="container" width="80%">
                    <div class="form-colume">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Subject Name</label>
                            <input type="name" name="subject_name" value="{{$item->subject_name}}" class="form-control" id="inputEmail4" placeholder="Enter the Subject Name">
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Subject code</label>
                            <input type="text" name="subject_code" value="{{$item->subject_code}}" class="form-control" id="inputPassword4" placeholder="Enter the Subject Code">
                        </div>

                        <div class="form-group col-md-6 ">
                             <button type="submit" class="btn btn-primary">Update data</button>
                        </div>
                    </div>
    
            <div>
        </form>
    </div>
    <!-- END Page Content -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@endsection











