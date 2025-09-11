<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;

class MediaCategory extends Model
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
        'description',
        'thumbnail',
        'type_id',
        'status_id',
    ];


    /**
    * appends
    */
    protected $appends = [
        'thumbnail_url',
    ];

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

}
