<?=$this->extend('layouts/template')?>
<?=$this->section('content')?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Gallery</h1>

        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?=session()->getFlashdata('success')?>
        </div>
        <?php endif;?>

        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error" role="alert">
            <?=session()->getFlashdata('error')?>
        </div>
        <?php endif;?>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Gallery
            </div>
            <div class="card-body">
                <form action="gallery" method="post" enctype="multipart/form-data">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="gallery">Upload Gallery</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="file" name="gallery[]" id="gallery" multiple="true" accept="image/*">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </div>
                    </div>

                </form>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gallery</th>
                            <th>Nama File</th>
                            <th>Tipe</th>
                            <th>Size</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Gallery</th>
                            <th>Nama File</th>
                            <th>Tipe</th>
                            <th>Size</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $n = 1;foreach ($gallery as $book): ?>
                        <tr>
                            <td><?=$n++;?></td>
                            <td><img src="<?=$book['path']?>" alt="Book" width="100"></td>
                            <td><?=$book['nama_file']?></td>
                            <td><?=$book['type_file']?></td>
                            <td><?=$book['size']?></td>
                            <td>
                                <a class="btn btn-danger" href="delete-gallery/<?=$book['nama_file']?>" onclick="return confirm('Are you sure you want to delete this gallery?')">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?=$this->endSection()?>