<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GalleryModel;
use CodeIgniter\API\ResponseTrait;

class Gallery extends BaseController {
    use ResponseTrait;

    private $galleryModel;
    public function __construct() {
        $this->galleryModel = new GalleryModel();
    }

    public function index() {
        $query = $this->galleryModel->findAll();

        $data = array(
            'gallery' => $query,
        );
        return view('gallery/index', $data);
    }

    public function addGallery() {
        $files = $this->request->getFileMultiple('gallery');
        if (!empty($files)) {
            $upload_path = "images/gallery/";
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            foreach ($files as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $filename = $file->getRandomName();
                    $file->move($upload_path, $filename);

                    $data = [
                        'nama_file' => $filename,
                        'type_file' => $file->getClientMimeType(),
                        'size' => $file->getSize(),
                        'path' => $upload_path . $filename,
                    ];

                    $this->galleryModel->save($data);
                    session()->setFlashdata('success', 'Gallery berhasil ditambahkan');
                } else {
                    session()->setFlashdata('success', 'Gallery gagal ditambahkan');
                }
            }
        }
        return redirect()->to('/gallery');
    }

    public function deleteGallery($filename) {
        $query = $this->galleryModel->where(['nama_file' => $filename])->first();

        if ($this->galleryModel->delete($query['id'])) {
            session()->setFlashdata('success', 'Gallery berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gallery gagal dihapus');
        }

        unlink($query['path']);

        return redirect()->to('/gallery');
    }
}