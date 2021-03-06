<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MediaItem extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $table = 'media_items';
    protected $fillable = [
        'title_fa',
        'title_en',
        'description_fa',
        'description_en',
        'link_hls',
        'link_dash',
        'pic1',
        'pic2',
        'type_fa',
        'type_en'
    ];
}
