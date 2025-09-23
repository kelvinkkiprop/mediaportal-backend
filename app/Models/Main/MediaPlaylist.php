<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Main\Media;
use App\Models\Main\Playlist;

class MediaPlaylist extends Model
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
        'playlist_id',
        'media_id',
    ];

    /**
     * playlist
     */
    public function playlist(){
        return $this->belongsTo(Playlist::class, 'playlist_id', 'id');
    }

    /**
     * user
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['user_id','first_name','last_name']);
    }

    /**
     * media
     */
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }

}
