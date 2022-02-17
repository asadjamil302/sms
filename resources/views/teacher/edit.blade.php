@extends('master.app')

@section('content')

    @if (session('success'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        {{ session('success') }}
    </div>
    @endif
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading"></h2>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <!-- Default Elements -->
            <div class="block ">
                <div class="block block-themed">
                    <div class="block-header bg-corporate-light">
                        <h3 class="block-title">teacher Form</h3>
                    </div>
                </div>
                <div class="block-content justify-content-center" >
                    <form action="{{route('teacher.update', $teacher)}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')
                        <div class="form-group row" >
                            <label class="col-12"></label>
                            <div class="col-md-6">
                                <div class="form-control-plaintext">Teacher name</div>
                                <input type="text" class="form-control @if($errors->has('teacher_name')) is-invalid @endif"  value="{{$teacher->teacher_name}}"   id="example-text-input"   name="teacher_name" placeholder="Teacher Name">
                                @if($errors->has('teacher_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('teacher_name') }}</strong>
                                </span>
                            
                            @endif
                            </div>
                            <div class="row ml-4">
                                <div class="form-group   ">
                                    <label class="col-12 mt-1" for="example-file-input">Enter Your Image</label>
                                    <div class="col-md-6 mt-1">
                                        <input type="file" value="{{$teacher->image}}" class="form-control-file  @if($errors->has('image')) is-invalid @endif" id="example-file-input" name="image">
                                        @if($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                
                                @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-12 " for="example-email-input">Email</label>
                            
                            <div class="col-md-6">
                                <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif"  value="{{$teacher->email}}" id="example-email-input" name="email" placeholder="Email..">
                                @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            
                            @endif
                            </div>
                           
                        
                        </div>
                        <div class="form-group row ">
                            <label class="col-12" for="example-password-input">CNIC</label>

                            <div class="col-md-6">
                                <input type="text"  value="{{$teacher->cnic}}" class="form-control @if($errors->has('cnic')) is-invalid @endif" id="example-password-input" name="cnic" placeholder="Enter your CNIC No">
                                @if($errors->has('cnic'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cnic') }}</strong>
                                </span>
                            
                            @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input-valid">Phone no</label>
                            <div class="col-md-6">
                                <input type="text"  value="{{$teacher->phone_no}}" class="form-control @if($errors->has('phone_no')) is-invalid @endif" id="example-text-input-valid" name="phone_no" placeholder="Enter your Phone No">
                                @if($errors->has('phone_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                </span>
                            
                            @endif
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group row">
                            <label class="col-12" for="example-select">salary</label>
                            <div class="col-md-6">
                                <select  value="{{$teacher->salary}}" class="form-control @if($errors->has('salary')) is-invalid @endif" id="example-select" name="salary">
                                    <option >20000</option>
                                    <option >30000</option>
                                    <option >40000</option>
                                    <option >50000</option>
                                </select>
                                @if($errors->has('salary'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('salary') }}</strong>
                                </span>
                            
                            @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-12 " for="example-select">designation</label>
                            <div class="col-md-6">
                                <select  value="{{$teacher->designation}}" class="form-control  @if($errors->has('designation')) is-invalid @endif" id="example-select" name="designation">
                                    <option >Lab attendender</option>
                                    <option >junior lecturer</option>
                                    <option >lecturer</option>
                                    <option >senior lecturer</option>
                                    <option >HOD</option>
                                    <option >Dean</option>
                                </select>
                                @if($errors->has('designation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                            
                            @endif
                            </div>
                        </div>
                       
                        
                    
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <!-- END Default Elements -->
        </div>
    </div> 
   
@endsection