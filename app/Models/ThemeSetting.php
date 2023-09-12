<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    use HasFactory;

    public function getWebsiteLogoAttribute()
    {
        return asset('storage/site/' . $this->attributes['website_logo']);
    }

    public function getWebsiteFaviconAttribute()
    {
        return asset('storage/site/' . $this->attributes['website_favicon']);
    }
}
