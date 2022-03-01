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
                    <h3 class="block-title">User Form</h3>
                </div>
                <div class="block-content">
                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="user_name">Name</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control  @if($errors->has('user_name')) is-invalid @endif"  name="user_name" placeholder="Enter Name">
                                    @if($errors->has('user_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="email">Email</label>
                                <div class="col-lg-4">
                                    <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif"  name="email" placeholder="Enter Email">
                                    @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="password">Password</label>
                                <div class="col-lg-4">
                                    <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif"  name="password" placeholder="Enter Password">
                                    @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="user_image">Upload Image</label>
                                <div class="col-lg-4">
                                    <input type="file" class="form-control @if($errors->has('user_image')) is-invalid @endif"  name="user_image">
                                    @if($errors->has('user_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

{{-- start --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="roles">Assign Role </label>
                                            <select id="inputState" name="roles"  class="form-control    @if($errors->has('roles')) is-invalid @endif">
                                
                                                @foreach($roles as $item)
                                                    <option value="{{$item}}">{{$item}}</option>
                                                 @endforeach
                                                    @if($errors->has('roles'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('roles') }}</strong>
                                                    </span>
                                                    @endif
                                                    
                                            </select>
                                </div>
                            </div>



                            {{-- end --}}
        
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

    @endsection