
@extends('master.app')
@section('css')

@endsection

@section('content')
    

<form action="" method="post">
    @csrf
    
  <div class="form-colume">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Student Name</label>
      <input type="name" name="studentname" required class="form-control" id="inputEmail4" placeholder="Enter your name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Roll no</label>
      <input type="text" name="rollno" required class="form-control" id="inputPassword4" placeholder="Enter your rollno">
    </div>

 
    <div class="form-group col-md-6">
    <label for="inputState">department</label>
      <select id="inputState"name="department" required class="form-control">
        <option selected>computer science</option>
        <option>software engineering</option>
        <option>information technology</option>
      </select>
    </div>
    <div class="select2.js form-group col-md-6">
      <label for="inputState">Select subject</label>
      <select  id="inputState"name="selectsubject[]" required class="form-control multiple-select" multiple>
      
      </select>
    </div>
    <div class="form-group col-md-6 ">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection
@section('script')
    
@endsection