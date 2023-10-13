<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kalkulator extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi', 'foto', 'jenisSampah', 'jumlahSampah', 'harga'];
    protected $table = 'kalkulator';
    public $timestamps = false;
}
