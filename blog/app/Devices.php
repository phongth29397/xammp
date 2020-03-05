<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Devices extends Model
{
    use Notifiable;
    const CATEGORY_MOUSER = 1;
    const CATEGORY_KEYBOARD= 2;
    const CATEGORY_LAPTOP = 3;
    const CATEGORY_CASE = 4;
    const CATEGORY_SCREEN = 5;
    const CATEGORY_CAMERA= 6;
    const CATEGORY_PHONE = 7;
    const STATUS_IN_STOCK= 1;
    const STATUS_USE= 2;
    const STATUS_SALE= 3;
    protected $table = 'Devices';
}
