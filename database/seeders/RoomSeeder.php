<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $locations = Location
            ::inRandomOrder()
            ->take(10)
            ->get();

        if (!$locations) {
            return;
        }

        $rooms = [];
        $availableTemperatures = [-2, 1, 1, 2];

        foreach ($locations as $location) {
            for ($i = 0; $i < 2; $i++) {
                shuffle($availableTemperatures);

                $rooms[] = [
                    'location_id' => $location->id,
                    'temperature' => $availableTemperatures[0],
                    'is_busy' => random_int(0, 1),
                ];
            }
        }

        Room::insert($rooms);
    }
}
