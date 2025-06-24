
<body>
    <div class="container">
        <h1>User Profile</h1>
        
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Personal Information</h5>
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $getData->nama ?></p>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $getData->email ?></p>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= ucfirst($getData->role) ?></p>
                    </div>
                </div>
                
                <div class="mt-3">
                    <a href="<?= base_url('user/edit/' . session()->get('id')) ?>" class="btn btn-primary">Edit Profile</a>
                    <a href="<?= base_url('user') ?>" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>