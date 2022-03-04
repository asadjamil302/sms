
{{-- edit  --}}

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
                                            <input type="text" class="form-control form-control-lg"  name="student_name" value="{{$student->student_name}}" reqired>
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
                                            <label for="dob">Date Of Birth</label>
                                            <input type="date" class="form-control form-control-lg"  name="dob" value="{{$student->dob}}" reqired>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="admission_date">Admission Date</label>
                                                <input type="date" class="form-control form-control-lg"  name="admission_date" value="{{$student->admission_date}}" reqired>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label for="example-select2">Select class</label>
                                            <select class="js-select2 form-control multiple-select" id="example2-select2-multiple" name="clazz_name[]" >
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                @foreach($clazz as $item)
                                                <option value="{{$item->id}}" {{in_array($item->id, $clazz_subjects) ? 'selected':''}}> {{$item->clazz_name}}</option>
                                                    {{-- <option >{{$item->clazz_name}}</option> --}}
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="student_address">Enter the Address</label>
                                                <input type="text" class="form-control form-control-lg"  name="student_address" value="{{$student->student_address}}" reqired>
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
                                                <input type="file" class="form-control"  name="student_image" value="{{ asset('image/students/'.$student->student_image)}}" reqired>
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
                                            <input type="text" class="form-control form-control-lg"  name="parent_name" value="{{$student->parent_name}}" reqired>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="parent_cnic">Parent CNIC</label>
                                            <input type="text" class="form-control form-control-lg"  name="parent_cnic" value="{{$student->parent_cnic}}" reqired>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="parent_contact">Parent contact</label>
                                            <input type="text" class="form-control form-control-lg"  name="parent_contact" value="{{$student->parent_contact}}" reqired>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="emergency_contact">Emergency Contact</label>
                                            <input type="text" class="form-control form-control-lg"  name="emergency_contact" value="{{$student->emergency_contact}}" reqired>                         
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