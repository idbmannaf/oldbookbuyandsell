<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign up | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="assets/img/bootstraper-logo.png" alt="bootstraper logo">
                    </div>
                    <h6 class="mb-4 text-muted">Create new account</h6>
                    <form action="" method="">
                        <div class="form-group text-left">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group text-left">
                            <label for="email">Email adress</label>
                            <input type="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group text-left">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <!-- 
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm password" required>
                        </div> 
                        -->
                        <div class="form-group text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="confirm" class="custom-control-input" id="confirm-me">
                                <label class="custom-control-label" for="confirm-me">I agree to the <a href="#" tabindex="-1">terms and policy</a>.</label>
                            </div>
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4">Register</button>
                    </form>
                    <p class="mb-0 text-muted">Allready have an account? <a href="login.html">Log in</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>