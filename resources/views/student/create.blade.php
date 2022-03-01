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
                                            <input type="text" class="form-control form-control-lg  @if($errors->has('student_name')) is-invalid @endif"  name="student_name" placeholder="Enter student Name">
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
                                                <input type="text" class="form-control form-control-lg  @if($errors->has('rollno')) is-invalid @endif"  name="rollno" placeholder="Enter your rollno">
                                                @if($errors->has('rollno'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('rollno') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="dob">Date Of Birth</label>
                                            <input type="date" class="form-control form-control-lg  @if($errors->has('dob')) is-invalid @endif"  name="dob" placeholder="Enter Subject Name">
                                            @if($errors->has('dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="admission_date">Admission Date</label>
                                                <input type="date" class="form-control form-control-lg  @if($errors->has('admission_date')) is-invalid @endif"  name="admission_date" placeholder="Enter admission date">
                                                @if($errors->has('admission_date'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('admission_date') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label for="example-select2">Select class</label>
                                            <select class="js-select2 form-control @if($errors->has('clazz_name')) is-invalid @endif multiple-select" id="example2-select2-multiple" name="clazz_name" data-placeholder="Choose one.." >
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                @if($errors->has('clazz_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('clazz_name') }}</strong>
                                                    </span>
                                                @endif
                                                @foreach($clazz as $item)
                                                    <option >{{$item->clazz_name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="student_address">Enter the Address</label>
                                                <input type="text" class="form-control form-control-lg  @if($errors->has('student_address')) is-invalid @endif"  name="student_address" placeholder="Enter student address">
                                                @if($errors->has('student_address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('student_address') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                    </div>
               
                            </div>

                    
                                    <div class="form-group row">
                                        <div class="col-lg-9 ">
                                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                   {{-- end Student info --}}

                    <div class="col-lg-4 col-12">

                         {{-- for student image --}}
                         <div class="block block-themed">
                            <div class="block-header  text-center bg-corporate-light">
                                <h3 class="block-title">Student Image</h3>
                            </div>

                            <div class="block-content block-content-full text-center">
                                <img class="img-avatar img-avatar-thumb" src="{{asset('assets/media/avatars/avatar1.jpg')}}" alt="">
                            </div>

                            <div class="block-content">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="user_image">Upload Image</label>
                                                <input type="file" class="form-control @if($errors->has('student_image')) is-invalid @endif"  name="student_image">
                                                @if($errors->has('student_image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('student_image') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>

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
                                            <input type="text" class="form-control form-control-lg  @if($errors->has('parent_name')) is-invalid @endif"  name="parent_name" placeholder="Enter parent Name">
                                            @if($errors->has('parent_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('parent_name') }}</strong>
                                            </span>
                                            @endif                             </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="parent_cnic">Parent CNIC</label>
                                            <input type="text" class="form-control form-control-lg  @if($errors->has('parent_cnic')) is-invalid @endif"  name="parent_cnic" placeholder="Enter parent CNIC">
                                            @if($errors->has('parent_cnic'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('parent_cnic') }}</strong>
                                            </span>
                                            @endif                             </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="parent_contact">Parent contact</label>
                                            <input type="text" class="form-control form-control-lg  @if($errors->has('parent_contact')) is-invalid @endif"  name="parent_contact" placeholder="Enter the Guardian contact">
                                            @if($errors->has('parent_contact'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('parent_contact') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="emergency_contact">Emergency Contact</label>
                                            <input type="text" class="form-control form-control-lg  @if($errors->has('emergency_contact')) is-invalid @endif"  name="emergency_contact" placeholder="Enter the contact always on">
                                            @if($errors->has('emergency_contact'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('emergency_contact') }}</strong>
                                            </span>
                                            @endif                             
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                        <div class="form-group">
                                            <label for="parentemail">Parent Email</label>
                                                <input type="email" class="form-control form-control-lg  @if($errors->has('parent_email')) is-invalid @endif"  name="parent_email" placeholder="Enter Parent Email">
                                                @if($errors->has('parent_email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('parent_email') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                    </div> --}}

                                    
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