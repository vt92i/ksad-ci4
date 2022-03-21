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
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0 p-3">
                        <div class="col p-3">
                            <img src="https://images-na.ssl-images-amazon.com/images/I/81e5aV0DCUL.jpg" class="img-fluid rounded-start" alt="Book">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h2 class="card-title"><?=$book['title']?></h2>
                                <p class="card-text">Penulis: <?=$book['author']?></p>
                                <p class="card-text">Tahun Terbit: <?=$book['release_year']?></p>
                                <p class="card-text">Harga: <?=$book['price']?> IDR</p>
                                <p class="card-text">Stock: <?=$book['stock']?></p>
                                <p class="card-text">Diskon: <?=$book['discount']?></p>
                                <p class="card-text">Kategori: <?=$book['book_category_name']?></p>
                                <a class="btn btn-dark w-100" href="/books">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?=$this->endSection()?>