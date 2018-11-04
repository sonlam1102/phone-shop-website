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

    public function add(Request $request) {
        $name = $request->post('name');

        $data = [
            'name' => $name,
        ];

        Attribute::addAttribute($data);

        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $name = $request->post('name');

        $data = [
            'name' => $name,
        ];

        $attribute = Attribute::find($id);
        $attribute->updateAttribute($data);

        return redirect()->back();
    }

    public function delete($id) {
        $attribute = Attribute::find($id);

        $attribute->delete();

        return redirect()->back();
    }
}
