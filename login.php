<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM Perpus</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-image: url('image/login.webp');
        }

    </style>
</head>
<body>
<div class="container">
<div class="row justify-content-center mt-5">
    <div class="col-sm-10 col-md-8 col-lg-6 card px-5 py-5 bg-light">
        <h2 class="font-weight-bold">Login</h2>
        <form method="POST" action="cek-login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Masukkan username" name="username" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        </form>
    </div>
</div>
</div>
</body>
</html>