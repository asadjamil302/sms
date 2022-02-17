@extends('master.app')
@section('content')
<div class="content">
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
                <img class="img-avatar img-avatar48" src="{{ asset('upload/teachers/'.$item->image)}}" alt="">
            </td>
            <td class="font-w600">{{$item->teacher_name}}</td>
            <td class="d-none d-sm-table-cell">{{$item->email}}</td>
            <td class="d-none d-md-table-cell">
                <span class="badge badge-info">{{$item->designation}}</span>
            </td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{route('teacher.edit', $item)}}">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil" ></i>
                    </button></a>
                    <a href="{{route('teacher.destroy', $item)}}">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                    </button></a>
                </div>
            </td>
        </tr>
            @endforeach
       
    </tbody>
        </table>
    </div>
@endsection