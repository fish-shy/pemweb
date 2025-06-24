
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Dashboard</h1>
        
        <div class="row mb-4 justify-content-center">
            <?php if (session()->get('role') === 'admin') : ?>
            <div class="col-md-4 mb-3">
                <div class="card border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-people"></i> Users</h5>
                        <p class="card-text">Manage users, roles and permissions</p>
                        <a href="<?= base_url('user') ?>" class="btn btn-primary">
                            <i class="bi bi-arrow-right-circle"></i> Go to Users
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="col-md-4 mb-3">
                <div class="card border-success h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-box"></i> Products</h5>
                        <p class="card-text">Manage your product inventory</p>
                        <a href="<?= base_url('product') ?>" class="btn btn-success">
                            <i class="bi bi-arrow-right-circle"></i> Go to Products
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card border-info h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-tag"></i> Categories</h5>
                        <p class="card-text">Manage product categories</p>
                        <a href="<?= base_url('category') ?>" class="btn btn-info">
                            <i class="bi bi-arrow-right-circle"></i> Go to Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Activity</th>
                                        <th>Module</th>
                                        <th>User</th>
                                        <th>Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($recentActivities) && !empty($recentActivities)) { 
                                        foreach ($recentActivities as $activity) { ?>
                                            <tr>
                                                <td><?= $activity->description ?></td>
                                                <td><?= $activity->module ?></td>
                                                <td><?= $activity->user ?></td>
                                                <td><?= date('d-m-Y H:i:s', strtotime($activity->created_at)) ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">No recent activities</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
