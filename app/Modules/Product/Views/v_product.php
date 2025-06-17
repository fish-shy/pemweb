<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Product List</h2>
        <div class="mb-3">
            <a href="<?= base_url('product/add-product') ?>" class="btn btn-primary">Add Product</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="productTable">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>deskripsi</th>
                        <th>Harga</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($getData) && !empty($getData)) {
                        $i = 1;
                        foreach ($getData as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $row->nama ?></td>
                                <td><?= $row->deskripsi ?></td>
                                <td><?= number_format($row->harga, 2) ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($row->created_at)) ?></td>
                                <td>
                                    <div class="d-flex justify-content-start gap-2">
                                        <a href="<?= site_url('product/edit/' . $row->id) ?>" class="btn btn-outline-info">
                                            Edit
                                        </a>
                                        <a href="<?= site_url('product/delete/' . $row->id) ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                                            Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">No products available</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>