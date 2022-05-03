<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model {
    protected $table = 'book';
    protected $primaryKey = 'book_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'author', 'release_year', 'price', 'discount', 'stock', 'book_category_id', 'cover'];
    protected $useSoftDeletes = true;

    public function getAllBooks() {
        $this->table('book')->join('book_category', 'book.book_category_id = book_category.book_category_id')->where(['deleted_at' => null]);
        return $this->get()->getResultArray();
    }

    public function getBookDetails($slug) {
        $this->table('book')->join('book_category', 'book.book_category_id = book_category.book_category_id');
        $this->where(['slug' => $slug]);
        return $this->first();
    }
}