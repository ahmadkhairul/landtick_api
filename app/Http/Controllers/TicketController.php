<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    public function index(){
        $ticket = Ticket::all();
        $ticket_total = Ticket::all()->count();
        
        for ($i = 0; $i < $ticket_total; $i++){
            $ticket->startStation = $ticket[$i]->start;
            $ticket->destinationStation = $ticket[$i]->destination;
        }

        return response()->json(['message' => 'get ticket success', 'data' => $ticket]);       
    }

    public function limit($offset){
        $ticket = Ticket::offset($offset)->limit(5)->get();
        $ticket_total = Ticket::offset($offset)->limit(5)->get()->count();
        
        for ($i = 0; $i < $ticket_total; $i++){
            $ticket->startStation = $ticket[$i]->start;
            $ticket->destinationStation = $ticket[$i]->destination;
        }

        return response()->json(['message' => 'get ticket success', 'data' => $ticket]);    
    }

    public function store(Request $request)
    {
        $ticket = Ticket::create($request->all());
        return response()->json(['message' => 'create succes', 'data' => $ticket]);
    }

    public function search(Request $request)
    {
        function searchdata($req){
            if ($req == "") {
                return "%%";
              } else {
                return $req;
              }
        } 

        $start = searchdata($request->startStation);
        $destination = searchdata($request->destinationStation);
        
        $ticket = Ticket::where('dateStart', '>', $request->dateStart)     
                ->where('startStation', 'like', $start)
                ->where('destinationStation', 'like', $destination)
                ->where('qty', '>', $request->qty)
                ->get();

        $ticket_total = $ticket->count();
        
        for ($i = 0; $i < $ticket_total; $i++){
            $ticket->startStation = $ticket[$i]->start;
            $ticket->destinationStation = $ticket[$i]->destination;
        }
        
        return response()->json(['message' => 'create succes', 'data' => $ticket]);
    }
}
