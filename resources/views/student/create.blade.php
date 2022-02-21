@extends('master.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/js/plugins/select2/css/select2.min.css')}}">
@endsection

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
             <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
        
                    <div class="col-lg-8 col-12">
                        <div class="block  block-themed">
                            <div class="block-header bg-corporate-light">
                                <h3 class="block-title">Subject Form</h3>
                            </div>
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="student_name">Student Name</label>
                                            <input type="text" class="form-control form-control-lg  @if($errors->has('student_name')) is-invalid @endif"  name="student_name" placeholder="Enter Subject Name">
                                            @if($errors->has('student_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('student_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="rollno">Roll no</label>
                                                <input type="text" class="form-control form-control-lg  @if($errors->has('rollno')) is-invalid @endif"  name="rollno" placeholder="Enter Subject Code">
                                                @if($errors->has('rollno'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('rollno') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                                    <select id="inputState"name="department"  class="form-control    @if($errors->has('department')) is-invalid @endif">
                                        
                                                            @if($errors->has('department'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('department') }}</strong>
                                                            </span>
                                                            @endif
            
                                                            <option selected>computer science</option>
                                                            <option>software engineering</option>
                                                            <option>information technology</option>
                                                    </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label for="example-select2">Select Subject</label>
                                            <select class="js-select2 form-control @if($errors->has('subject[]')) is-invalid @endif multiple-select" id="example2-select2-multiple" name="subject[]" style="width: 100%;" data-placeholder="Choose one.." multiple>
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                @if($errors->has('subject[]'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('subject[]') }}</strong>
                                                    </span>
                                                @endif
                                                @foreach($subjects as $item)
                                                    <option value="{{$item->id}}">{{$item->subject_name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>




                                </div>

                                        
                                        
                           
                    
                                        {{-- <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="department">Department</label>
                                                <div class="col-lg-4">
                                                    <select id="inputState"name="department"  class="form-control    @if($errors->has('department')) is-invalid @endif">
                                        
                                                            @if($errors->has('department'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('department') }}</strong>
                                                            </span>
                                                            @endif
            
                                                            <option selected>computer science</option>
                                                            <option>software engineering</option>
                                                            <option>information technology</option>
                                                    </select>
                                                </div>
                                        </div> --}}
            
                                       
                                        {{-- <div class="form-group row">
                                            <label class="col-12" for="example-select2">Select Subject</label>
                                            <select class="js-select2 form-control @if($errors->has('subject[]')) is-invalid @endif multiple-select" id="example2-select2-multiple" name="subject[]" style="width: 100%;" data-placeholder="Choose one.." multiple>
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                @if($errors->has('subject[]'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('subject[]') }}</strong>
                                                    </span>
                                                @endif
                                                @foreach($subjects as $item)
                                                    <option value="{{$item->id}}">{{$item->subject_name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div> --}}
                                  
                                    
                    
                                    <div class="form-group row">
                                        <div class="col-lg-9 ml-auto">
                                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">

                    </div>
                </div>
            </form>
            
            
        </div>
  
    @endsection
    @section('script')
    <script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    {{-- <script>jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script> --}}
    <script>jQuery(function(){ Codebase.helpers(['select2']); });</script>



    @endsection