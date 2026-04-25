<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #9face6);
            font-family: Arial, sans-serif;
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .form-section {
            padding: 40px;
        }

        .image-section {
            background: url('./man.png') no-repeat center;
            background-size: cover;
            min-height: 100%;
        }

        .overlay {
            background: rgba(0,0,0,0.5);
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 8px rgba(106,17,203,0.4);
        }

        .btn-primary {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            border-radius: 25px;
        }

        .btn-primary:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .image-section {
                display: none;
            }
        }
    </style>
</head>

<body>
<?php include 'Header.php'; ?>
<section class="vh-100 d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">

          <div class="row g-0">

            <!-- FORM -->
            <div class="col-lg-6 form-section">
              <h2 class="text-center mb-4">Sign Up</h2>

              <form id="signupForm" method="POST" action="Register.php">
                <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>
                <input type="text" name="surname" class="form-control mb-3" placeholder="Surname" required>
                <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
                <input type="email" name="email" class="form-control mb-3" placeholder="Your Email" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                <input type="password" name="confirm_password" class="form-control mb-3" placeholder="Confirm Password" required>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" name="terms" required>
                  <label class="form-check-label">I agree to terms</label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
                
                <p class="text-center mt-3">
                  Already have an account? 
                  <a href="login.php">Login here</a>
                </p>
              </form>
            </div>

            <!-- IMAGE -->
            <div class="col-lg-6 image-section">
              <div class="overlay">
                <div>   
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'Footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('signupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const name = document.querySelector('input[name="name"]').value.trim();
    const surname = document.querySelector('input[name="surname"]').value.trim();
    const username = document.querySelector('input[name="username"]').value.trim();
    const email = document.querySelector('input[name="email"]').value.trim();
    const password = document.querySelector('input[name="password"]').value.trim();
    const confirmPassword = document.querySelector('input[name="confirm_password"]').value.trim();
    const terms = document.querySelector('input[name="terms"]').checked;
    
    // Check if any field is empty
    if (name === '' || surname === '' || username === '' || email === '' || password === '' || confirmPassword === '') {
        alert('Please fill in all fields!');
        return;
    }
    
    // Email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert('Please enter a valid email address!');
        return;
    }
    
    // Password validation
    if (password.length < 6) {
        alert('Password must be at least 6 characters long!');
        return;
    }
    
    // Password confirmation
    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }
    
    // Terms validation
    if (!terms) {
        alert('You must agree to the terms and conditions!');
        return;
    }
    
    // If all validation passes, submit the form
    this.submit();
});
</script>

</body>
</html>