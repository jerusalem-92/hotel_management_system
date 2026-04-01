<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
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
            max-width: 500px;
            text-align: center;
        }

        .success {
            color: #10b981;
            font-size: 4rem;
            margin: 0;
        }

        .details {
            text-align: left;
            margin-top: 2rem;
            background: #f9fafb;
            padding: 1rem;
            border-radius: 4px;
        }

        .btn {
            display: inline-block;
            margin-top: 1.5rem;
            background-color: #3b82f6;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #2563eb;
        }
    </style>
</head>

<body>
    <div class="card">
        <p class="success">✓</p>
        <h2>Booking Confirmed!</h2>
        <p>Thank you, {{ $booking->guest_name }}. Your reservation has been placed successfully.</p>

        <div class="details">
            <p><strong>Room:</strong> {{ $booking->room->room_number }} ({{ $booking->room->type }})</p>
            <p><strong>Check-in:</strong> {{ $booking->check_in_date }}</p>
            <p><strong>Check-out:</strong> {{ $booking->check_out_date }}</p>
            <p><strong>Total Price:</strong> ${{ number_format($booking->total_price, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
        </div>

        <a href="{{ route('rooms.index') }}" class="btn">Back to Rooms</a>
    </div>
</body>

</html>