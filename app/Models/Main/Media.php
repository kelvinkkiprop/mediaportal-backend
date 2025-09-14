<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Main\MediaReaction;
use App\Models\Main\MediaComment;

class Media extends Model
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
        'title',
        'description',
        'src_path',
        'hls_master',
        'thumbnail_path',

        'file_size',
        'mime_type',

        'user_id',
        'media_status_id',
        'status_id',
        'views',

        'type_id',
        'category_id',
        'allow_comments',
        'allow_download',

        'created_by',
        'updated_by',
        'approved_by',
        'approved_on',
    ];

    /**
    * appends
    */
    protected $appends = [
        'full_src_path',
        'full_hls_master',
        'thumbnail_url',
        'file',

        'readable_date',
        'is_liked',
        'is_disliked',
        'likes_count',
        'dislikes_count',
        'total_views',
        'total_comments',
    ];


    // GETTERS&SETTERS
    public function getFullSrcPathAttribute()
    {
        $value = $this->src_path;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url'); //.config('app.paths.file_download');
            return $path."/storage/".$value;
        }
    }

    public function getFullHlsMasterAttribute()
    {
        $value = $this->hls_master;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url'); //.config('app.paths.file_download');
            return $path."/storage/".$value;
        }
    }

    public function getThumbnailUrlAttribute()
    {
        $value = $this->id;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value."/thumbnail.jpg";
        }
    }

    public function getFileAttribute()
    {
        $value = $this->id;
        if(is_null($value)){
            return null;
        }else{
            return "https://test-streams.mux.dev/x36xhzz/x36xhzz.m3u8";
        }
    }

    public function getReadableDateAttribute()
    {
        // return $this->created_at ? $this->created_at->diffForHumans() : null;
        return $this->created_at ? $this->created_at->diffForHumans([
            'short' => false,
            'parts' => 1,     // show_1_only_e.g._5s
        ]) : null;
    }

    public function getTotalViewsAttribute()
    {
        $value = $this->views;
        if(is_null($value)){
            return null;
        }else{
            return $value==1 ? $value." view" : $value." views";
        }
    }
    public function getTotalCommentsAttribute()
    {
        $value =  $this->comments()->count();;
        if(is_null($value)){
            return null;
        }else{
            return $value==1 ? $value." Comment" : $value." Comments";
        }
    }

    public function getIsLikedAttribute()
    {
        $mCurrentUser = auth()->user();
        if (!$mCurrentUser) {
            return 0; // false
        }
        return $this->reactions()->where('user_id', $mCurrentUser->id)->where('type_id', 1)->exists();
    }

    public function getIsDislikedAttribute()
    {
        $mCurrentUser = auth()->user();
        if (!$mCurrentUser) {
            return 0; // false
        }
        return $this->reactions()->where('user_id', $mCurrentUser->id)->where('type_id', 2)->exists();
    }
    public function getLikesCountAttribute()
    {
        return $this->reactions()->where('type_id', 1)->count();
    }
    public function getDislikesCountAttribute()
    {
        return $this->reactions()->where('type_id', 2)->count();
    }


    /**
     * user
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * reactions
     */
    public function reactions()
    {
        return $this->hasMany(MediaReaction::class);
    }

    /**
     * comments
     */
    public function comments()
    {
        return $this->hasMany(MediaComment::class, 'media_id', 'id')->orderBy('created_at', 'desc');
    }

    /**
     * likes
     */
    public function likes()
    {
        return $this->reactions()->where('type_id', 1);
    }

    /**
     * dislikes
     */
    public function dislikes()
    {
        return $this->reactions()->where('type_id', 2);
    }

}
