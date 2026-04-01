<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Room {{ $room->room_number }}</title>
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
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            display: block;
            width: 100%;
            background-color: #3b82f6;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background-color: #2563eb;
        }

        .error {
            color: red;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Book Room {{ $room->room_number }} ({{ $room->type }})</h2>
        <p>Price: ${{ number_format($room->price_per_night, 2) }} / night</p>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bookings.store', $room) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="guest_name">Full Name</label>
                <input type="text" name="guest_name" id="guest_name" required value="{{ old('guest_name') }}">
            </div>
            <div class="form-group">
                <label for="guest_email">Email</label>
                <input type="email" name="guest_email" id="guest_email" required value="{{ old('guest_email') }}">
            </div>
            <div class="form-group">
                <label for="check_in_date">Check-in Date</label>
                <input type="date" name="check_in_date" id="check_in_date" required value="{{ old('check_in_date') }}">
            </div>
            <div class="form-group">
                <label for="check_out_date">Check-out Date</label>
                <input type="date" name="check_out_date" id="check_out_date" required
                    value="{{ old('check_out_date') }}">
            </div>
            <button type="submit" class="btn">Confirm Booking</button>
        </form>
    </div>
</body>

</html>