@extends('layouts.app')

@section('title', 'orders | List')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">Total</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)
                    <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order?->primaryAddress?->first_name}}</td>
                    <td>LKR {{number_format($order?->sub_total, 2)}}</td>
                    <td>{{$order?->payment_method}}</td>
                    <td>{{$order?->paymentStatus?->status}}</td>
                    <td>{{$order?->o_status?->status}}</td>

                    <td>
                        <a href="{{route('admin.orders.view', $order->id)}}" class="btn btn-info">Edit</a>
                        {{-- <a href="#" onclick="confirmAndSubmit(event, '{{ route('admin.orders.destroy', $order->id) }}')" class="btn btn-danger">Delete</a> --}}
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>

          {{$orders->links('pagination::bootstrap-4')}}
    </div>
</div>

@stop
