<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Достаем значения по id (категории) .. hasMany - определяет отношение одного объекта с другим .. admin_panel_id - имя бд
    public function products() {

        return $this->hasMany(AdminPanel::class, 'category_id', 'id');
    }
}
