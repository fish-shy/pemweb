<div class="container mt-4">
    <h2>User Data</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= base_url('user/add-user') ?>" class="btn btn-primary">Add User</a>
        <div class="input-group" style="max-width: 400px;">
            <input type="text" class="form-control" id="searchInput" placeholder="Cari pengguna...">
            <button class="btn btn-primary" type="button" id="searchButton">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const table = document.getElementById('userTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    function filterTable(searchTerm) {
        searchTerm = searchTerm.toLowerCase();
        
        for (let i = 0; i < rows.length; i++) {
            let found = false;
            const cells = rows[i].getElementsByTagName('td');
            
            if (cells.length === 1 && cells[0].colSpan === 6) {
                continue;
            }
            
            for (let j = 0; j < cells.length; j++) {
                const cellText = cells[j].textContent.toLowerCase();
                if (cellText.includes(searchTerm)) {
                    found = true;
                    break;
                }
            }
            
            rows[i].style.display = found ? '' : 'none';
        }
    }
    
    searchInput.addEventListener('input', function() {
        filterTable(this.value);
    });
    
    searchButton.addEventListener('click', function() {
        filterTable(searchInput.value);
    });
    
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            filterTable(this.value);
        }
    });
});
</script>