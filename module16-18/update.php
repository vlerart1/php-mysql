<?php
include_once('config.php');

session_start();

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $connect->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    
    try {
        $update_sql = "UPDATE users SET name = :name, surname = :surname, email = :email, username = :username WHERE id = :id";
        $update_stmt = $connect->prepare($update_sql);
        $update_stmt->bindParam(':name', $name);
        $update_stmt->bindParam(':surname', $surname);
        $update_stmt->bindParam(':email', $email);
        $update_stmt->bindParam(':username', $username);
        $update_stmt->bindParam(':id', $id);
        
        $result = $update_stmt->execute();
        
        if($result && $update_stmt->rowCount() > 0) {
            $success_message = "User updated successfully!";
            
            if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $id) {
                $_SESSION['user_name'] = $name;
                $_SESSION['user_surname'] = $surname;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_username'] = $username;
                $success_message .= " Your profile has been updated!";
            }
        } elseif($result && $update_stmt->rowCount() == 0) {
            $success_message = "No changes made - values are the same.";
        } else {
            $error_message = "Update failed.";
        }
        
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        $error_message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn-cancel {
            background: #6c757d;
        }
        .success-message {
            color: green;
            background: #d4edda;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .error-message {
            color: red;
            background: #f8d7da;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        
        <?php if(isset($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        
        <?php if(isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <?php if($user): ?>
            <form method="POST" action="update.php?id=<?php echo $id; ?>">
                <div class="form-group">
                    <label for="name">First Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="surname">Last Name:</label>
                    <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($user['surname']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                
                <button type="submit" name="update" class="btn">Update User</button>
                <a href="dashboard.php" class="btn btn-cancel">Cancel</a>
                <a href="dashboard.php" class="btn">Back to Dashboard</a>
            </form>
        <?php else: ?>
            <div class="error-message">User not found!</div>
            <a href="dashboard.php" class="btn btn-cancel">Back to Dashboard</a>
        <?php endif; ?>
    </div>
</body>
</html>
