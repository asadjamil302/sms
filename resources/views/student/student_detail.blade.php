@extends('master.app')
@section('content')

    <!-- Page Content -->
    <!-- User Info -->
    <div class="content">
    <div class="bg-image bg-image-bottom" style="background-image: url({{url('assets/media/photos/photo27@2x.jpg')}});">
        <div class="bg-black-op-75 py-30">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-15">
                    <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('image/students/'.$student->student_image)}}" alt="">
                    </a>
                </div>
                <!-- END Avatar -->

                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">{{$student->student_name}}</h1>
                <h2 class="h5 text-white-op">
                    {{$student->rollno}} 
                </h2>
                <!-- END Personal -->

                <!-- Actions -->
                <a href="{{route('student.index')}}" class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5">
                    <i class="fa fa-arrow-left mr-5"></i> Back to Profile
                </a>
                <!-- END Actions -->
            </div>
        </div>
    </div>
</div>
    <!-- END User Info -->

    <!-- Main Content -->
    <div class="content">
        <!-- User Profile -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-user-circle mr-5 text-muted"></i> Student Profile
                </h3>
            </div>
            <div class="block-content">
               
                    <div class="row items-push">
                        <div class="col-lg-5">
                            <div class="block">
                                
                                <div class="block-content">
                                    <table class="table table-borderless table-vcenter">
                                      
                                        <tbody>
                                            <tr>
                                                <th class="text-center" scope="row">Student Name</th>
                                                <td>{{$student->student_name}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Student Rollno</th>
                                                <td>{{$student->rollno}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Student Class</th>
                                                <td>{{$student->clazz_name}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Student Date of birth</th>
                                                <td>{{$student->dob}}</td>
                                                
                                            </tr>
                                        
                                            <tr>
                                                <th class="text-center" scope="row">Student Address</th>
                                                <td>{{$student->student_address}}</td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <div class="block">
                                
                                <div class="block-content">
                                    <table class="table table-borderless table-vcenter">
                                      
                                        <tbody>
                                            <tr>
                                                <th class="text-center" scope="row">Parent Name </th>
                                                <td>{{$student->parent_name}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Parent Contact </th>
                                                <td>{{$student->parent_contact}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Parent CNIC </th>
                                                <td>{{$student->parent_cnic}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Emergency Contact </th>
                                                <td>{{$student->emergency_contact}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Admission Date</th>
                                                <td>{{$student->admission_date}}</td>
                                                
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
        <!-- END User Profile -->

        <!-- Connections -->
        
        <!-- END Connections -->

        <!-- Change Password -->
       
        <!-- END Change Password -->

        
        <!-- END Billing Information -->
    </div>
    <!-- END Main Content -->
    <!-- END Page Content -->

@endsection