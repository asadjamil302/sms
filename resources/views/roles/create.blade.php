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
                    <h3 class="block-title">Role Form</h3>
                </div>
                <div class="block-content">
                    <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="">Role Name</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control  @if($errors->has('name')) is-invalid @endif"  name="name" placeholder="Enter Role Name">
                                    @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group ">
                                    <label for="example-select2">Select Roles</label>
                                    <select class="js-select2 form-control @if($errors->has('permission')) is-invalid @endif multiple-select" id="example2-select2-multiple" name="permission[]" style="width: 100%;" data-placeholder="Choose one.." multiple>
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($permission as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                        @if($errors->has('permission'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('permission') }}</strong>
                                            </span>
                                        @endif
                                        
                                    </select>
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
    <script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    {{-- <script>jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script> --}}
    <script>jQuery(function(){ Codebase.helpers(['select2']); });</script>
    @endsection