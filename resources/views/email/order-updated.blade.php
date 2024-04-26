<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        .status-update {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Status Update</h2>

        <p><strong>User:</strong> {{ $order->primaryAddress->first_name }}</p>
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Updated Status:</strong> <span class="status-update">{{ $order?->o_status?->status }}</span></p>
        <p><strong>Payment Status:</strong> {{ $order?->paymentStatus?->status }}</p>

        <p>Please note that the order status has been updated to <span class="status-update">{{ $order->status }}</span>.</p>

        <p>For any inquiries, please contact us at <a href="mailto:contact@ccomputers.com">contact@ccomputers.com</a>.</p>
    </div>
</body>
</html>
