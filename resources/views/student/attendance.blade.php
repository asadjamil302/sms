@extends('master.app')
@section('css')


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
                    <input type="button" class="btn btn-success " value="present" name="present" id="{{$item->id}}" onclick="test(this.id)" ></td>
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
    

     </body>
    <!-- END Page Content -->
@endsection
@section('script')

<script>
    $(document).ready(function(){
        alert('as');   
    });

function test(id){
    alert(id);
    //  $.ajax({
    //             url: "/attendance",
    //             type:"POST",
    //             data:{
    //                     id:{{$item->id}},
    //                     studentname:{{$item->studentname}},
    //                     rollno:{{$item->rollno}},
                
    //                     },
    //             success:function(response){
    //                 console.log(response);
    //                 if(response) {
    //                 $('.success').text(response.success);
    //                 $("#ajaxform")[0].reset();
    //                 }
    //             },
    //             error: function(error) {
    //             console.log(error);
    //             }
    //             });
        
        }
  </script>

@endsection











