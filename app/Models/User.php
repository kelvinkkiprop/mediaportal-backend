<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Add
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use App\Models\Settings\Role;
use App\Models\Settings\UserStatus;
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
            // username
            if (empty($model->username)) {
                $model->username = static::generateUniqueUsername($model->first_name, $model->last_name);
            }
            // referral_code
            if (empty($model->referral_code)) {
                $model->referral_code = self::generateUniqueReferralCode();
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
        'first_name',
        'last_name',
        'username',
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

        'referred_by_id',
        'referral_code',
        'autoplay',
        'receive_notifications',

        'organization_category_id',
        'organization_id',
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
        'name',
    ];

    public function getNameAttribute()
    {
        $value = $this->first_name;
        $value2 = $this->last_name;
        if(is_null($value) && is_null($value2)){
            return null;
        }
        return $value.' '.$value2;
    }

     /**
     * generateUniqueReferralCode
     */
    public static function generateUniqueReferralCode(int $length = 8): string
    {
        do {
            $code = strtoupper(Str::random($length));
        } while (self::where('referral_code', $code)->exists());
        return $code;
    }

    /**
     * generateUniqueUsername
     */
    protected static function generateUniqueUsername(string $firstName, string $lastName): string
    {
        $baseUsername = Str::slug($firstName . ' ' . $lastName, '_');
        $username = $baseUsername;
        $counter = 1;
        // Check_if_username_exists_append_counter_if_needed
        while (static::where('username', $username)->exists()) {
            $username = $baseUsername . '_' . $counter;
            $counter++;
        }
        return $username;
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
     * referrals
     */
    public function referrals()
    {
        return $this->hasMany(self::class, 'referred_by_id');
    }

    /**
     * referrer
     */
    public function referrer()
    {
        return $this->belongsTo(self::class, 'referred_by_id');
    }
}
