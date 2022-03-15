<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Home extends BaseController {
    use ResponseTrait;

    public function index() {
        // $model = new BookModel();
        // $query = $model->getAllBooks();

        // $data = array(
        //     'books' => $query,
        // );

        // return $this->respond($data, 200);
        return view('home');
    }
}