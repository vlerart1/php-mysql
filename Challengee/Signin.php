<?php
require_once 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $connect->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $hashed_password
        ]);
        $message = "<div class='alert alert-success'>User registered successfully!</div>";
    } catch(PDOException $e) {
        $message = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>

  <!-- Bootstrap CSS (MDB style depends on Bootstrap) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .gradient-custom-2 {
      /* fallback */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* Modern browsers */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">

            <!-- Left side -->
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                </div>

                <?php echo $message; ?>

                <form method="POST" action="">
                  <p>Please provide these</p>

                  <div class="mb-4">
                    <input type="text" name="username" class="form-control"
                           placeholder="username" required>
                    <label class="form-label">Username</label>
                  </div>

                  <div class="mb-4">
                    <input type="password" name="password" class="form-control" required>
                    <label class="form-label">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary w-100 mb-3" type="submit">Sign up</button>
                  </div>

                  

                </form>

              </div>
            </div>

            <!-- Right side -->
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>