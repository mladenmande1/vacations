<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacationRequests extends Model
{
    protected $table = 'vacation_requests';

    protected $fillable = [
        'user_id', 'start_date', 'end_date',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function countDays()
    {
        $start = new \Carbon\Carbon($this->start_date);
        $end = new \Carbon\Carbon($this->end_date);
        $difference = $start->diffInDaysFiltered(function(\Carbon\Carbon $date) {
            return !$date->isWeekend();
        }, $end);
        return $difference;
    }
}