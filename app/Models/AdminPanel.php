<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminPanel extends Model
{
    use HasFactory;

//    "Мягкое удаление"
    use SoftDeletes;

    protected $table = 'admin_panels';
    protected $guarded = []; // Разрешает вносить значения в БД




}
