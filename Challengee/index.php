<?php
require_once 'config.php';

// Fetch all users
$stmt = $connect->query("SELECT * FROM users ORDER BY id DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            padding-top: 50px;
        }
        .table-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .btn-edit {
            background: #ffc107;
            color: black;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Registered Users</h2>
                <a href="Signin.php" class="btn btn-success">+ Add New User</a>
            </div>
            
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo $user['created_at'] ?? 'N/A'; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-edit">Edit</a>
                            <a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-delete" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <?php if (empty($users)): ?>
                <div class="alert alert-info text-center">No users found. <a href="Signin.php">Register a user</a></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
