<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('cities')->insert([
            'city_name' => 'Damascus', 'tour_site_name' => 'Umayyad Mosque', 'cost' => 10.00,]);

        DB::table('cities')->insert([
            'city_name' => 'Aleppo', 'tour_site_name' => 'Aleppo Citadel', 'cost' => 8.00,]);

        DB::table('cities')->insert([
            'city_name' => 'Palmyra', 'tour_site_name' => 'Temple of Bel', 'cost' => 12.00,]);

        DB::table('cities')->insert([
            'city_name' => 'Hama', 'tour_site_name' => 'Norias of Hama', 'cost' => 5.00,]);

        DB::table('cities')->insert([
            'city_name' => 'Latakia', 'tour_site_name' => 'Ugarit Ruins', 'cost' => 7.00,]);
    }
}
