<?php

namespace App\Modules\Manager\Http\Controllers;

use App\Model\Import;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ImportController extends ManagerController
{
    public function index() {
        $imports = \Auth::user()->manager->company->imports;
        $data = $this->getUserInfo();

        return view('manager::import/import')
            ->with('data', $data)
            ->with('import', $imports);
    }

    public function detail($id) {
        $import = Import::find($id);
        $data = $this->getUserInfo();

        return view('manager::import/detail')
            ->with('data', $data)
            ->with('import', $import);
    }
}
