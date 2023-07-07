<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>
  <body class="text-center">
      <form class="form-signin" action="includes/login.inc.php" method="POST">
            <img class="mb-3" src="nlms.png" alt="" width="90" height="90">
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <label for="inputStaffID" class="sr-only">Staff ID</label>
            <input type="text" id="inputStaffID" name="staffid" class="form-control" placeholder="Staff ID" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            </div>
            <button class="btn btn-lg btn-custom btn-block" type="submit" name="login-submit">Login</button>
        </form>
</body>
</html>
