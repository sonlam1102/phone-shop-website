<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CategoryController extends AdminController
{
    public function index() {
        $category = Category::find('all');

        return view('admin::category/category')
            ->with('data', $this->getAdminInfo())
            ->with('category', $category);
    }
}
