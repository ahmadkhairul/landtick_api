<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\StationCollection;
use App\Station;

class StationController extends Controller
{
    public function index(){
        $station = Station::all();
        return new StationCollection($station);
    }

    public function limit($offset){
        $station = Station::offset($offset)->limit(10)->get();
        return new StationCollection($station);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:stations,code|alpha|max:3',
            'name' => 'required|string',
            'city' => 'required|string'
        ]);

        $station = Station::create($request->all());
        return response()->json(['message' => 'create succes', 'data' => $station]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code' => 'required|unique:stations,code|alpha|max:3',
            'name' => 'required|string',
            'city' => 'required|string'
        ]);

        $station = Station::find($id);
        $station->update($request->all());
        return response()->json(['message' => 'update succes']);
    }

    public function destroy($id)
    {
        $station = Station::find($id);
        $station->delete();
        return response()->json(['message' => 'delete success']);
    }
}
