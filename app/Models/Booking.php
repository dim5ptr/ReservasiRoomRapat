<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'date', 'start_time', 'end_time', 'ruang', 'tambahan_fasilitas', 'jumlah'
    ];
}
