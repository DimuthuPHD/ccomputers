@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.categories.index')}}" class="btn btn-warning pull-right"><i class="fas fa-fw fa-arrow-left "></i> Back</a>
    </div>
    <div class="card-body">
        @include('admin.category.form', $model)
    </div>
</div>

@stop
