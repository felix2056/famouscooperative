<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasSlug, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
    */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
    */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<int, string>
    */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be appended to the model's array form.
     *
     * @var array<int, string>
    */
    protected $appends = [
        'full_name',
    ];

    public function designations()
    {
        return $this->belongsToMany(Designation::class, 'user_designations', 'user_id', 'designation_id')->withTimestamps();
    }

    public function records()
    {
        return $this->hasMany(Record::class, 'client_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'client_id');
    }

    public function chats()
    {
        return $this->hasMany(TicketChat::class, 'user_id');
    }

    /**
     * Get the user's full name.
     *
     * @return string
    */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getDateOfBirthAttribute()
    {
        return date('d/m/Y', strtotime($this->attributes['date_of_birth']));
        // return Carbon::parse($this->date_of_birth)->format('d/m/Y');
    }

    public function getProfilePicUrlAttribute()
    {
        $pic = $this->profile_pic;

        if (empty($pic)) {
            $pic = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?s=200&d=mm';
        } else {
            $pic = '/storage/profiles/' . $this->profile_pic;
        }
        
        return $pic;
    }

    public function getDesignationAttribute()
    {
        return $this->designations->first()->name ?? NULL;
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name'])
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->usingSeparator('-');
    }
}
