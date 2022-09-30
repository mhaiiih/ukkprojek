<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
     /**
     * fillable
     *
     * @var array
     */
    protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'tanggal',
        'waktu',
        'lokasi',
        'suhu_tubuh'
    ];
    protected $dates =['created_at'];
}