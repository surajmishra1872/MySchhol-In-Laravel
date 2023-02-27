<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumGallery extends Model
{
    use HasFactory;

    protected $table="gallery_images";
    protected $primaryKey="img_id ";
    protected $guarded=['img_id '];
}
