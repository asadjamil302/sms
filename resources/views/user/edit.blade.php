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
                    <form action="{{route('user.update', $user)}}" method="post" enctype="multipart/form-data">
                        @method('patch') 
                            @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="user_name">Name</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control"  name="user_name" value="{{$user->user_name}}" placeholder="Enter Name" required>
                                    
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="email">Email</label>
                                    <div class="col-lg-4">
                                        <input type="email" class="form-control"  name="email" value="{{$user->email}}" placeholder="Enter Email" required>
                                    
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="password">Password</label>
                                    <div class="col-lg-4">
                                        <input type="password" class="form-control"  name="password" value="{{$user->password}}" placeholder="Enter Password" required>
                                    
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="user_image">Upload Image</label>
                                    <div class="col-lg-4">
                                        <input type="file" class="form-control"  name="user_image" value="{{$user->user_image}}" required>
                                    
                                    </div>
                                </div>
            
                                {{-- start --}}
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="roles">Assign Roles</label>
                                                <select id="inputState" name="roles"  class="form-control" value="{{$user->name}}" required>
                                                        <option selected>
                                                            @foreach ($roles as $item)
                                                            <option value="{{$item}}" {{$userRole == $item ? 'selected' : ''}}> {{$item}}</option>
                                                            @endforeach
                                                        </option>
                                                        
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