<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;

    protected $table="clg_videogallery";
    protected $primaryKey="gallery_id ";
    protected $guarded=['gallery_id '];
}
