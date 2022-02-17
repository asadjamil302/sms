
@extends('master.app')
@section('css')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container" width="80%">
  
    @if (session('success'))
              <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
                  {{ session('success') }}
              </div>
    @endif

  <form action="{{route('student.update', $student)}}" method="post">
     @method('patch') 
      @csrf
     
    <div class="form-colume">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Student Name</label>
        <input type="name" name="student_name" value="{{$student->student_name}}"required class="form-control" id="inputEmail4" placeholder="Enter your name">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Roll no</label>
        <input type="text" name="rollno" value="{{$student->rollno}}"  required class="form-control" id="inputPassword4" placeholder="Enter your rollno">
      </div>
  
   
      <div class="form-group col-md-6">
      <label for="inputState">department</label>
        <select id="inputState"name="department" value="{{$student->department}}"  required class="form-control">
          <option selected>computer science</option>
          <option>software engineering</option>
          <option>information technology</option>
        </select>
      </div>
      <div class="select2.js form-group col-md-6">
        <label for="inputState">Select subject</label>
        <select  id="inputState" name="subject[]" class="form-control multiple-select"  multiple>

            @foreach ($subjects as $item)
            <option value="{{$item->id}}" {{in_array($item->id, $student_subjects) ? 'selected':''}}> {{$item->subject_name}}</option>
            @endforeach
            
        
        </select>
      </div>
      <div class="form-group col-md-6 ">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
  </form>
  </div>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
  $(".multiple-select").select2({
    //maximumSelectionLength: 2
  });
  </script>
@endsection