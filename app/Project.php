<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Project extends Model
{
    //
    use Notifiable;
    public $table = "projects";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'user_id', 'project_id','id','customer_name', 'freelancer_id','graded_by','claimed_by', 'status','accuracy','formatting', 'subject','length','accent','body','comments', 'amount_per_minute','total_amount','no_of_speakers','title','instructions','job_type','project_type', 'paid','file_name',
    ];
}