<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'temperature',
        'is_busy',
    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
