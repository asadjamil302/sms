@extends('master.app')

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
                <th>Date</th>
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
                <td>{{$item->date}}</td>
                <td>
                    <input type="button" class="btn btn-success" value="Present" id="{{$item->id}}" onClick="mark_attendance(this.value, this.id)" ></td>
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

            function mark_attendance(value,id){
                var val = "";
                if(value == "Present"){
                    $.ajax({
                        type: 'get',
                        url: "{{route('present')}}",
                        data:{
                            id:id

                        },                   
                        success: function(response){ 
                            $('#'+id).removeClass('btn-success');

                            $('#'+id).addClass('btn-danger');
                            val = $('#'+id).val('Absent');
                        },
                        error: function() { 
                        
                        }
                    
                    });
                    

                } else{
                    val = $('#'+id).val('Present');

                }
                //alert(val);
            }
    
        </script>

        <script>
          

        </script>
        
    
    
    </body>
    <!-- END Page Content -->
@endsection


