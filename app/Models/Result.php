<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table="clg_result";
    protected $primaryKey="result_id";
    protected $guarded=['result_id'];
}
