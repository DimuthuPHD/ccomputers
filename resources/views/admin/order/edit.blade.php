@extends('layouts.app')

@section('title', 'Orders | Edit')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.orders.index')}}" class="btn btn-warning pull-right"><i class="fas fa-fw fa-arrow-left "></i> Back</a>
    </div>
    <div class="card-body">
        @include('admin.order.form', $model)
    </div>
</div>

@stop
