<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table="web_enquiry";
    protected $primaryKey="enquiry_id ";
    protected $guarded=['enquiry_id'];
}
