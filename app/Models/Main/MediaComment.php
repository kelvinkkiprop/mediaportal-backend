<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use App\Models\User;

class MediaComment extends Model
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
            // UUID
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
        'media_id',
        'text',
        'status_id',
    ];

        /**
    * appends
    */
    protected $appends = [
        'readable_date',
    ];

    // GETTERS&SETTERS
    public function getReadableDateAttribute()
    {
        // return $this->created_at ? $this->created_at->diffForHumans() : null;
        return $this->created_at ? $this->created_at->diffForHumans([
            'short' => false,
            'parts' => 1,     // show_1_only_e.g._5s
        ]) : null;
    }

    /**
     * user
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->select(['id', 'first_name', 'last_name']);
    }

}
