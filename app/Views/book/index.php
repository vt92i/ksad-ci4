<?=$this->extend('layouts/template')?>
<?=$this->section('content')?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Buku</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Buku
            </div>
            <div class="card-body">
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