<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use App\Models\User;
use App\Models\Main\Media;
use App\Models\Settings\DeviceType;

class MediaHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'media_id',
        'user_id',
        'device_type_id',

        'created_at',
        'updated_at'
    ];


    /**
     * user
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['user_id','first_name','last_name']);
    }

    /**
     * media
     */
    public function media(){
        return $this->belongsTo(Media::class, 'media_id', 'id')->select(['id','user_id','title','views','created_at']);
    }

    /**
     * deviceType
     */
    public function deviceType(){
        return $this->belongsTo(DeviceType::class, 'device_type_id', 'id');
    }



}
