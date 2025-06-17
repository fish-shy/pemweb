<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Data Pengguna</h2>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <div class="input-group me-2">
                    <input type="text" class="form-control" id="searchInput" placeholder="Cari pengguna...">
                    <button class="btn btn-primary" type="button">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
                <a href="<?= base_url('user/add-user') ?>" class="btn btn-primary">Tambah</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="userTable">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tanggal Dibuat</th>
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
                            <td><?= $row->email?></td>
                            <td><?= $row->role ?></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($row->created_at)) ?></td>
                            <td>
                                <div class="d-flex flex justify-content-start gap-2">
                                    <a href="<?php echo site_url('user/edit/' . $row->id) ?>" class="btn btn-outline-info p-1 rounded-2" style="min-width: 34.67px;">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="<?php echo site_url('user/delete/' . $row->id) ?>" class="btn btn-outline-danger p-1 rounded-2" style="min-width: 34.67px;">
                                        <i class="bi bi-trash"></i>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const table = document.getElementById('userTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;

                    if (cellText.toLowerCase().indexOf(searchValue) > -1) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });

    function editUser(id) {
        // Implement edit user functionality
        console.log('Edit user with ID: ' + id);
    }

    function deleteUser(id) {
        // Implement delete user functionality
        if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
            console.log('Delete user with ID: ' + id);
        }
    }
</script>