<!-- resources/views/bookings/create.blade.php -->
<!-- resources/views/bookings/create.blade.php -->

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
            background: linear-gradient(to right bottom, #570860, #ce66da);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            height: 100vh;
            margin: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #container {
            display: flex;
            align-items: flex-start;
            width: 100%;
            max-width: 1200px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media(min-width: 768px) {
            #container {
            flex-direction: row;
            align-items: flex-start;
            }
        }
        #prev-month {
            background-color: #570860;
            color: #ffffff;
            border-radius: 5px;
        }

        #next-month {
            background-color: #570860;
            color: #ffffff;
            border-radius: 5px;
        }
        #calendar-container {
            margin: 100px;
            flex: 1;
            width: 100%;
            max-width: 400px;
        }

        #calendar-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        #calendar {
            display: flex;
            flex-wrap: wrap;
            justify-content: none;
        }

        .day-header, .day {
            width: calc(100% / 7 - 4px);
            height: 40px;
            margin-bottom: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            position: relative;
            font-weight: bold;
        }

        .day-header {
            background-color: #570860;
            color: #ffffff;
        }

        .day {
            background-color: #fff;
            cursor: pointer;
        }

        .day.booked {
            background-color: #e671d6;
        }

        #bookingForm {
            background-color: white;
            padding: 20px;
            margin: 50px;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            font-size: 20px;
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

        select {
            width: 100%;
            height: 40px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input {
            width: 95%;
            height: 15px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button[type="submit"] {
            background: linear-gradient(to right bottom, #570860, #ce66da);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            font-size: 14px;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #c081d9;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="calendar-container">
            <div id="calendar-nav">
                <button id="prev-month">&lt;</button>
                <span id="calendar-title"></span>
                <button id="next-month">&gt;</button>
            </div>
            <div id="calendar">
                <div class="day-header">Minggu</div>
                <div class="day-header">Senin</div>
                <div class="day-header">Selasa</div>
                <div class="day-header">Rabu</div>
                <div class="day-header">Kamis</div>
                <div class="day-header">Jumat</div>
                <div class="day-header">Sabtu</div>
                <!-- Days will be generated here -->
            </div>
        </div>
        <div id="bookingForm">
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>

                <label for="phone">Nomor Telepon:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="date">Tanggal Sewa:</label>
                <input type="date" id="date" name="date" required>

                <label for="start_time">Waktu Mulai:</label>
                <input type="time" id="start_time" name="start_time" required>

                <label for="end_time">Waktu Selesai:</label>
                <input type="time" id="end_time" name="end_time" required>

                <label for="ruang">Tipe Ruangan:</label>
                <select id="ruang" name="ruang" required>
                    <option value="small">Small Room (5-10 people)</option>

                    <option value="medium">Medium Room (15-20 people)</option>

                    <option value="large">Large Room (25-30 people)</option>
                </select>

                <label for="tambahan_fasilitas">Tambahan Fasilitas:</label>
                <select id="tambahan_fasilitas" name="tambahan_fasilitas" required>
                    <option value="">Pilih tambahan fasilitas</option>
                    <option value="ac">Air Conditioner (AC)</option>
                    <option value="tambahan_mk">Tambahan Meja Kursi</option>
                    <option value="LCD">LCD Proyektor</option>
                    <option value="snack">Snack</option>
                </select>

                <label for="jumlah">Jumlah Fasilitas:</label>
                <input type="number" id="jumlah" name="jumlah" min="1" required>

                <button type="submit">Create Reservasi</button>
            </form>
        </div>
    </div>

    <script>
        const calendarContainer = document.getElementById('calendar');
        const calendarTitle = document.getElementById('calendar-title');
        const prevMonthBtn = document.getElementById('prev-month');
        const nextMonthBtn = document.getElementById('next-month');
        const bookingDateInput = document.getElementById('date');

        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();

        const bookings = <?php echo json_encode($bookings); ?>;

        function generateCalendar(month, year) {
            calendarContainer.innerHTML = '';
            const firstDay = new Date(year, month).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            calendarTitle.textContent = `${new Date(year, month).toLocaleString('default', { month: 'long' })} ${year}`;

            const daysOfWeek = ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'];
            daysOfWeek.forEach(dayName => {
                const dayHeader = document.createElement('div');
                dayHeader.classList.add('day-header');
                dayHeader.textContent = dayName;
                calendarContainer.appendChild(dayHeader);
            });

            for (let i = 0; i < firstDay; i++) {
                const emptyDiv = document.createElement('div');
                emptyDiv.classList.add('day');
                calendarContainer.appendChild(emptyDiv);
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const dayDiv = document.createElement('div');
                dayDiv.classList.add('day');
                dayDiv.textContent = day;

                const date = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                if (bookings.some(booking => booking.date === date)) {
                    dayDiv.classList.add('booked');
                }

                dayDiv.addEventListener('click', () => {
                    bookingDateInput.value = date;
                    document.getElementById('bookingForm').scrollIntoView({ behavior: 'smooth' });
                });

                calendarContainer.appendChild(dayDiv);
            }
        }

        prevMonthBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentMonth, currentYear);
        });

        nextMonthBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });

        generateCalendar(currentMonth, currentYear);
    </script>
</body>
</html>
