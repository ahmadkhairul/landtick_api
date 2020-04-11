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
}
