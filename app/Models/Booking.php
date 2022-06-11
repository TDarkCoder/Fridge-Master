<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    public const DURATION_MAX = 24;

    protected $fillable = [
        'location_id',
        'user_id',
        'room_id',
        'volume',
        'duration',
        'invoice',
    ];

    protected $hidden = [
        'key',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(static fn($model): string => $model->key = str()->random(12));
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function root(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
