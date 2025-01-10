<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            'city_name' => 'Damascus', 'tour_site_name' => 'Umayyad Mosque', 'cost' => 10.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Aleppo', 'tour_site_name' => 'Aleppo Citadel', 'cost' => 8.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Palmyra', 'tour_site_name' => 'Temple of Bel', 'cost' => 12.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Hama', 'tour_site_name' => 'Norias of Hama', 'cost' => 5.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Latakia', 'tour_site_name' => 'Ugarit Ruins', 'cost' => 7.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Homs', 'tour_site_name' => 'Homs Citadel', 'cost' => 6.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Tartus', 'tour_site_name' => 'Arwad Island', 'cost' => 8.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Deir ez-Zor', 'tour_site_name' => 'Euphrates River Suspension Bridge', 'cost' => 4.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Daraa', 'tour_site_name' => 'Bosra Roman Theater', 'cost' => 9.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Qamishli', 'tour_site_name' => 'Al-Qamishli Park', 'cost' => 3.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Raqqa', 'tour_site_name' => 'Old Raqqa Mosque', 'cost' => 4.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Idlib', 'tour_site_name' => 'Dead Cities', 'cost' => 6.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'As-Suwayda', 'tour_site_name' => 'Shahba Ancient City', 'cost' => 7.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Al-Hasakah', 'tour_site_name' => 'Tell Brak', 'cost' => 5.00,
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Banias', 'tour_site_name' => 'Banias Waterfall', 'cost' => 4.00,
        ]);
    }
}
