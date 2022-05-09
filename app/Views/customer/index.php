<?=$this->extend('layouts/template')?>
<?=$this->section('content')?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Customer</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Customer
            </div>
            <div class="card-body">

                <!DOCTYPE html>
                <html>

                <head>
                    <meta charset="utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <?php foreach ($css_files as $file): ?>
                    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                    <?php endforeach;?>
                </head>

                <body>
                    <div style='height:20px;'></div>
                    <div style="padding: 10px">
                        <?php echo $output; ?>
                    </div>
                    <?php foreach ($js_files as $file): ?>
                    <script src="<?php echo $file; ?>"></script>
                    <?php endforeach;?>
                </body>

                </html>

            </div>
        </div>
    </div>
</main>

<?=$this->endSection()?>