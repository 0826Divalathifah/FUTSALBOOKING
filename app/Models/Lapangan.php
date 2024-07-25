<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $table = 'lapangan';

    protected $fillable = ['name', 'description', 'price_per_hour'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
