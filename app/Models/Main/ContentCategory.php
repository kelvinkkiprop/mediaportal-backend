<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use App\Models\Main\MediaCategory;

class ContentCategory extends Model
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
    * appends
    */
    protected $appends = [
        'thumbnail_url',
        'total_media',
        // 'random_thumbnail_url',
    ];

    // // getThumbnailUrlAttribute
    // public function getThumbnailUrlAttribute()
    // {
    //     $value = $this->id;
    //     if(is_null($value)){
    //         return null;
    //     }else{
    //         $path = config('app.asset_url').config('app.paths.file_download');
    //         return $path.$value."/thumbnail.jpg";
    //     }
    // }


    public function getTotalMediaAttribute()
    {
        return $this->media()->count();
    }

    public function getThumbnailUrlAttribute()
    {
        $value = $this->media()->inRandomOrder()->first();
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value->media_id."/thumbnail.jpg";
        }
    }


    /**
     * media
     */
    public function media()
    {
        return $this->hasMany(MediaCategory::class, 'category_id');
    }

}
