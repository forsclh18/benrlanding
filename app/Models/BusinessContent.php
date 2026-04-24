<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessContent extends Model
{
    protected $table = 'business_contents';
    
    protected $fillable = [
        'heading',
        'description',
        'btn_text',
        'btn_link'
    ];
}