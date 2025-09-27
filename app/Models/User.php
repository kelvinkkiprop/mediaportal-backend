<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Add
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use App\Models\Main\Media;
use App\Models\Settings\Role;
use App\Models\Settings\AccountType;
use App\Models\Settings\UserStatus;
use App\Models\Settings\UserDevice;
use App\Models\Other\County;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, Notifiable;

    // Include
    use HasApiTokens, HasFactory, Notifiable;

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
            // // username
            // if (empty($model->username)) {
            //     $model->username = static::generateUniqueUsername($model->first_name, $model->last_name);
            // }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'username',
        'name',
        'alias',
        'email',
        'phone',
        'verification_code',
        'role_id',
        'status_id',
        'picture',
        'email_verified_at',
        'password',

        'dob',
        'county_id',
        'constituency_id',
        'ward_id',
        'bio',

        'autoplay',
        'receive_notifications',

        'institution_category_id',
        'institution_id',
        'account_type_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'autoplay' => 'boolean',
        ];
    }

    /**
    * appends
    */
    protected $appends = [
        'full_name',
        'total_media',
        'thumbnail_url',
    ];


   // GETTERS&SETTERS
    public function getFullNameAttribute()
    {

        $value1 = $this->first_name;
        $value2 = $this->last_name;
        if(is_null($value1) && is_null($value2)){
            // return null;
            $value = $this->name;
            if(is_null($value)){
                return null;
            }
            return $value;
        }else{
            return $value1.' '.$value2;
        }
    }
    public function getTotalMediaAttribute()
    {
        $value = $this->media()->count();
        if(is_null($value)){
            return null;
        }else{
            return $value;
        }
    }
    public function getThumbnailUrlAttribute()
    {
        $value = $this->media()->inRandomOrder()->first();
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value->id."/thumbnail.jpg";
        }
    }


    /**
     * role
     */
    public function role(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    /**
     * status
     */
    public function status(){
        return $this->hasOne(UserStatus::class, 'id', 'status_id');
    }

    /**
     * county
     */
    public function county(){
        return $this->hasOne(County::class, 'id', 'county_id');
    }

    /**
     * type
     */
    public function type(){
        return $this->hasOne(AccountType::class, 'id', 'account_type_id');
    }



    /**
     * media
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'user_id', 'id');
    }

    /**
     * uploadedMedia
     */
    public function uploadedMedia()
    {
        return $this->hasMany(Media::class, 'created_by');
    }


    /**
     * userDevice
     */
    public function userDevice()
    {
        return $this->hasMany(UserDevice::class, 'user_id');
    }

}
