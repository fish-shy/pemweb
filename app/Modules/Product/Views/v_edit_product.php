<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>

        <form action="<?= base_url('product/update/' . $id) ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" class="form-control <?= (session('errors.nama')) ? 'is-invalid' : '' ?>" 
                       id="nama" name="nama" value="<?= old('nama   ', $getData->nama) ?>">
                <div class="invalid-feedback">
                    <?= session('errors.nama') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="deskripsi">deskripsi</label>
                <textarea class="form-control <?= (session('errors.deskripsi')) ? 'is-invalid' : '' ?>" 
                          id="deskripsi" name="deskripsi"><?= old('deskripsi', $getData->deskripsi) ?></textarea>
                <div class="invalid-feedback">
                    <?= session('errors.deskripsi') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="harga">harga</label>
                <input type="number" class="form-control <?= (session('errors.harga')) ? 'is-invalid' : '' ?>" 
                       id="harga" name="harga" value="<?= old('harga', $getData->harga) ?>">
                <div class="invalid-feedback">
                    <?= session('errors.harga') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="category">Kategori</label>
                <select class="form-control <?= (session('errors.category')) ? 'is-invalid' : '' ?>" 
                        id="category" name="category">
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->id ?>" <?= (old('category', $getData->category_id) == $category->id) ? 'selected' : '' ?>><?= $category->name ?></option>
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