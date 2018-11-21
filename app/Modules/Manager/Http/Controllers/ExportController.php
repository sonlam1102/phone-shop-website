<?php

namespace App\Modules\Manager\Http\Controllers;

use App\Model\Export;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ExportController extends ManagerController
{
    public function index() {
        $exports = \Auth::user()->manager->company->exports;
        $data = $this->getUserInfo();

        return view('manager::export/export')
            ->with('data', $data)
            ->with('export', $exports);
    }

    public function add(Request $request) {
        $user = $request->post('user');
        $company = $request->post('company');
        $receiver = $request->post('receiver');
        $receiver_address = $request->post('receiver_address');
        $import = $request->post('import');

        $data = [
            'user' => $user,
            'company' => $company,
            'receiver' => $receiver,
            'receiver_address' => $receiver_address,
            'import' => $import
        ];

        Export::add_export($data);

        return redirect()->back();
    }
}
