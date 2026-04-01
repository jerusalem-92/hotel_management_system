<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            margin: 0;
            padding: 2rem;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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
            background-color: #3b82f6;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #10b981;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .success {
            color: #10b981;
            margin-bottom: 1rem;
        }

        .status-available {
            color: #10b981;
            font-weight: bold;
        }

        .status-booked {
            color: #ef4444;
            font-weight: bold;
        }

        .status-maintenance {
            color: #f59e0b;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Room Management (Admin)</h2>
            <div>
                <a href="{{ route('admin.rooms.create') }}" class="btn">Add New Room</a>
                <a href="{{ route('rooms.index') }}" class="btn" style="background-color: #6b7280;">Go to Public
                    View</a>
            </div>
        </div>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Number</th>
                    <th>Type</th>
                    <th>Price/Night</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->type }}</td>
                        <td>${{ number_format($room->price_per_night, 2) }}</td>
                        <td class="status-{{ strtolower($room->status) }}">{{ ucfirst($room->status) }}</td>
                        <td>
                            <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-edit">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>