<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    
    protected $fillable = [
        'company_name',
        'tagline',
        'description',
        'vision',
        'mission',
        'address',
        'phone',
        'email',
        'cta_heading',
        'cta_btn_text',
        'logo',
        'favicon',
    ];
}