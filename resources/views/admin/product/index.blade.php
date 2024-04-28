@extends('layouts.app')

@section('title', 'Products | List')

@section('content_header')
    <h1>products</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.products.create')}}" class="btn btn-primary pull-right">create new</a>
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

                @foreach ($products as $product)
                    <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>
                        <a href="{{route('admin.products.edit', $product->slug)}}" class="btn btn-info">Edit</a>
                        <a href="#" onclick="confirmAndSubmit(event, '{{ route('admin.products.destroy', $product->slug) }}')" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <div class="card-footer">
        {{$products->links('pagination::bootstrap-4')}}
    </div>
</div>

@stop
