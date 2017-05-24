<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['name', 'date', 'time', 'phone','person_count'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
