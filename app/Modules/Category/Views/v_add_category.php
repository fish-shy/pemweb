<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <div class="container">
        <h1>Add New Category</h1>
        
        <form action="<?= base_url('category/create') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="nama">Category Name</label>
                <input type="text" class="form-control <?= (session('errors.nama')) ? 'is-invalid' : '' ?>" 
                       id="nama" name="nama" value="<?= old('nama') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.nama') ?>
                </div>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?= base_url('category') ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>