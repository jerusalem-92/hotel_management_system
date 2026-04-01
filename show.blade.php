<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            margin: 0;
            padding: 2rem;
            display: flex;
            justify-content: center;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        h3 {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 0.5rem;
        }

        p {
            margin: 0.5rem 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            text-align: left;
            padding: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background-color: #f9fafb;
        }

        .btn {
            display: inline-block;
            background-color: #6b7280;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Customer Details: {{ $customer->name }}</h2>

        <div class="grid">
            <div>
                <p><strong>Email:</strong> {{ $customer->email }}</p>
                <p><strong>Phone:</strong> {{ $customer->phone ?? 'N/A' }}</p>
            </div>
            <div>
                <p><strong>Address:</strong> {{ $customer->address ?? 'N/A' }}</p>
                <p><strong>Registered On:</strong> {{ $customer->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        <h3>Booking History</h3>

        @if($customer->bookings->isEmpty())
            <p>This customer has no bookings yet.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Room</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer->bookings as $booking)
                        <tr>
                            <td>#{{ $booking->id }}</td>
                            <td>{{ $booking->room->room_number ?? 'N/A' }} ({{ $booking->room->type ?? '' }})</td>
                            <td>{{ $booking->check_in_date }}</td>
                            <td>{{ $booking->check_out_date }}</td>
                            <td>${{ number_format($booking->total_price, 2) }}</td>
                            <td>{{ ucfirst($booking->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <br>
        <a href="{{ route('admin.customers.index') }}" class="btn">Back to Customers</a>
    </div>
</body>

</html>