<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacationRequests extends Model
{
    protected $table = 'vacation_requests';

    public function user(){
        return $this->belongsTo('App\User');
    }
}