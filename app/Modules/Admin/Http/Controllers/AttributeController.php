<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Attribute;

class AttributeController extends AdminController
{
    public function index() {
        $attribute = Attribute::all();
        $data = $this->getUserInfo();

        return view('admin::attribute/attribute')
            ->with('data', $data)
            ->with('attribute', $attribute);
    }
}
