<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Добавляем из папки Models класс Post, исп use
use App\Models\AdminPanel;
use App\Models\Category;

// Добавялем обработчик ошибкок
use App\Http\Requests\AdminRequests;
use Illuminate\Support\Facades\Storage;

class AdminPanelController extends Controller
{
    public function admin(AdminRequests $row)
    {
        /*

        $test = Category::find(1);

        $products = AdminPanel::where('category_id', $test->id)->get();
        dd($test->products);

        */
        $test = Category::find(1);
        dd($test->products);

        if ($row->hasFile('profile_image')) {
            $img = [Storage::put('/images', $row->file('profile_image'))];
        } else {
            $img = 'storage/Белый_квадрат.jpg';
        }
        $row->merge(['profile_image' => $img]);
        $tables = $row->all();

        AdminPanel::create($tables);

        return redirect('/');
        /*
         *
         *      0. Второй Вариант сохранения данных в БД
                $table = new AdminPanel();

                $add = [
                    $table->product = $row->input('product'),
                    $table->category = $row->input('category'),
                    $table->name = $row->input('name'),
                    $table->price = $row->input('price'),
                    $table->weight = $row->input('weght'),
                    $table->description = $row->input('description'),
                    $table->profile_image = $img,
                ];

                dd($add);
                $table->save($add);

                1. Проверка на совпадение переменной в БД

                $user->roles()->firstOrCreate([
                    'name' => 'Administrator',
                ], [
                    'created_by' => $user->id,
                ]);

                */

    }

    // Витрина
    public function show()
    {

        $table = new AdminPanel;
//        $ravno = new AdminPanel;

        return view('show',

            ['table' => $table->orderBy('id', 'desc')->take(2)->get()],
//            ['ravno' => $ravno->where('category', '=', 'zspr')->get()],

        );
    }

    // Показать карточку одного товара
    public function OneShowProduct($id)
    {
        $table = new AdminPanel;
        return view('one_product', ['table' => $table->findOrFail($id)]);
    }

    // Редактировать продукт
    public function EditProduct($id, AdminRequests $row)
    {

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
        $table->weght = $row->input('weight');
        $table->description = $row->input('description');

        $table->profile_image = $img;

        $table->save();

        return view('one_product', ['table' => $table->find($id)])->with('success', "Все обнолвено!");
    }

//  Удалить продукт
    public function DeleteProduct($id)
    {
        AdminPanel::find($id)->delete();
        return redirect()->route('show');

        /*  "Мягкое" удаление (восстановление)
                AdminPanel::withTrashed()->find(1)->restore();
                */
    }


    public function JsonCodeProduct()
    {
        header('Content-Type: application/json');
        $json_code = AdminPanel::all();

        echo json_encode($json_code, JSON_UNESCAPED_UNICODE);

        /*
        return response()->json([
            'success' => true,
            'message' => 'Successfully loaded auto!',
            'models' => $auto,
        ], 201);
        */

    }
}
