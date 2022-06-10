<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Location;
use Exception;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [];
        $locationsFile = base_path('database/seeders/data/locations.csv');

        if (!file_exists($locationsFile)) {
            return;
        }

        foreach (file($locationsFile) as $location) {
            try {
                [$name, $timezone] = str_getcsv($location);

                $locations[] = [
                    'name' => $name,
                    'timezone' => $timezone,
                ];
            } catch (Exception) {
                continue;
            }
        }

        Location::insert($locations);
    }
}
