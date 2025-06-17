<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Data Kategori</h2>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <a href="<?= base_url('category/add-category') ?>" class="btn btn-primary">Tambah Kategori</a>
                </div>
            </div>
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
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $row->nama ?></td>
                                <td>
                                    <div class="d-flex justify-content-start gap-2">
                                        <a href="<?php echo site_url('category/edit/' . $row->id) ?>" class="btn btn-outline-info p-1 rounded-2">
                                            Edit
                                        </a>
                                        <a href="<?php echo site_url('category/delete/' . $row->id) ?>" class="btn btn-outline-danger p-1 rounded-2">
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted">Tidak ada data saat ini</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>