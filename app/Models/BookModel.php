<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model {
    protected $table = 'book';
    protected $primaryKey = 'book_id';
    // protected $allowedFields = ['judul_buku', 'tahun_terbit', 'penerbit', 'penulis', 'id_kategori', 'isdeleted', 'jumlah'];

    public function getAllBooks() {
        $this->table('book')->join('book_category', 'book.book_category_id = book_category.book_category_id');
        return $this->get()->getResultArray();
    }

    public function getBookDetails($slug) {
        $this->table('book')->join('book_category', 'book.book_category_id = book_category.book_category_id');
        $this->where(['slug' => $slug]);
        return $this->first();
    }
}