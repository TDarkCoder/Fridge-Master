<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'temperature',
        'is_busy',
    ];

    public function scopeBusy(Builder $builder): Builder
    {
        return $builder->whereIsBusy(true);
    }

    public function scopeFree(Builder $builder): Builder
    {
        return $builder->whereIsBusy(false);
    }

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
