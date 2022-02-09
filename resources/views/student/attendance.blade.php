@extends('master.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('content')
     <!-- Page Content -->
     <body>
         <div class="content">
     <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Student Rollno</th>
                <th>Attendance</th>
            </tr>
        </thead>

        <tbody>

            <form action="{{route('attendance.store')}}" type="submit" method="post">
                @csrf
                
            @foreach ($students as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->studentname}}</td>
                <td>{{$item->rollno}}</td>

                <td>
                    <input type="button" class="btn btn-success " value="present" id="{{$item->id}}" onClick="changetext(this.id)" ></td>
                    {{-- <td><a class="btn btn-primary" href="{{$item)}}">Edit</a></td> --}}
                
                
                  </div> 
                  
               
                 
              
            </tr>
            @endforeach
             
        
        </tbody>
    </table>
</div>
    <tr>
            <div class="form-group col-md-7" style="float: right;">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form> 
    </tr>
    
    <script>
        function changetext(abc) {
           
        //      var elem = document.getElementById("{{$item->id}}");    
        //    {
            
            if (abc.value=="present")
                { 
                    abc.value = "absent";
                }
            else
             {
                abc.value = "present";
             }
        
        }
        </script>
     </body>
    <!-- END Page Content -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@endsection











