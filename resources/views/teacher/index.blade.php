@extends('master.app')
@section('content')
<div class="content">
    <div class="block block-themed">
        <div class="block-header bg-corporate-light">
            <h3 class="block-title">teacher Form</h3>
        </div>
    </div>
<table class="table table-striped table-vcenter">
    <thead>

        <tr>
            <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
            <th>Name</th>
            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
            <th class="d-none d-md-table-cell" style="width: 15%;">Desigenation</th>
            <th class="text-center" style="width: 100px;">Actions</th>
        </tr>
    </thead>
    <tbody>

        
            @foreach($teacher as $item)
            <tr>
            <td class="text-center">
                <img class="img-avatar img-avatar48" src="{{ asset('image/teachers/'.$item->image)}}" alt="">
            </td>
            <td class="font-w600">{{$item->teacher_name}}</td>
            <td class="d-none d-sm-table-cell">{{$item->email}}</td>
            <td class="d-none d-md-table-cell">
                <span class="badge badge-info">{{$item->designation}}</span>
            </td>
            <td class="text-center">
                <div class="btn-group">

                    <a class="btn btn-warning" href="{{route('teacher.edit', $item)}}">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{route('teacher.destroy', $item)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger ml-1" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    
                        
                    </form>
                </div>
            </td>
        </tr>
            @endforeach
       
    </tbody>
        </table>
    </div>
@endsection