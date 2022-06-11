<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Room;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = Room
            ::free()
            ->whereDoesntHave('blocks')
            ->inRandomOrder()
            ->take(10)
            ->get();

        if (!$rooms) {
            return;
        }

        $blocks = [];

        foreach ($rooms as $room) {
            for ($i = 0; $i < random_int(2, 10); $i++) {
                $blocks[] = [
                    'room_id' => $room->id,
                    'is_busy' => random_int(0, 1),
                ];
            }
        }

        Block::insert($blocks);
    }
}
