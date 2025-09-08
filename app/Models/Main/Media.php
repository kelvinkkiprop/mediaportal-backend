<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;

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
        'status_id',
        'src_path',
        'hls_master',
        'thumbnail_path',

        'file_size',
        'mime_type',
    ];


    /**
    * appends
    */
    protected $appends = [
        'full_src_path',
        'full_hls_master',
        'thumbnail_url',
        'file',
    ];


    //   "src_path": "videos\/originals\/9fa75f06-5349-4fb8-99e9-21a74cc3f742.mp4",
    // "hls_master": "videos\/processed\/9fa75f06-5349-4fb8-99e9-21a74cc3f742\/master.m3u8",
    // "thumbnail_path": "videos\/processed\/9fa75f06-5349-4fb8-99e9-21a74cc3f742\/thumbnail.jpg",

    // getMediaUrlAttribute
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

    // getMediaUrlAttribute
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


    // getThumbnailUrlAttribute
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

    // getFileAttribute
    public function getFileAttribute()
    {
        $value = $this->id;
        if(is_null($value)){
            return null;
        }else{
            return "https://test-streams.mux.dev/x36xhzz/x36xhzz.m3u8";
        }
    }

}
