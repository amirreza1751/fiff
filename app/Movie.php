<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $table = 'movies';

    protected $fillable = [
        'name_fa',
        'name_en',
        'length',
        'format',
        'type_fa',
        'type_en',
        'genre_fa',
        'genre_en',
        'product_year_fa',
        'product_year_en',
        'summary_fa',
        'summary_en',
        'country_fa',
        'country_en',
        'show_subject_fa',
        'show_subject_en',
        'show_date_en',
        'show_date_fa',
        'awards_fa',
        'awards_en',
        'poster',
        'director_picture',
        'director_name_fa',
        'director_name_en',
        'producer_name_fa',
        'producer_name_en',
        'trailer_link_hls',
        'trailer_link_dash',
        'festival_number',
        'special',
    ];

    public function pictures()
    {
        return $this->hasMany(MoviePicture::class);
    }

    public function award_pictures()
    {
        return $this->hasMany(MovieAwardPicture::class);
    }
}
