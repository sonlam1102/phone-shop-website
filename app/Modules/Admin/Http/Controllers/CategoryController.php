<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    public function index() {
        $category = Category::all();
        $data = $this->getUserInfo();

        return view('admin::category/category')
            ->with('data', $data)
            ->with('category', $category);
    }

    public function add(Request $request) {
        $category = $request->post('name_category');

        $data = [
            'name' => $category
        ];

        $category_model = new Category();
        $category_model->update_category($data);

        return redirect()->back();
    }
}
