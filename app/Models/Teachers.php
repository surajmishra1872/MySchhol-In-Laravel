<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    protected $table="clg_teachers";
    protected $primaryKey="id ";
    protected $guarded=['id'];
}