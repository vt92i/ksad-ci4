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
                'book_release_year' => 'required|numeric|greater_than_equal_to[1]',
                'book_price' => 'required|numeric|greater_than_equal_to[1]',
                'book_discount' => 'numeric|greater_than_equal_to[0]|permit_empty',
                'book_qty' => 'required|numeric|greater_than_equal_to[1]',
                'book_category' => 'required|numeric',
                'book_cover' => 'max_size[book_cover,1024]|is_image[book_cover]|mime_in[book_cover,image/jpeg,image/png]',
            ])) {
                return redirect()->to('/add-book')->withInput();
            }

            $book_cover = $this->request->getFile('book_cover');

            if ($book_cover->getError() === 4) {
                $filename = 'default.png';
            } else {
                $filename = $book_cover->getRandomName();
                $book_cover->move('images', $filename);
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
                'cover' => $filename,
            );

            if ($this->bookModel->save($data)) {
                session()->setFlashdata('success', 'Buku berhasil ditambahkan');
            } else {
                session()->setFlashdata('error', 'Buku gagal ditambahkan');
            }

            return redirect()->to('/books');
        }

    }

    public function editBook($slug) {
        session();
        $query = $this->bookModel->getBookDetails($slug);

        if ($this->request->getMethod() == 'get') {
            $data = array(
                'book' => $query,
                'categories' => $this->categoryModel->orderBy('book_category_name')->findAll(),
                'validation' => \Config\Services::validation(),
            );
            return view('book/edit', $data);
        }

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate([
                'book_title' => 'required',
                'book_author' => 'required',
                'book_release_year' => 'required|numeric|greater_than_equal_to[1]',
                'book_price' => 'required|numeric|greater_than_equal_to[1]',
                'book_discount' => 'numeric|greater_than_equal_to[0]|permit_empty',
                'book_qty' => 'required|numeric|greater_than_equal_to[1]',
                'book_category' => 'required|numeric',
                'book_cover' => 'max_size[book_cover,1024]|is_image[book_cover]|mime_in[book_cover,image/jpeg,image/png]',
            ])) {
                return redirect()->to('/edit-book/' . $slug)->withInput();
            }

            $book_cover = $this->request->getFile('book_cover');

            if ($book_cover->getError() === 4) {
                $filename = 'default.png';
            } else {
                $filename = $book_cover->getRandomName();
                $book_cover->move('images', $filename);

                $old_book_cover = $query['cover'];

                if ($old_book_cover != 'default.png') {
                    unlink('images/' . $old_book_cover);
                }
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
                'cover' => $filename,
            );

            if ($this->bookModel->update($query['book_id'], $data)) {
                session()->setFlashdata('success', 'Buku berhasil diedit');
            } else {
                session()->setFlashdata('error', 'Buku gagal diedit');
            }

            return redirect()->to('/books');
        }

    }

    public function deleteBook($id) {
        $query = $this->bookModel->where(['book_id' => $id])->first();
        $old_book_cover = $query['cover'];

        if ($this->bookModel->delete($id)) {
            session()->setFlashdata('success', 'Buku berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Buku gagal dihapus');
        }

        if ($old_book_cover != 'default.png') {
            unlink('images/' . $old_book_cover);
        }

        return redirect()->to('/books');
    }

}