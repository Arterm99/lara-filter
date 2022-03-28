<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Добавляем из папки Models класс Post, исп use
use App\Models\AdminPanel;

// Добавялем обработчик ошибкок
use App\Http\Requests\AdminRequests;
use Illuminate\Support\Facades\Storage;

class AdminPanelController extends Controller {
    public function admin(AdminRequests $row) {
        
    $tables = $row->validated();
        $previewImage = $tables['profile_image'];
        $img = Storage::put('/images', $previewImage);
        
        $table = new AdminPanel();
        
        $table->name = $row->input('name'); // Название товара
        $table->price = $row->input('price');
        $table->weght = $row->input('weght');
        $table->description = $row->input('description'); // Описание товара

        $table->profile_image = $img;

        $table->save();

        return redirect('/');
    }

   
    public function JsonCodeProduct() {
        header('Content-Type: application/json');
        $json_code = AdminPanel::all();
        
        echo json_encode($json_code, JSON_UNESCAPED_UNICODE);


    } 
}
