<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'btn_link',
        'image',
        'order',
        'is_active'
    ];
}
