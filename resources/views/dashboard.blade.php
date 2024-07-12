@extends('layouts.app')

@section('title', 'Landing Page')

@push('styles')

@endpush
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    button {
        padding: 10px 20px;
        border-radius: 5px;
        background: rgb(132, 40, 130);
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
        border: none;
        cursor: pointer;
        margin-bottom: 15px;
    }

    button:hover {
        background-color: #ce66da;
    }

    .logow {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        opacity: 0;
        animation: fadeIn 1s forwards;
        animation-delay: 0.5s;
    }

    .logow img {
        height: 70px;
        width: 70px;
        margin-right: 20px;
    }

    .logow a {
        padding: 10px 20px;
        border-radius: 5px;
        background: linear-gradient(to right bottom, #570860, #ce66da);
        color: white;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .logow a:hover {
        background-color: #c081d9;
    }

    .Dasbor, .Room, .benefit {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 1s forwards;
        animation-delay: 0.5s;
    }

    .Dasbor {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 50px;
        background-color: #ffff;
    }

    .kata {
        max-width: 50%;
    }

    .kata h1 {
        font-size: 2.5rem;
        color: #5d336e;
        margin-bottom: 20px;
    }

    .kata p {
        font-size: 1.1rem;
        font-weight: 500;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .Room {
        background: linear-gradient(to right bottom , #570860, #ce66da);
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 50px 0;
        width: 100%;
    }

    .tulisan h3 {
        font-size: 30px;
        color: white;
        margin-bottom: 30px;
    }

    .rooom {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        max-width: 1200px;
        width: 100%;
    }

    .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.2s;
        width: 300px;
        text-align: center;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card h4 {
        font-size: 1.5rem;
        color: #570860;
        margin: 15px 0;
    }

    .card p {
        font-size: 1rem;
        color: #888;
        margin-bottom: 15px;
    }

    .card button {
        padding: 10px 20px;
        border-radius: 5px;
        background: rgb(132, 40, 130);
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
        border: none;
        cursor: pointer;
        margin-bottom: 15px;
    }

    .card button:hover {
        background-color: #ce66da;
    }

    .benefit {
        background-color: #fff;
        padding: 50px;
        text-align: center;
    }

    .benefit h2 {
        font-size: 2rem;
        color: #570860;
        margin-bottom: 30px;
    }

    .benefit p {
        font-size: 1.1rem;
        font-weight: 500;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .benefit .ac, .benefit .mekur, .benefit .proyektor, .benefit .snack {
        display: inline-block;
        width: 20%;
        margin-bottom: 30px;
    }

    .benefit img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .benefit p {
        font-size: 1rem;
        color: #888;
    }

    footer {
        background-color: #570860;
        color: white;
        padding: 20px 0;
        text-align: center;
    }

    footer p {
        margin: 0;
        font-size: 1rem;
    }

    footer a {
        color: #ce66da;
        text-decoration: none;
        margin: 0 10px;
        transition: color 0.3s ease;
    }

    footer a:hover {
        color: #fff;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .highlight {
        animation: highlightFade 5s forwards;
    }

    @keyframes highlightFade {
        from {
            background-color: yellow;
        }
        to {
            background-color: transparent;
        }
    }

    <style>
    .alert {
        padding: 20px;
        background-color: #570860; /* Warna hijau */
        color: white;
        margin-bottom: 15px;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        border-radius: 10px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .alert-content {
        padding: 20px;
        background-color: #570860; /* Dark color */
        color: white;
        border-radius: 10px;
        text-align: center;
    }
</style>

</style>
@section('content')
@if (session('success'))
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="alert-content">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif


    <div class="logow">
        <img src="{{ asset('image/logo.jpg') }}">
        <button onclick="location.href='{{ route('login') }}'">LogOut</button>
    </div>
    <div class="Dasbor">
        <div class="kata">
            <h1 id="welcome-message">Halo, {{ Auth::user()->name }}!</h1>
            <p>SIJI menyediakan layanan persewaan ruang untuk mendukung acara Anda!
                Apa pun kebutuhan Anda, kami siap membantu.
                Lihatlah berbagai pilihan ruangan yang kami sediakan untuk memenuhi kebutuhan acara Anda
                <a href="#Room" id="highlight-link">disini</a>
            </p>
        </div>
        <img src="{{ asset('image/icon1.jpg') }}">
    </div>
    <div class="Room" id="Room">
        <div class="tulisan"><h3>Daftar Ruang</h3></div>
        <div class="rooom">
            <div class="card">
                <img src="{{ asset('image/r1.jpg') }}" alt="Large Room">
                <h4>Large Room</h4>
                <p>Kapasitas 25-30 orang</p>
                <button onclick="location.href='{{ route('bookings.create') }}'">Reservasi Sekarang</button>
            </div>
            <div class="card">
                <img src="{{ asset('image/r4.jpg') }}" alt="Medium Room">
                <h4>Medium Room</h4>
                <p>Kapasitas 15-20 orang</p>
                <button onclick="location.href='{{ route('bookings.create') }}'">Reservasi Sekarang</button>
            </div>
            <div class="card">
                <img src="{{ asset('image/r3.jpg') }}" alt="Small Room">
                <h4>Small Room</h4>
                <p>Kapasitas 5-10 orang</p>
                <button onclick="location.href='{{ route('bookings.create') }}'">Reservasi Sekarang</button>
            </div>
        </div>
    </div>
    <div class="benefit">
        <h2>Fasilitas</h2>
        <p>Kami Menyediakan Fasilitas Yang Menunjang Kebutuhan Anda</p>
        <div class="ac">
            <img src="{{ asset('image/f.jpg') }}">
            <p>Pendingin Ruangan</p>
        </div>
        <div class="mekur">
            <img src="{{ asset('image/f1.jpg') }}">
            <p>Kursi & Meja</p>
        </div>
        <div class="proyektor">
            <img src="{{ asset('image/f2.jpg') }}">
            <p>LCD & Proyektor</p>
        </div>
        <div class="snack">
            <img src="{{ asset('image/f3.jpg') }}">
            <p>Snack Ringan</p>
        </div>
    </div>

    
</body>
    <footer>
        <p>&copy; 2024 SIJI. All Rights Reserved.</p>
        <p>
            <a href="dashboard">Home</a> |
            <a href="#">About Us</a> |
            <a href="#">Contact</a>
        </p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Show the modal if session success is present
            @if (session('success'))
                modal.style.display = "block";
            @endif

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
@endsection
