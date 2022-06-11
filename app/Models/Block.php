<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'volume',
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

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
