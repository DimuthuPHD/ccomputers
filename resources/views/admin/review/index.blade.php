@extends('layouts.app')

@section('title', 'orders | List')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="col-md-12">
                <form action="{{ route('admin.review.index') }}" method="get">
                <div class="row">

                        <div class="col-md-1">
                            <label for="review_sentiment">Sentiment</label>
                            <select class="form-control" id="review_sentiment" name="review_sentiment">
                                <option value="">select</option>
                                <option value="negative"
                                    {{ request('review_sentiment') == 'negative' ? 'selected' : null }}>Negative</option>
                                <option value="positive"
                                    {{ request('review_sentiment') == 'positive' ? 'selected' : null }}>Positive</option>
                                <option value="neutral" {{ request('review_sentiment') == 'neutral' ? 'selected' : null }}>
                                    Neutral</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="product">Product</label>
                            <select class="form-control" id="product" name="product">
                                <option value="">select</option>

                                @foreach ($products as $slug => $name)
                                    <option value="{{ $slug }}"
                                        {{ request('product') == $slug ? 'selected' : null }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="date_from">Date From</label>
                            <input type="date" class="form-control" id="date_from" name="date_from"
                                value="{{ request('date_from') }}">
                        </div>

                        <div class="col-md-2">
                            <label for="date_to">Date To</label>
                            <input type="date" class="form-control" id="date_to" name="date_to"
                                value="{{ request('date_to') }}">
                        </div>

                        <div class="col-md-1">
                            <label for="from" style="opacity: 0">Submit</label>
                            <button type="submit" class="btn btn-primary">FIlter</button>
                        </div>

                        @if (request()->filled('product') || request()->filled('review_sentiment') || request()->filled('date_from') || request()->filled('date_to'))
                        <div class="col-md-1">
                            <label for="from" style="opacity: 0">Submit</label>
                            <a class="btn btn-warning" href="{{ route('admin.review.export', request()->query()) }}">Export</a>
                        </div>
                        <div class="col-md-1">
                            <label for="from" style="opacity: 0">Submit</label>
                            <a class="btn btn-danger" href="{{ route('admin.review.index') }}">Reset Filters</a>
                        </div>
                        @endif



                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Review Text</th>
                        <th scope="col">Review Sentiment</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reviews as $review)
                        <tr>
                            <th scope="row">{{ $review->id }}</th>
                            <td>{{ $review?->name }}</td>
                            <td>{{ $review?->review_text }}</td>
                            <td>{{ $review?->review_sentiment }}</td>

                            <td>
                                <a href="{{ route('admin.products.edit', $review->product->slug) }}" class="btn btn-info">Product</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $reviews->links('pagination::bootstrap-4') }}
        </div>
    </div>

@stop
