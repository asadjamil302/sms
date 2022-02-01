
@extends('master.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    

<form action="{{route('students.store')}}" method="post">
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
        <label for="inputSubject">Select subject</label>
        <select   name="subject[]" required class="form-control multiple-select" multiple>
        @foreach($subjects as $item)
          <option value="{{$item->id}}">{{$item->subject_name}}</option>
         @endforeach
        </select>
      </div>
    </div>
    <div class="form-group col-md-6 ">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>   
        <script>
            $(".multiple-select").select2({
            //maximumSelectionLength: 2
            });
        

        </script>
@endsection