<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use Notifiable, HasApiTokens, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Todos that belong to this user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function todos()
    {
        return $this->hasMany('App\Todo', 'user_id');
    }

    /**
     * Projects that belong to this user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany('App\Project', 'user_id');
    }

    //    public function registerMediaConversions(Media $media = null)
    //    {
    //        $this->addMediaConversion('thumb')
    //            ->width(368)
    //            ->height(232)
    //            ->sharpen(10)
    //            ->nonOptimized();
    //    }

    //    public function registerMediaConversions(Media $media = null)
    //    {
    //        $this->addMediaConversion('thumb')
    //            ->crop('crop-center',200,200)
    //            ->sharpen(10);
    //
    //        $this->addMediaConversion('full')
    //            ->width(800)
    //            ->height(800)
    //            ->sharpen(10);
    //    }

    protected $guarded = [];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10);

        $this->addMediaConversion('square')
            ->width(412)
            ->height(412)
            ->sharpen(10);
    }

    public function isAdmin()
    {
        if ($this->role === 1) {
            return true;
        } else {
            return false;
        }
    }
}
