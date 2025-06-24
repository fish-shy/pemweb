<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
</head>

<body>
    <div class="container mt-4">
        <h2>Data Kategori</h2>
        <div class="mb-3">
            <a href="<?= base_url('category/add-category') ?>" class="btn btn-primary">Add Category</a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="categoryTable">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($getData) && !empty($getData)) {
                        $i = 1;
                        foreach ($getData as $row) { ?>
                            <tr><wbr></wbr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $row->nama ?></td>
                                <td>
                                    <div class="d-flex justify-content-start gap-2">
                                        <a href="<?= site_url('category/edit/' . $row->id) ?>" class="btn btn-outline-info">
                                            Edit
                                        </a>
                                        <a href="<?= site_url('category/delete/' . $row->id) ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                            Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted">There's no data at the moment</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>