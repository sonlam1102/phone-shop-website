<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Model\Category;

class CategoryController extends AdminController
{
    public function index() {
        $category = Category::all();
        $data = $this->getUserInfo();

        return view('admin::category/category')
            ->with('data', $data)
            ->with('category', $category);
    }
}
