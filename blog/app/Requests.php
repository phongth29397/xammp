<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Requests extends Model
{
    use Notifiable;
        const STATUS_NEW = 1 ;
        const STATUS_APPROVED = 2 ;
        const STATUS_REJECTED = 3 ;
        const STATUS_COMPLETED = 4 ;
        protected $table = 'Requests';
}
