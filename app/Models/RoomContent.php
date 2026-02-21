<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomContent extends Model
{
    protected $fillable = [
        'section_name',
        'title',
        'description',
        'image_path'
    ];
}
