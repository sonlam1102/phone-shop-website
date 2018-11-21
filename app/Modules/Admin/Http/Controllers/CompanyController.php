<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Model\Company;
use App\Model\Manager;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends AdminController
{
    public function index()
    {
        $company = Company::all();
        $data = $this->getUserInfo();

        return view('admin::company/company')
            ->with('company', $company)
            ->with('data', $data);
    }

    public function add(Request $request) {
        $name = $request->post('name_company');
        $address = $request->post('address_company');
        $city = $request->post('city');
        $manager = $request->post('manager');

        $data = [
            'name' => $name,
            'address' => $address,
            'city' => $city
        ];

        $company_id = Company::addCompany($data);
        Manager::addManger($manager, $company_id);

        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $name = $request->post('name_company');
        $address = $request->post('address_company');
        $city = $request->post('city');
        $manager = $request->post('manager');

        $data = [
            'name' => $name,
            'address' => $address,
            'city' => $city
        ];

        $company = Company::find($id);
        $company->updateCompany($data);

        if (User::find($manager)->manager) {
            User::find($manager)->manager->updateManager($company->id);
        }
        else {
            Manager::addManger($manager, $company->id);
        }

        return redirect()->back();
    }
}
