<?php

namespace App\Http\Requests\Booking;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Foundation\Http\FormRequest;

class SaveRequest extends FormRequest
{
    private ?Room $room;

    public function authorize(): bool
    {
        $this->room = $this->route('room');

        return !$this->room->is_busy;
    }

    public function rules(): array
    {
        $availableBlocksVolume = $this->room
            ->blocks()
            ->free()
            ->sum('volume');

        return [
            'duration' => 'required|numeric|lte:'.Booking::DURATION_MAX,
            'volume' => 'required|numeric|lte:'.$availableBlocksVolume,
        ];
    }
}
