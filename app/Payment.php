<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use willvincent\Rateable\Rateable;

class Payment extends Model
{
    //
    use Notifiable;
    use Rateable;
    public $table = "payments";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'user_id', 'project_id','payment_id','payer_id', 'payer_email','amount','currency', 'payment_status',
    ];
}
