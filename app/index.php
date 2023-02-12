<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="assets/img/5396967_shuttle-mkk-shuttle-bus-transparent-png-removebg-preview.png"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="auth.php" method="post">
            
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="login" class="form-control form-control-lg" required />
            <label class="form-label" for="form1Example13">Login</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password"  name="password" class="form-control form-control-lg" required />
            <label class="form-label" for="form1Example23">Password</label>
          </div>

         

          <!-- Submit button -->
          <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Connectez-vous</button>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>