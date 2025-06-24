<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .stat-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .chart-container {
            position: relative;
            height: 350px;
            margin-bottom: 20px;
        }
        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
        .dashboard-header {
            background-color: white;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 1.5rem;
            padding: 1rem 0;
        }
        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container-fluid px-4">
        <div class="dashboard-header rounded">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-gray-800 ms-3">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0 me-3">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-primary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-primary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-calendar-alt me-1"></i> Today
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card bg-primary text-white p-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Total Users</h6>
                            <h2 class="mb-0"><?= rand(1000, 9999) ?></h2>
                        </div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div class="mt-3">
                        <span class="text-white-50">
                            <i class="fas fa-arrow-up"></i> <?= rand(5, 20) ?>% increase
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card bg-success text-white p-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Revenue</h6>
                            <h2 class="mb-0">$<?= number_format(rand(10000, 99999)) ?></h2>
                        </div>
                        <i class="fas fa-dollar-sign fa-2x"></i>
                    </div>
                    <div class="mt-3">
                        <span class="text-white-50">
                            <i class="fas fa-arrow-up"></i> <?= rand(10, 30) ?>% increase
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card bg-warning text-white p-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Orders</h6>
                            <h2 class="mb-0"><?= rand(100, 999) ?></h2>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                    <div class="mt-3">
                        <span class="text-white-50">
                            <i class="fas fa-arrow-up"></i> <?= rand(5, 15) ?>% increase
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card bg-danger text-white p-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Tasks</h6>
                            <h2 class="mb-0"><?= rand(10, 50) ?></h2>
                        </div>
                        <i class="fas fa-tasks fa-2x"></i>
                    </div>
                    <div class="mt-3">
                        <span class="text-white-50">
                            <i class="fas fa-arrow-down"></i> <?= rand(5, 15) ?>% decrease
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Monthly Revenue</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="revenueDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="revenueDropdown">
                                <li><a class="dropdown-item" href="#">View Details</a></li>
                                <li><a class="dropdown-item" href="#">Download Report</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">User Growth</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">View Details</a></li>
                                <li><a class="dropdown-item" href="#">Download Report</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="userChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Activities</h5>
                        <button class="btn btn-sm btn-outline-primary">View All</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Activity</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $activities = ['Login', 'Purchase', 'Update profile', 'Comment', 'Post', 'Logout'];
                                    $statuses = ['Completed', 'Pending', 'Failed', 'In Progress'];
                                    $users = ['John Doe', 'Jane Smith', 'Robert Johnson', 'Emily Wilson', 'Michael Brown'];
                                    
                                    for ($i = 0; $i < 5; $i++) {
                                        $user = $users[array_rand($users)];
                                        $activity = $activities[array_rand($activities)];
                                        $time = rand(1, 59) . ' minutes ago';
                                        $status = $statuses[array_rand($statuses)];
                                        $statusClass = '';
                                        
                                        switch ($status) {
                                            case 'Completed': $statusClass = 'success'; break;
                                            case 'Pending': $statusClass = 'warning'; break;
                                            case 'Failed': $statusClass = 'danger'; break;
                                            case 'In Progress': $statusClass = 'info'; break;
                                        }
                                        
                                        echo "<tr>
                                            <td>{$user}</td>
                                            <td>{$activity}</td>
                                            <td>{$time}</td>
                                            <td><span class='badge bg-{$statusClass}'>{$status}</span></td>
                                            <td>
                                                <button class='btn btn-sm btn-outline-secondary'><i class='fas fa-eye'></i></button>
                                            </td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tasks widget -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Upcoming Tasks</h5>
                        <button class="btn btn-sm btn-outline-primary">Add Task</button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            $tasks = [
                                'Complete project proposal',
                                'Meeting with clients',
                                'Update documentation',
                                'Review pull requests',
                                'Deploy new features'
                            ];
                            $priorities = ['High', 'Medium', 'Low'];
                            
                            foreach ($tasks as $index => $task) {
                                $completed = rand(0, 1) == 1;
                                $checkClass = $completed ? 'text-decoration-line-through text-muted' : '';
                                $priority = $priorities[array_rand($priorities)];
                                $priorityClass = '';
                                
                                switch ($priority) {
                                    case 'High': $priorityClass = 'danger'; break;
                                    case 'Medium': $priorityClass = 'warning'; break;
                                    case 'Low': $priorityClass = 'success'; break;
                                }
                                
                                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='checkbox' " . ($completed ? 'checked' : '') . ">
                                        <label class='form-check-label {$checkClass}'>
                                            {$task}
                                        </label>
                                    </div>
                                    <span class='badge bg-{$priorityClass} rounded-pill'>{$priority}</span>
                                </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Revenue chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue',
                    data: [
                        <?= rand(5000, 15000) ?>, 
                        <?= rand(6000, 18000) ?>, 
                        <?= rand(8000, 20000) ?>, 
                        <?= rand(10000, 25000) ?>, 
                        <?= rand(15000, 30000) ?>, 
                        <?= rand(20000, 35000) ?>,
                        <?= rand(18000, 32000) ?>, 
                        <?= rand(22000, 36000) ?>, 
                        <?= rand(25000, 40000) ?>, 
                        <?= rand(30000, 45000) ?>, 
                        <?= rand(35000, 50000) ?>, 
                        <?= rand(40000, 60000) ?>
                    ],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // User growth chart
        const userCtx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(userCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'New Users',
                    data: [
                        <?= rand(100, 500) ?>, 
                        <?= rand(150, 600) ?>, 
                        <?= rand(200, 700) ?>, 
                        <?= rand(250, 800) ?>, 
                        <?= rand(300, 900) ?>, 
                        <?= rand(350, 1000) ?>,
                        <?= rand(300, 950) ?>, 
                        <?= rand(400, 1100) ?>, 
                        <?= rand(450, 1200) ?>, 
                        <?= rand(500, 1300) ?>, 
                        <?= rand(550, 1400) ?>, 
                        <?= rand(600, 1500) ?>
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>