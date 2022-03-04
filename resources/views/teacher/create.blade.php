@extends('master.app')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')
<div class="content" >
    @if (session('success'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        {{ session('success') }}
    </div>
    @endif
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
                <div class="block-content justify-content-center" >
                    <form action="{{route('teacher.store')}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row" >
                            <label class="col-12"></label>
                            <div class="col-md-6">
                                <div class="form-control-plaintext">teacher name</div>
                                <input type="text" class="form-control @if($errors->has('teacher_name')) is-invalid @endif"   id="example-text-input"   name="teacher_name" placeholder="teacher Name">
                                @if($errors->has('teacher_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('teacher_name') }}</strong>
                                </span>
                            
                            @endif
                            </div>
                            <div class="row ml-4">
                                <div class="form-group">
                                    <label class="col-12" for="example-file-input">Upload Image</label>
                                        <div class="col-md-6 ">
                                          
                                            
                                        <input type="file" class="form-control-file @if($errors->has('image')) is-invalid @endif" id="example-file-input" name="image" >
                                       
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
                                <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="example-email-input" name="email" placeholder="Email..">
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
                                <input type="text" class="form-control @if($errors->has('cnic')) is-invalid @endif" id="example-password-input" name="cnic" placeholder="Enter your CNIC No">
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
                                <input type="text" class="form-control @if($errors->has('phone_no')) is-invalid @endif" id="example-text-input-valid" name="phone_no" placeholder="Enter your Phone No">
                                @if($errors->has('phone_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                </span>
                            
                            @endif
                            </div>
                        </div>
                        
                        <div class="form-group row" id="dynamic_add">
                            <div class="col-12 col-md-4">
                                <div class="form-group ">
                                    <label for="example-select2">Assign class</label>
                                    <select class="js-select2 form-control multiple-select" id="example2-select2-multiple" name="" style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="form-group ">
                                    <label for="example-select2">Assign Subject</label>
                                    <select class="js-select2 form-control multiple-select" id="example-select2-multiple" name="" style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group ">
                                    <button type="button" id="add_btn" class="btn btn-alt-primary text-center">Add More</button>
                                </div>
                            </div>
                        </div>  
                       
                        
                  

                        <div class="form-group row">
                            <label class="col-12" for="example-select">salary</label>
                            <div class="col-md-6">
                                <select class="form-control @if($errors->has('salary')) is-invalid @endif" id="example-select" name="salary">
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
                                <select class="form-control  @if($errors->has('designation')) is-invalid @endif" id="example-select" name="designation">
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#add_btn').on('click', function() {

                var html ='';
                html+='';
                html+='<div class="col-12 col-md-4"><div class="form-group"><label for="example-select2">Assign class</label><select class="js-select2 form-control multiple-select" id="example2-select2-multiple" name="" style="width: 100%;" data-placeholder="Choose one.."><option></option></select></div></div>';
                html+='<div class="col-12 col-md-4"><div class="form-group"><label for="example-select2">Assign Subject</label><select class="js-select2 form-control multiple-select" id="example-select2-multiple" name="" style="width: 100%;" data-placeholder="Choose one.."><option></option></select></div></div>';
                html+='<div class="col-12 col-md-2"><div class="form-group"><button type="button"  class="btn btn-alt-primary text-center" id="remove"><i class="fa fa-trash"></i></button></div></div>';
                html+='</div>';
                $('#dynamic_add').append(html);

            });
        });
        $(document).on('click', '#remove', function() {
                $(this).closest('#dynamic_add').remove();

            });

    </script>



    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    {{-- <script>jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script> --}}
    <script>jQuery(function(){ Codebase.helpers(['select2']); });</script>

@endsection