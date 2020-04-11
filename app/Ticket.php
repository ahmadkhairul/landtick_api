<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Station;

class Ticket extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $table = 'tickets';

    protected $fillable = [
      "name",
      "classType",
      "dateStart",
      "startStation",
      "startTime",
      "destinationStation",
      "arrivalTime",
      "price",
      "qty"
    ];

    protected $hidden = [
      'createdAt', 'updatedAt', 'startStation', 'destinationStation'
    ];

    public function Start()
    {
        return $this->belongsTo('App\Station', 'startStation');
    }

    public function Destination()
    {
        return $this->belongsTo('App\Station', 'destinationStation');
    }

}
