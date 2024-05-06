<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Order Details</h1>
            <p><strong>Order ID:</strong> {{ $model?->id }}</p>
            <p><strong>User:</strong> {{ $model?->customer?->first_name ?? 'Guest' }}</p>
            <p><strong>Email:</strong> {{ $model?->primaryAddress?->email }}</p>
            <p><strong>Phone:</strong> {{ $model?->primaryAddress?->phone }}</p>
            <p><strong>Status:</strong> {{ $model?->status }}</p>
            <p><strong>Payment Status:</strong> {{ $model?->payment_status }}</p>
            <p><strong>Subtotal:</strong> LKR {{ number_format($model?->sub_total, 2) }}</p>
            <p><strong>Discounted price:</strong> LKR {{ number_format($model?->discount_price, 2) }}</p>

            <h2>Order Items</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>LKR {{ number_format($item?->product_price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>LKR {{ number_format($item?->product_price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Display other order details here -->
        </div>

        <div class="col-md-6">
            <h2>Update Order</h2>
            <form method="post" action="{{ route('admin.orders.update', $model) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status" id="status">
                        @foreach ($orderStatuses as $id => $status)
                            <option value="{{ $id }}" {{ $model?->status === $id ? 'selected' : '' }}>
                                {{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="payment_status">Payment Status:</label>
                    <select class="form-control" name="payment_status" id="payment_status">

                        @foreach ($paymentStatuses as $id => $status)
                            <option value="{{ $id }}"
                                {{ $model?->payment_status === $id ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Order</button>
            </form>
        </div>
    </div>
</div>
