<?php

use Illuminate\Database\Seeder;
use App\Station;

class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::truncate();

        $stations = [[
            'code' => 'AKB',
            'name' => 'Aekloba',
            'city' => 'Labuhan Batu'
        ],[
            'code' => 'AJ',
            'name' => 'Arjasa',
            'city' => 'Arjasa'
        ],[
            'code' => 'AKB',
            'name' => 'Awipari',
            'city' => 'Tasikmalaya'
        ]];

        foreach($stations as $station){
            Station::create($station);
        }
    }
}
