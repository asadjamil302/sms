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
           

            <div class="block block-themed">
                <div class="block-header bg-corporate-light">
                    <h3 class="block-title">Subject Form</h3>
                </div>
                <div class="block-content">
                    <form action="{{route('subject.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="subject_name">Subject Name</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control  @if($errors->has('subject_name')) is-invalid @endif"  name="subject_name" placeholder="Enter Subject Name">
                                    @if($errors->has('subject_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="subject_code">Subject code</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control @if($errors->has('subject_code')) is-invalid @endif"  name="subject_code" placeholder="Enter Subject Code">
                                    @if($errors->has('subject_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
        
                           
        
                            <div class="form-group row">
                                <div class="col-lg-9 ml-auto">
                                    <button type="submit" class="btn btn-alt-primary">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
  
    @endsection
    @section('script')

    @endsection