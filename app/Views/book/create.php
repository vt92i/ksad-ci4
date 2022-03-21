<?=$this->extend('layouts/template')?>
<?=$this->section('content')?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Buku</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah Buku
            </div>
            <div class="card-body">
                <form id="book-form" action="add-book" method="post">

                    <div class="mb-3 row">
                        <label for="book_title" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?=$validation->hasError('book_title') ? 'is-invalid' : ''?>" id="book_title" name="book_title" value="<?=old('book_title')?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('book_title')?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="book_author" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?=$validation->hasError('book_author') ? 'is-invalid' : ''?>" id="book_author" name="book_author" value="<?=old('book_author')?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('book_author')?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="book_category" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-4">
                            <select class="form-control <?=$validation->hasError('book_category') ? 'is-invalid' : ''?>" id="book_category" name="book_category">
                                <option value="0" disabled selected></option>
                                <?php foreach ($categories as $category): ?>
                                <option value="<?=$category['book_category_id']?>" <?=old('book_category') == $category['book_category_id'] ? 'selected' : ''?>><?=$category['book_category_name']?></option>
                                <?php endforeach?>
                            </select>
                            <div class="invalid-feedback">
                                <?=$validation->getError('book_category')?>
                            </div>
                        </div>

                        <label for="book_release_year" class="col-sm-2 col-form-label">Tahun terbit</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?=$validation->hasError('book_release_year') ? 'is-invalid' : ''?>" id="book_release_year" name="book_release_year" value="<?=old('book_release_year')?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('book_release_year')?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="book_price" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?=$validation->hasError('book_price') ? 'is-invalid' : ''?>" id="book_price" name="book_price" value="<?=old('book_price')?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('book_price')?>
                            </div>
                        </div>

                        <label for="book_discount" class="col-sm-2 col-form-label">Diskon</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?=$validation->hasError('book_price') ? 'is-invalid' : ''?>" id="book_discount" name="book_discount" value="<?=old('book_discount')?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('book_discount')?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="book_qty" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?=$validation->hasError('book_qty') ? 'is-invalid' : ''?>" id="book_qty" name="book_qty" value="<?=old('book_qty')?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('book_qty')?>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-danger" type="reset">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?=$this->endSection()?>