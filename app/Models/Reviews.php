<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table="clg_reviews";
    protected $primaryKey="review_id";
    protected $guarded=['review_id'];
}
