
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
       
     <div class="content">
        <form action="{{route('subject.store')}}" method="POST">
            @csrf
            <div class="container" width="80%">
                    <div class="form-colume">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Subject Name</label>
                            <input type="text" name="subject_name" class="form-control @if($errors->has('subject_name')) is-invalid @endif"  id="inputEmail4" placeholder="Enter the Subject Name">
                           
                            @if($errors->has('subject_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subject_name') }}</strong>
                                </span>
                            
                            @endif
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Subject code</label>
                            <input type="text" name="subject_code" class="form-control @if($errors->has('subject_code')) is-invalid @endif" id="inputPassword4" placeholder="Enter the Subject Code">
                            @if($errors->has('subject_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subject_code') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-6 ">
                             <button type="submit" class="btn btn-primary">Submit</button>
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











