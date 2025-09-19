<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use App\Models\Main\MediaCategory;
use App\Models\Main\Media;

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
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'name',
        'alias',
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
        $value = $this->mediaCategory()->inRandomOrder()->first();
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value->media_id."/thumbnail.jpg";
        }
    }



    /**
     * mediaCategory
     */
    public function mediaCategory()
    {
        return $this->hasMany(MediaCategory::class, 'category_id', 'id');
        // return $this->belongsTo(MediaCategory::class, 'category_id', 'id');
    }


    /**
     * getTotalMediaAttribute
     */
    public function getTotalMediaAttribute()
    {
        return $this->mediaCategory()->count();
    }

}
