
@extends('master.app')
@section('css')
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
        <label for="inputState">Select subject</label>
        <select  id="inputState"name="selectsubject[]" required class="form-control multiple-select" multiple>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(".multiple-select").select2({
  //maximumSelectionLength: 2
});
</script>
@endsection