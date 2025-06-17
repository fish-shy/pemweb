<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <div class="container">
        <h1>Add New User</h1>
        
        <form action="<?= base_url('user/create') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" class="form-control <?= (session('errors.nama')) ? 'is-invalid' : '' ?>" 
                       id="nama" name="nama" value="<?= old('nama') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.nama') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control <?= (session('errors.email')) ? 'is-invalid' : '' ?>" 
                       id="email" name="email" value="<?= old('email') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control <?= (session('errors.password')) ? 'is-invalid' : '' ?>" 
                       id="password" name="password">
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control <?= (session('errors.role')) ? 'is-invalid' : '' ?>" 
                        id="role" name="role">
                    <option value="">Select Role</option>
                    <option value="admin" <?= (old('role') == 'admin') ? 'selected' : '' ?>>Admin</option>
                    <option value="user" <?= (old('role') == 'user') ? 'selected' : '' ?>>User</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('errors.role') ?>
                </div>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?= base_url('user') ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>