<?php
require_once 'config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

// Fetch user
$stmt = $connect->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute([':id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: index.php");
    exit;
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    try {
        if (!empty($password)) {
            // Update with new password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET username = :username, password = :password WHERE id = :id";
            $stmt = $connect->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':password' => $hashed_password,
                ':id' => $id
            ]);
        } else {
            // Update only username
            $sql = "UPDATE users SET username = :username WHERE id = :id";
            $stmt = $connect->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':id' => $id
            ]);
        }
        $message = "<div class='alert alert-success'>User updated successfully!</div>";
    } catch(PDOException $e) {
        $message = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .edit-container {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        width: 100%;
        max-width: 400px;
    }
  </style>
</head>
<body>
    <div class="edit-container">
        <h2 class="text-center mb-4">Edit User</h2>
        
        <?php echo $message; ?>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">New Password (leave blank to keep current)</label>
                <input type="password" name="password" class="form-control" placeholder="Enter new password">
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
