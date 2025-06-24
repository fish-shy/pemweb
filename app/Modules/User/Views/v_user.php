<div class="container mt-4">
    <h2>User Data</h2>
    <div class="mb-3">
        <a href="<?= base_url('user/add-user') ?>" class="btn btn-primary">Add User</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="userTable">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php if (isset($getData) && !empty($getData)) {
                    $i = 1;
                    foreach ($getData as $row) { ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->email ?></td>
                            <td><?= $row->role ?></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($row->created_at)) ?></td>
                            <td>
                                <div class="d-flex justify-content-start gap-2">
                                    <a href="<?= site_url('user/edit/' . $row->id) ?>" class="btn btn-outline-info">
                                        Edit
                                    </a>
                                    <a href="<?= site_url('user/delete/' . $row->id) ?>" class="btn btn-outline-danger">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">There's no data at the moment</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>