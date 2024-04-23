@extends('layouts.app')

@section('title', 'Products | Edit')

@section('content_header')
    <h1>products</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.products.index')}}" class="btn btn-warning pull-right"><i class="fas fa-fw fa-arrow-left "></i> Back</a>
        @if ($lastActivity = $model->activities()->latest()->first())
            Last updated at {{$lastActivity->created_at}}
        @endif
    </div>
    <div class="card-body">
        @include('admin.product.form', $model)
    </div>
</div>

@stop
