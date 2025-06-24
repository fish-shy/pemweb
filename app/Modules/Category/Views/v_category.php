<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
</head>

<body>
    <div class="container mt-4 ">
        <h2>Data Kategori</h2>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <?php if (session()->get('role') === 'admin') : ?>
            <div class="mb-3">
                <a href="<?= base_url('category/add-category') ?>" class="btn btn-primary">Add Category</a>
            </div>
            <?php endif; ?>
            <div class="input-group" style="max-width: 400px;">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari kategori...">
                <button class="btn btn-primary" type="button" id="searchButton">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="categoryTable">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <?php if (session()->get('role') === 'admin') : ?>
                        <th>Aksi</th>
                        <?php endif; ?>
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
                     
                                <?php if (session()->get('role') === 'admin') : ?>
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
                                <?php endif; ?>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const table = document.getElementById('categoryTable');
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