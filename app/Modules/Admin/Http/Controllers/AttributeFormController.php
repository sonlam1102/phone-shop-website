<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Model\AttributeFormItem;
use App\Model\Category;
use App\Model\ProductAttributeForm;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AttributeFormController extends AdminController
{
    public function index() {
        $form = ProductAttributeForm::all();
        $data = $this->getUserInfo();

        return view('admin::attribute_form/list')
            ->with('data', $data)
            ->with('form', $form);
    }

    public function create(Request $request) {
        $category = $request->post('category');
        $data = $request->post('attributes_form');

        $form = ProductAttributeForm::makeForm(Category::find($category)->name, $category);

        $data = json_decode($data);

        foreach ($data as $item) {
            if ($item->attribute != '')
                AttributeFormItem::addItem($form, $item->attribute);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $attributes = $request->post('attributes_form');
        $category = $request->post('category');

        $attr_form = ProductAttributeForm::find($id);
        $attr_form->editItem($category, json_decode($attributes));

        return redirect()->back();
    }

    public function delete($id) {
        $attr_form = ProductAttributeForm::find($id);
        $attr_form->delete();

        return redirect()->back();
    }
}
