<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.0
* Author: Alexis Luna
* Copyright 2020 Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Roles | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
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
                        <h3>User Roles
                            <a href="roles.html" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-plus-circle"></i> Add</a>
                            <a href="users.html" class="btn btn-sm btn-outline-info float-right mr-1"><i class="fas fa-angle-left"></i> <span class="btn-header">Return</span></a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Administrator</td>
                                        <td>Active</td>
                                        <td class="text-right">
                                            <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                            <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Manager</td>
                                        <td>Active</td>
                                        <td class="text-right">
                                            <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                            <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Writer</td>
                                        <td>Active</td>
                                        <td class="text-right">
                                            <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                            <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Editor</td>
                                        <td>Disabled</td>
                                        <td class="text-right">
                                            <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                            <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Audit</td>
                                        <td>Active</td>
                                        <td class="text-right">
                                            <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                            <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contributor</td>
                                        <td>Active</td>
                                        <td class="text-right">
                                            <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                            <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Author</td>
                                        <td>Active</td>
                                        <td class="text-right">
                                            <a href="permissions.html" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i></a>
                                            <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>