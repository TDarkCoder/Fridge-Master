<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\SaveRequest;
use App\Models\Block;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\JsonResponse;

class BookingController extends ApiController
{
    public function store(SaveRequest $request, Room $room): JsonResponse
    {
        $booking = $room->bookings()->create([
            ...$request->validated(),
            ...[
                'location_id' => $room->location_id,
            ],
        ]);

        $this->distributeInBlocks($room, $booking);

        return $this->respond($booking);
    }

    private function distributeInBlocks(Room $room, Booking $booking): void
    {
        $blocks = [];
        $volume = $booking->volume;

        while ($volume > 0) {
            $room
                ->blocks()
                ->free()
                ->take(ceil($volume / Block::DEFAULT_VOLUME))
                ->get()
                ->each(static function ($block) use (&$blocks, &$volume): bool {
                    if ($volume > 0) {
                        $volume -= $block->volume;
                        $blocks[] = $block->id;

                        return true;
                    }

                    return false;
                });
        }

        $room
            ->blocks()
            ->whereIn('id', $blocks)
            ->update([
                'booking_id' => $booking->id,
            ]);

        if (!$room->blocks()->free()->count()) {
            $room->update([
                'is_busy' => true,
            ]);
        }
    }
}
