<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Calendar</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 1200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        #bookingForm {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            font-size: 24px;
            color: #570860;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: small;
            margin-bottom: 7px;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: linear-gradient(to right bottom, #570860, #ce66da);
            color: white;
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #c081d9;
        }
    </style>
</head>
<body>
    <div id="container">
        <h2>Booking List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Room</th>
                    <th>Fasilitas Tambahan</th>
                    <th>Jumlah</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->ruang }}</td>
                        <td>{{ $booking->tambahan_fasilitas }}</td>
                        <td>{{ $booking->jumlah }}</td>
                        <td>
                            <form method="post" action="{{ route('bookings.destroy', $booking->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" name="delete">Delete</button>
                            </form>
                            <button onclick="editBooking({{ $booking }})">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script>
        function editBooking(booking) {
            document.getElementById('id').value = booking.id;
            document.getElementById('nama').value = booking.name;
            document.getElementById('phone').value = booking.phone;
            document.getElementById('date').value = booking.date;
            document.getElementById('fasilitas_tambahan').value = booking.fasilitas_tambahan;
            document.getElementById('jumlah').value = booking.jumlah;

            document.getElementById('submitBtn').style.display = 'none';
            document.getElementById('updateBtn').style.display = 'block';
        }
    </script>
</body>
</html>
