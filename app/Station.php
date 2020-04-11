<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $table = 'stations';

    protected $fillable = [
        'code', 'name', 'city',
    ];

    protected $hidden = [
        'id', 'createdAt', 'updatedAt'
    ];

    public function tickets() 
    {
       return $this->hasMany('App\Ticket');
    }
}
