<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
// Add
use App\Models\User;

class UserDevice extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'device_type_id',
        'ip_address',
        'login_at'
    ];


    /**
     * user
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['id','first_name','last_name', 'name']);
    }

}
