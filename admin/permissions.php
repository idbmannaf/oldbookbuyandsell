<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Permissions | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
    <?php require("partial/sidebar.php") ?>
        <div id="body" class="active">
 <!-- Navbar start -->
 <?php require ("partial/navbar.php") ?>
            <!-- Navbar End -->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>User Permissions
                            <a href="roles.html" class="btn btn-sm btn-outline-info float-right"><i class="fas fa-angle-left"></i> <span class="btn-header">Return</span></a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <form accept-charset="utf-8">
                                <div class="form-group">
                                    <label for="email" class="text-uppercase"><small>Dashboard</small></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch1">
                                        <label class="custom-control-label" for="switch1">Open dashboard page</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-uppercase"><small>Users</small></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch2">
                                        <label class="custom-control-label" for="switch2">Add User</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch3">
                                        <label class="custom-control-label" for="switch3">Edit User</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch4">
                                        <label class="custom-control-label" for="switch4">Delete User</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-uppercase"><small>Roles & Permissions</small></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch5">
                                        <label class="custom-control-label" for="switch5">Add Roles</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch6">
                                        <label class="custom-control-label" for="switch6">Edit Roles</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch7">
                                        <label class="custom-control-label" for="switch7">Delete Roles</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch8">
                                        <label class="custom-control-label" for="switch8">Update Permissions</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save</button>
                            <a href="roles.html" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>