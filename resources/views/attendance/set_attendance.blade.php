@extends('master.app')

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
                    <h3 class="block-title">Attendance Form</h3>
                </div>
                <div class="block-content">
                    <form action="{{route('attendance.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="attendance_date">Select Date</label>
                                <div class="col-lg-4">
                                    <input type="date" class="form-control  @if($errors->has('attendance_date')) is-invalid @endif"  name="attendance_date" placeholder="Enter Subject Name">
                                    @if($errors->has('attendance_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('attendance_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="subject_code">Subject code</label>
                                <div class="col-lg-4">
                                    
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
        
                           
        
                            <div class="form-group row">
                                <div class="col-lg-9 ml-auto">
                                    <button type="submit" class="btn btn-alt-primary">Go for Attendance</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
  
    @endsection
    @section('script')

    @endsection