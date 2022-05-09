<?=$this->extend('layouts/template')?>
<?=$this->section('content')?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Supplier</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Supplier
            </div>
            <div class="card-body">
                <form id="supplier-form" action="#" method="post">

                    <div class="mb-3 row">
                        <label for="supplier_name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="<?=old('supplier_name', $supplier->name)?>">
                            <div class="invalid-feedback">
                                <!-- Validation error message -->
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="supplier_address" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="supplier_address" name="supplier_address" value="<?=old('supplier_address', $supplier->address)?>">
                            <div class="invalid-feedback">
                                <!-- Validation error message -->
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="supplier_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="supplier_email" name="supplier_email" value="<?=old('supplier_email', $supplier->email)?>">
                            <div class="invalid-feedback">
                                <!-- Validation error message -->
                            </div>
                        </div>

                        <label for="supplier_telepon" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="supplier_telepon" name="supplier_telepon" value="<?=old('supplier_telepon', $supplier->phone)?>">
                            <div class="invalid-feedback">
                                <!-- Validation error message -->
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