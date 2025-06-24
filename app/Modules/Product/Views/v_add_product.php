<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <div class="container">
        <h1>Add New Product</h1>
        
        <form action="<?= base_url('product/create') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control <?= (session('errors.nama')) ? 'is-invalid' : '' ?>" 
                       id="nama" name="nama" value="<?= old('nama') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.nama') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control <?= (session('errors.deskripsi')) ? 'is-invalid' : '' ?>" 
                          id="deskripsi" name="deskripsi"><?= old('deskripsi') ?></textarea>
                <div class="invalid-feedback">
                    <?= session('errors.deskripsi') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control <?= (session('errors.harga')) ? 'is-invalid' : '' ?>" 
                       id="harga" name="harga" value="<?= old('harga') ?>" step="0.01">
                <div class="invalid-feedback">
                    <?= session('errors.harga') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control <?= (session('errors.category')) ? 'is-invalid' : '' ?>" 
                        id="category" name="category_id">
                    <option value="">Select Category</option>
                    <option value="0">None</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->id ?>" <?= (old('category_id') == $category->id) ? 'selected' : '' ?>><?= $category->nama ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= session('errors.category') ?>
                </div>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?= base_url('product') ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>