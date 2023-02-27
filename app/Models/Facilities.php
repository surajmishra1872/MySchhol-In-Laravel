<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory;

    protected $table="clg_facilities";
    protected $primaryKey="facilities_id ";
    protected $guarded=['facilities_id '];
}
