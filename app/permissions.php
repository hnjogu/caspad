<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class permissions extends Authenticatable
{
    use Notifiable;
    public $table = "permissions";
    protected $primaryKey = 'id';
//protected $primaryKey = 'user_id';
public $timestamps = true;
    /*
     * Important records to be filled
     */
    protected $fillable = [
        'name','guard_name','user_name',
    ];
}