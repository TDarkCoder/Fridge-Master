<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Block extends Model
{
    use HasFactory;

    public const DEFAULT_VOLUME = 2;

    protected $fillable = [
        'room_id',
        'volume',
        'is_busy',
    ];

    public function scopeBusy(Builder $builder): Builder
    {
        return $builder->whereNotNull('booking_id');
    }

    public function scopeFree(Builder $builder): Builder
    {
        return $builder->whereNull('booking_id');
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
