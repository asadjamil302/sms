@extends('master.app')

@section('content')
     <!-- Page Content -->
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
                    
                @foreach ($students as $item)
                <tr>

                    <td>{{$item->id}}</td>
                    <td>{{$item->studentname}}</td>
                    <td>{{$item->rollno}}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>

           
                    <td>
                 
                        @if ($item->attendance()->exists())
                            <input type="button" class="btn {{$item->attendance->attendance == '1' ? 'btn-danger' : 'btn-success'}}" value="{{$item->attendance->attendance == '1' ? 'Absent' : 'Present'}}" id="{{$item->id}}" onClick="mark_attendance(this.value, this.id)">
                        @else
                        <input type="button" class="btn btn-success" value="Present" id="{{$item->id}}" onClick="mark_attendance(this.value, this.id)">

                        @endif
                    </td> 

                        {{-- <td><a class="btn btn-primary" href="{{$item)}}">Edit</a></td> --}}                  
                
                    
                
                </tr>
                @endforeach
                
            
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>

        function mark_attendance(value,id){
            var val = "";
            if(value == "Present"){
                $.ajax({
                    type: 'get',
                    url: "{{route('present')}}",
                    data:{
                        id: id,
                        attendance: '1',
                    },                   
                    success: function(response){ 
                        $('#'+id).removeClass('btn-success');

                        $('#'+id).addClass('btn-danger');
                        val = $('#'+id).val('Absent');
                    },
                    error: function() { 
                    
                    }
                
                });
                

            } 
            else{
                $.ajax({
                    type: 'get',
                    url: "{{route('absent')}}",
                    data:{
                        id:id,
                        attendance: '0',
                    },                   
                    success: function(response){ 
                        $('#'+id).removeClass('btn-danger');

                        $('#'+id).addClass('btn-success');
                        val = $('#'+id).val('Present');
                    },
                    error: function() { 
                    
                    }
                
                });
                

            }
        
            //alert(val);
        }

    </script>
<!-- END Page Content -->
@endsection