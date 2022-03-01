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
           

            <div class="block block-themed">
                <div class="block-header bg-corporate-light">
                    <h3 class="block-title">Class Form</h3>
                </div>
                <div class="block-content">
                    <form action="{{route('clazz.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <label for="clazz_grade">class name</label>
                                        <select id="inputState"name="clazz_grade"   class="form-control   @if($errors->has('clazz_grade')) is-invalid @endif">
                            
                                                @if($errors->has('clazz_grade'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('clazz_grade') }}</strong>
                                                </span>
                                                @endif

                                                <option selected>1st</option>
                                                <option>2nd</option>
                                                <option>3rd</option>
                                                <option>4th</option>
                                                <option>5th</option>
                                                <option>6th</option>
                                                <option>7th</option>
                                                <option>8th</option>
                                                <option>9th</option>
                                                <option>10th</option>
                                                
                                        </select>
                            </div>
                        </div>
                            
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="clazz_section">class section</label>
                                        <select id="inputState"name="clazz_section"  class="form-control    @if($errors->has('clazz_section')) is-invalid @endif">
                            
                                                @if($errors->has('clazz_section'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('clazz_section') }}</strong>
                                                </span>
                                                @endif

                                                <option selected>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                        </select>
                            </div>
                        </div>
                            
                        
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="example-select2">Select Subject</label>
                                <select class="js-select2 form-control multiple-select" id="example2-select2-multiple" name="subject[]" style="width: 100%;" data-placeholder="Choose one.." multiple>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                   
                                    @foreach($subjects as $item)
                                        <option value="{{$item->id}}">{{$item->subject_name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
        
                            <div class="form-group row">
                                <div class="col-lg-9 ml-2">
                                    <button type="submit" class="btn btn-alt-primary">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
  
    @endsection
    @section('script')
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    {{-- <script>jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script> --}}
    <script>jQuery(function(){ Codebase.helpers(['select2']); });</script>

@endsection