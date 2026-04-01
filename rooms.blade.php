<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Rooms</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            margin: 0;
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        h1 {
            text-align: center;
        }

        .grid {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }

        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            background-color: #3b82f6;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2563eb;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Available Rooms</h1>
        <div class="grid">
            @forelse($rooms as $room)
                <div class="card">
                    <h3>Room {{ $room->room_number }} ({{ $room->type }})</h3>
                    <p>Price: ${{ number_format($room->price_per_night, 2) }} / night</p>
                    <p>Status: {{ ucfirst($room->status) }}</p>
                    @if($room->status === 'available')
                        <a href="{{ route('bookings.create', $room) }}" class="btn">Book Now</a>
                    @endif
                </div>
            @empty
                <p>No rooms available at the moment.</p>
            @endforelse
        </div>
    </div>
</body>

</html>