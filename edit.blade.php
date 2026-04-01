<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room {{ $room->room_number }}</title>
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

        input,
        select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            display: block;
            width: 100%;
            background-color: #10b981;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
        }

        .btn-cancel {
            background-color: #6b7280;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .error {
            color: #ef4444;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Edit Room: {{ $room->room_number }}</h2>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.rooms.update', $room) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="room_number">Room Number</label>
                <input type="text" name="room_number" id="room_number" required
                    value="{{ old('room_number', $room->room_number) }}">
            </div>

            <div class="form-group">
                <label for="type">Room Type</label>
                <select name="type" id="type" required>
                    <option value="Single" {{ old('type', $room->type) == 'Single' ? 'selected' : '' }}>Single</option>
                    <option value="Double" {{ old('type', $room->type) == 'Double' ? 'selected' : '' }}>Double</option>
                    <option value="Suite" {{ old('type', $room->type) == 'Suite' ? 'selected' : '' }}>Suite</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price_per_night">Price Per Night</label>
                <input type="number" step="0.01" name="price_per_night" id="price_per_night" required
                    value="{{ old('price_per_night', $room->price_per_night) }}">
            </div>

            <div class="form-group">
                <label for="status">Room Status</label>
                <select name="status" id="status" required>
                    <option value="available" {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>
                        Available</option>
                    <option value="booked" {{ old('status', $room->status) == 'booked' ? 'selected' : '' }}>Booked
                    </option>
                    <option value="maintenance" {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}>
                        Maintenance</option>
                </select>
            </div>

            <button type="submit" class="btn">Update Room</button>
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-cancel">Cancel</a>
        </form>
    </div>
</body>

</html>