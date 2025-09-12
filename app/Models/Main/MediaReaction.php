<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use App\Models\User;
use App\Models\Main\Media;

class MediaReaction extends Model
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
        'type_id',

        'created_at',
        'updated_at'
    ];


    /**
     * user
     */
    public function user(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * courseModule
     */
    public function courseModule(){
        return $this->belongsTo(Media::class, 'id', 'media_id');
    }

}
