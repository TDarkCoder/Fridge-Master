<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'timezone',
    ];

    public $timestamps = false;

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
