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
             <form action="{{route('student.update', $student)}}" method="post" enctype="multipart/form-data">
                @method('patch') 
                @csrf
                <div class="row">
                    {{-- Student info --}}
                    <div class="col-lg-8 col-12">
                        <div class="block  block-themed">
                            <div class="block-header bg-corporate-light">
                                <h3 class="block-title">Student Form</h3>
                            </div>
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="student_name">Student Name</label>
                                            <input type="text" class="form-control form-control-lg" name="student_name" value="{{$student->student_name}}" reqired>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="rollno">Roll no</label>
                                                <input type="text" class="form-control form-control-lg"  name="rollno" value="{{$student->rollno}}" reqired>
                                               
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                                    <select id="inputState"name="department" value="{{$student->department}}" class="form-control" reqired>
                                        
                                                            <option selected>computer science</option>
                                                            <option>software engineering</option>
                                                            <option>information technology</option>
                                                    </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label for="example-select2">Select Subject</label>
                                            <select class="js-select2 form-control" id="example2-select2-multiple" name="subject[]" style="width: 100%;"  multiple>
                                              @foreach ($subjects as $item)
                                              <option value="{{$item->id}}" {{in_array($item->id, $student_subjects) ? 'selected':''}}> {{$item->subject_name}}</option>
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
                   {{-- end Student info --}}

                    <div class="col-lg-4 col-12">

                         {{-- for parent info --}}
                        <div class="block  block-themed">
                            <div class="block-header bg-corporate-light">
                                <h3 class="block-title">Student Parent Info</h3>
                            </div>
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="parent_name">Parent Name</label>
                                            <input type="text" class="form-control form-control-lg"  name="parent_name" value="{{$student->parent_name}}" required>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="parentemail">Parent Email</label>
                                                <input type="email" class="form-control form-control-lg"  name="parent_email" value="{{$student->parent_email}}" required>
                                              
                                        </div>
                                    </div>

                                    
                                </div>

                            </div>
                        </div>
                        {{-- for student image --}}
                        <div class="block block-themed">
                                <div class="block-header  text-center bg-corporate-light">
                                    <h3 class="block-title">Student Image</h3>
                                </div>

                                <div class="block-content block-content-full text-center">
                                    <img class="img-avatar img-avatar-thumb" src="{{ asset('image/students/'.$student->student_image)}}" alt="">
                                </div>

                                <div class="block-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="user_image">Upload Image</label>
                                                    <input type="file" class="form-control"  name="student_image" value="{{$student->student_image}}">
                                                  
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>




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