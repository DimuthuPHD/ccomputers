@extends('layouts.app')

@section('title', 'products | Create')

@section('content_header')
    <h1>Products | Create</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.products.index')}}" class="btn btn-warning pull-right"><i class="fas fa-fw fa-arrow-left "></i> Back</a>
    </div>
    <div class="card-body">
        @include('admin.product.form', ['model' => $model])
    </div>
</div>

@stop
