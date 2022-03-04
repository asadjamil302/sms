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
                    <h3 class="block-title">Edit $ Update Form</h3>
                </div>
                <div class="block-content">
                    <form action="{{route('clazz.update', $clazz)}}" method="post" enctype="multipart/form-data">
                        @method('patch') 
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <label for="clazz_grade">class name</label>
                                        <select id="inputState"name="clazz_grade" value="{{$clazz->clazz_grade}}"  class="form-control" required>
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
                                        <select id="inputState"name="clazz_section" value="{{$clazz->clazz_section}}" class="form-control" required>
                                                <option selected>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                        </select>
                            </div>
                        </div>
                            
                        
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="example-select2">Select Subject</label>
                                <select class="js-select2 form-control" id="example2-select2-multiple" name="subject[]" style="width: 100%;"  multiple>
                                  @foreach ($subjects as $item)
                                  <option value="{{$item->id}}" {{in_array($item->id, $clazz_subjects) ? 'selected':''}}> {{$item->subject_name}}</option>
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
    <script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    {{-- <script>jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script> --}}
    <script>jQuery(function(){ Codebase.helpers(['select2']); });</script>
    @endsection