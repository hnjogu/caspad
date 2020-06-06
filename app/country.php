<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class country extends Model
{
    //
    use Notifiable;
    public $table = "country";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'country', 'capitalcity','id',
    ];
}
