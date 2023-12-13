<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = [];

    public array $translatable = [
        'title',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
        'repeater_content' => 'array',
        'builder_content' => 'array',
    ];
}
