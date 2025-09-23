<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Main\Type;

class Playlist extends Model
{

    /**
     * UUIDs
     */
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'description',
        'type_id'
    ];


        /**
    * appends
    */
    protected $appends = [
        'thumbnail_url',
        'total_media',
    ];



   // GETTERS&SETTERS
    public function getThumbnailUrlAttribute()
    {
        $value = $this->mediaPlaylist()->inRandomOrder()->first();
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value->media_id."/thumbnail.jpg";
        }
    }
    public function getTotalMediaAttribute()
    {
        return $this->mediaPlaylist()->count();
    }


    /**
     * user
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['user_id','first_name','last_name']);
    }

    /**
     * type
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }



    /**
     * mediaPlaylist
     */
    public function mediaPlaylist()
    {
        return $this->hasMany(MediaPlaylist::class, 'user_id', 'user_id');
    }


}
