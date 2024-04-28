@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary pull-right">create new</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-info">Edit</a>
                        <a href="#" onclick="confirmAndSubmit(event, '{{ route('admin.categories.destroy', $category->id) }}')" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <div class="card-footer">
        {{$categories->links('pagination::bootstrap-4')}}
    </div>
</div>

@stop
