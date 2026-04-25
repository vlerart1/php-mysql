<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

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
<section class="vh-100 d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">

          <div class="row g-0">

            <!-- FORM -->
            <div class="col-lg-6 form-section">
              <h2 class="text-center mb-4">Sign Up</h2>

              <form>
                <input type="text" class="form-control mb-3" placeholder="Name">
                <input type="text" class="form-control mb-3" placeholder="Surname">
                <input type="text" class="form-control mb-3" placeholder="username">
                <input type="email" class="form-control mb-3" placeholder="Your Email">
                <input type="password" class="form-control mb-3" placeholder="Password">
                <input type="password" class="form-control mb-3" placeholder="confirm Password">

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label">I agree to terms</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>