<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $table = 'workshops';

    protected $fillable = [
        'subject_fa',
        'subject_en',
        'category_fa',
        'category_en',
        'teacher_name_fa',
        'teacher_name_en',
        'teacher_info_fa',
        'teacher_info_en',
        'link',
        'text_fa',
        'text_en',
        'country_fa',
        'country_en',
    ];

    public function comments()
    {
        return $this->hasMany(WorkshopComment::class);
    }

    public function pictures()
    {
        return $this->hasMany(WorkshopPicture::class);
    }
}