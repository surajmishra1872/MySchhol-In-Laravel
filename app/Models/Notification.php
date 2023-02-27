<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table="clg_notification";
    protected $primaryKey="notification_id ";
    protected $guarded=['notification_id '];
}
