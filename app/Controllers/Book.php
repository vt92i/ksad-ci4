<?php

namespace App\Controllers;

use App\Models\BookCategoryModel;
use App\Models\BookModel;
use CodeIgniter\API\ResponseTrait;

class Book extends BaseController {
    use ResponseTrait;

    private $bookModel, $categoryModel;
    public function __construct() {
        $this->bookModel = new BookModel();
        $this->categoryModel = new BookCategoryModel();
    }

    public function index() {
        $query = $this->bookModel->getAllBooks();

        $data = array(
            'books' => $query,
        );
        return view('book/index', $data);

    }

    public function bookDetails($slug) {
        $query = $this->bookModel->getBookDetails($slug);

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

    public function addBook() {
        session();
        if ($this->request->getMethod() == 'get') {
            $data = array(
                'categories' => $this->categoryModel->orderBy('book_category_name')->findAll(),
                'validation' => \Config\Services::validation(),
            );
            return view('book/create', $data);
        }

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate([
                'book_title' => 'required|is_unique[book.title]',
                'book_author' => 'required',
                'book_release_year' => 'required|numeric',
                'book_price' => 'required|numeric',
                'book_discount' => 'required|numeric',
                'book_qty' => 'required|numeric',
                'book_category' => 'required|numeric',
            ])) {
                return redirect()->to('/add-book')->withInput();
            }

            $data = array(
                'title' => $this->request->getVar('book_title'),
                'slug' => url_title($this->request->getVar('book_title'), '-', true),
                'author' => $this->request->getVar('book_author'),
                'release_year' => $this->request->getVar('book_release_year'),
                'price' => $this->request->getVar('book_price'),
                'discount' => $this->request->getVar('book_discount'),
                'stock' => $this->request->getVar('book_qty'),
                'book_category_id' => $this->request->getVar('book_category'),
            );

            if ($this->bookModel->save($data)) {
                session()->setFlashdata('success', 'Buku berhasil ditambahkan');
            } else {
                session()->setFlashdata('error', 'Buku gagal ditambahkan');
            }

            return redirect()->to('/books');
        }

    }

}