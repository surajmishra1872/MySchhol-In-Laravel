<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table="clg_slider";
    protected $primaryKey="slider_id ";
    protected $guarded=['slider_id '];
}
