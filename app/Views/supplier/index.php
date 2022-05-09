<?=$this->extend('layouts/template')?>
<?=$this->section('content')?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Supplier</h1>

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
                Data Supplier
            </div>
            <div class="card-body">
                <a class="btn btn-primary mb-3" href="/add-supplier">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Supplier
                </a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $n = 1;foreach ($suppliers as $supplier): ?>
                        <tr>
                            <td><?=$n++;?></td>
                            <td><?=$supplier->name?></td>
                            <td><?=$supplier->address?></td>
                            <td><?=$supplier->email?></td>
                            <td><?=$supplier->phone?></td>
                            <td>
                                <a class="btn btn-warning" href="edit-supplier/<?=$supplier->supplier_id?>">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="delete-supplier/<?=$supplier->supplier_id?>" onclick="return confirm('Are you sure you want to delete this supplier?')">
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