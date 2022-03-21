<?=$this->extend('layouts/template')?>
<?=$this->section('content')?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Buku</h1>

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
                Data Buku
            </div>
            <div class="card-body">
                <a class="btn btn-primary mb-3" href="/add-book">
                    <i class="fas fa-plus-circle"></i>
                    Tambah buku
                </a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $n = 1;foreach ($books as $book): ?>
                        <tr>
                            <td><?=$n++;?></td>
                            <td><?=$book['title']?></td>
                            <td><?=$book['book_category_name']?></td>
                            <td><?=$book['price']?></td>
                            <td><?=$book['stock']?></td>
                            <td>
                                <a class="btn btn-info" href="book-details/<?=$book['slug']?>">
                                    <i class="fas fa-info-circle"></i>
                                    Details
                                </a>
                                <a class="btn btn-warning" href="edit-book/<?=$book['slug']?>">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="delete-book/<?=$book['slug']?>">
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