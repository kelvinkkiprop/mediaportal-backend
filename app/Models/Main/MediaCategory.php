<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use App\Models\Main\ContentCategory;
use App\Models\Main\Media;

class MediaCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'media_id',
        'category_id',
    ];


    /**
    * appends
    */
    protected $appends = [
        'name',
        'total_media',
    ];




    // GETTERS&SETTERS
    public function getNameAttribute()
    {
        $value = $this->category_id;
        if(is_null($value)){
            return null;
        }else{
            return ContentCategory::find($value)->name;
        }
    }
    public function getTotalMediaAttribute()
    {
        $value = $this->media()->count();
        if(is_null($value)){
            return null;
        }else{
            return $value." Media";
        }
    }


    /**
     * category
     */
    public function category()
    {
        return $this->belongsTo(ContentCategory::class, 'category_id', 'id');
    }

    /**
     * media
     */
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
    // public function media()
    // {
    //     return $this->belongsToMany(Media::class, 'media_categories', 'category_id', 'media_id');
    // }

}
