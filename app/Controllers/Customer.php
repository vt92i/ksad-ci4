<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;
use App\Models\CustomerModel;

class Customer extends BaseController {
    public function index() {
        $customerModel = new CustomerModel();

        $crud = new GroceryCrud();
        $crud->setTable('customers');

        $crud->unsetExport()->unsetPrint();
        $crud->unsetFields(['created_at', 'updated_at']);
        $crud->unsetColumns(['created_at', 'updated_at']);

        $crud->requiredFields([
            'name',
            'no_customer',
            'gender',
            'address',
            'email',
            'phone',
        ]);

        $crud->displayAs([
            'name' => 'Nama Customer',
            'no_customer' => 'Nomor Customer',
            'gender' => 'Gender',
            'address' => 'Alamat',
            'email' => 'Email',
            'phone' => 'Nomor Telepon',
        ]);

        $crud->callbackInsert(function ($stateParameters) use ($customerModel) {
            $customerModel->save($stateParameters->data);
            return $stateParameters;
        });

        $crud->callbackUpdate(function ($stateParameters) use ($customerModel) {
            $customerModel->update($stateParameters->primaryKeyValue, $stateParameters->data);
            return $stateParameters;
        });

        $output = $crud->render();

        return view('customer/index', (array) $output);
    }
}