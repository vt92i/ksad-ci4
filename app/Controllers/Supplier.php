<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\SupplierEntity;
use App\Models\SupplierModel;
use CodeIgniter\API\ResponseTrait;

class Supplier extends BaseController {
    use ResponseTrait;

    private $supplierModel;
    public function __construct() {
        $this->supplierModel = new SupplierModel();
    }

    public function index() {
        $query = $this->supplierModel->findAll();
        $data = array(
            'suppliers' => $query,
        );
        return view('supplier/index', $data);
    }

    public function addSupplier() {
        session();
        if ($this->request->getMethod() == 'get') {
            return view('supplier/create');
        }

        if ($this->request->getMethod() == 'post') {
            $supplier = new SupplierEntity();

            $supplier->name = $this->request->getVar('supplier_name');
            $supplier->address = $this->request->getVar('supplier_address');
            $supplier->email = $this->request->getVar('supplier_email');
            $supplier->phone = $this->request->getVar('supplier_telepon');

            if ($this->supplierModel->save($supplier)) {
                session()->setFlashdata('success', 'Supplier berhasil ditambahkan');
            } else {
                session()->setFlashdata('error', 'Supplier gagal ditambahkan');
            }

            return redirect()->to('/suppliers');
        }
    }

    public function editSupplier($id) {
        session();
        if ($this->request->getMethod() == 'get') {
            $query = $this->supplierModel->where(['supplier_id' => $id])->first();
            $data = array(
                'supplier' => $query,
            );

            return view('supplier/edit', $data);
        }

        if ($this->request->getMethod() == 'post') {
            $supplier = new SupplierEntity();

            $supplier->supplier_id = $id;
            $supplier->name = $this->request->getVar('supplier_name');
            $supplier->address = $this->request->getVar('supplier_address');
            $supplier->email = $this->request->getVar('supplier_email');
            $supplier->phone = $this->request->getVar('supplier_telepon');

            if ($this->supplierModel->save($supplier)) {
                session()->setFlashdata('success', 'Supplier berhasil diedit');
            } else {
                session()->setFlashdata('error', 'Supplier gagal diedit');
            }

            return redirect()->to('/suppliers');
        }
    }

    public function deleteSupplier($id) {
        if ($this->supplierModel->delete($id)) {
            session()->setFlashdata('success', 'Supplier berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Supplier gagal dihapus');
        }

        return redirect()->to('/suppliers');
    }
}