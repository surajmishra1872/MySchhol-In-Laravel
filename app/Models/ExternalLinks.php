<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalLinks extends Model
{
    use HasFactory;

    protected $table="external_links";
    protected $primaryKey="link_id ";
    protected $guarded=['link_id'];
}
