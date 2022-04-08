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
        if (isset($tables['profile_image'])) {
            $previewImage = $tables['profile_image'];
            $img = Storage::put('/images', $previewImage);
        } else {
            $img = 'storage/Белый_квадрат.jpg';
        }

        
        $table = new AdminPanel();
        
        $table->product = $row->input('product');
        $table->category = $row->input('category');
        $table->name = $row->input('name');
        $table->price = $row->input('price');
        $table->weght = $row->input('weght');
        $table->description = $row->input('description');

        $table->profile_image = $img;

        $table->save();

        /* получить часть урла
        $uri = $row->path();
        
        получение ip
        $ipAddress = $row->ip();
        */

        return redirect('/');
    }

    // Витрина
    public function show() {

        $table = new AdminPanel;
        $ravno = new AdminPanel;

        return view('show', 

            ['table' => $table->orderBy('id', 'desc')->take(2)->get()],
            ['ravno' => $ravno->where('category', '=', 'zspr')->get()],
       
        ); 
    } 

    // Показать карточку одного товара
    public function OneShowProduct($id) {
        $table = new AdminPanel;
        return view('one_product', ['table' => $table->find($id)]);
    }

    // Редактировать продукт
    public function EditProduct($id, AdminRequests $row) {
 
        $tables = $row->validated();
        if (isset($tables['profile_image'])) {
            $previewImage = $tables['profile_image'];
            $img = Storage::put('/images', $previewImage);
        } else {
            $img = 'storage/Белый_квадрат.jpg';
        }
        
        $table = AdminPanel::find($id);
        
        $table->product = $row->input('product');
        $table->category = $row->input('category');
        $table->name = $row->input('name');
        $table->price = $row->input('price');
        $table->weght = $row->input('weght');
        $table->description = $row->input('description');

        $table->profile_image = $img;

        $table->save();
        
        return view('one_product', ['table' => $table->find($id)])->with('success', "Все обнолвено!"); 
    }

    // Удалить продукт
    public function DeleteProduct($id) {
        AdminPanel::find($id)->delete();
        return redirect()->route('show'); 
    }





    public function JsonCodeProduct() {
        header('Content-Type: application/json');
        $json_code = AdminPanel::all();
        
        echo json_encode($json_code, JSON_UNESCAPED_UNICODE);


    } 
}
