<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use Carbon\Carbon;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tickets = [[
            "name" => "Agro Willis",
            "classType" => 1,
            "dateStart" => Carbon::now(),
            "startStation" => 1,
            "startTime" => Carbon::now(),
            "destinationStation" => 2,
            "arrivalTime" => Carbon::now(),
            "price" => 250000,
            "qty" => 30,
        ],[
            "name" => "Agro Cherry",
            "classType" => 2,
            "dateStart" => Carbon::now(),
            "startStation" => 2,
            "startTime" => Carbon::now(),
            "destinationStation" => 3,
            "arrivalTime" => Carbon::now(),
            "price" => 350000,
            "qty" => 40,
        ],[
            "name" => "Agro Lawas",
            "classType" => 3,
            "dateStart" => Carbon::now(),
            "startStation" => 1,
            "startTime" => Carbon::now(),
            "destinationStation" => 3,
            "arrivalTime" => Carbon::now(),
            "price" => 450000,
            "qty" => 35,
        ]];

        foreach($tickets as $ticket){
            Ticket::create($ticket);
        }
    }
}
