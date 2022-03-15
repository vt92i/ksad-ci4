<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\API\ResponseTrait;

class Book extends BaseController {
    use ResponseTrait;

    public function index() {
        $model = new BookModel();
        $query = $model->getAllBooks();

        $data = array(
            'books' => $query,
        );
        return view('book/index', $data);

    }

    public function bookDetails($slug) {
        $model = new BookModel();
        $query = $model->getBookDetails($slug);

        if ($query) {
            $data = array(
                'book' => $query,
            );
            return view('book/details', $data);
        } else {
            $data = array(
                'status' => 'error',
            );
            return $this->respond($data, 200);
        }
    }

}