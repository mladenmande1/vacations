<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $vacationDays = 20;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function vacation_requests(){
        return $this->hasMany('App\VacationRequests');
    }

    public function availableFreeDays()
    {
        $total = 0;

        foreach($this->vacation_requests->where('approved', 1) as $row) {
            $start = new \Carbon\Carbon($row->start_date);
            $end = new \Carbon\Carbon($row->end_date);
            $difference = $start->diffInDaysFiltered(function(\Carbon\Carbon $date) {
                return !$date->isWeekend();
            }, $end);
            $total += $difference;
        }
        return $this->vacationDays - $total;
    }


}
