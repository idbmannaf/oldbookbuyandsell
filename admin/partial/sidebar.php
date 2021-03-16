 <!-- menu start -->
 <?php

    use App\classes\Session;
    ?>
         <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="assets/img/logo.png" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#authmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-book-open"></i></i>Books</a>
                    <ul class="collapse list-unstyled" id="authmenu1">
                        <li>
                            <a href="publicbooks.php"><i class="fas fa-lock-open"></i> Public Books</a>
                        </li>
                        <li>
                            <a href="privatebooks.php"><i class="fas fa-lock"></i> Private Books</a>
                        </li>
                        <li>
                            <a href="deletedbook.php"><i class="fas fa-trash"></i> Deleted Books</a>
                        </li>
                        <li>
                            <a href="soldbook.php"><i class="fas fa-gavel"></i> Sold Books</a>
                        </li>
                        <li>
                            <a href="addbooks.php"><i class="fas fa-plus"></i> Add book</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#categories" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-tags"></i>Categories</a>
                    <ul class="collapse list-unstyled" id="categories">
                    
                        <li>
                            <a href="addcategories.php"><i class="fas fa-plus"></i> Add Categories</a>
                        </li>
                        <li>
                            <a href="addsubcat.php"><i class="fas fa-plus"></i> Add Sub Categories</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#writers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class=" fas fa-pencil-alt"></i>Writers</a>
                    <ul class="collapse list-unstyled" id="writers">
                    
                        
                        <li>
                            <a href="addwriters.php"><i class="fas fa-plus"></i>Add Writers</a>
                        </li>
                        <li>
                            <a href="writers.php"><i class="fas fa-pencil-ruler"></i>All Writers</a>
                        </li>
                        <li>
                            <a href="deletedwriters.php"><i class="fas fa-trash"></i> Deleted Writers</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#location" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-street-view"></i>Location</a>
                    <ul class="collapse list-unstyled" id="location">
                    
                        
                        <li>
                            <a href="adddistrict.php"><i class="fas fa-location-arrow"></i>Add District</a>
                        </li>
                        <li>
                            <a href="alllocation.php"><i class="fas fa-search-location"></i>All Location</a>
                        </li>
                       
                    </ul>
                </li>

                <!-- <li>
                    <a href="#authmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Authentication</a>
                    <ul class="collapse list-unstyled" id="authmenu">
                        <li>
                            <a href="login.php"><i class="fas fa-lock"></i> Login</a>
                        </li>
                        <li>
                            <a href="signup.php"><i class="fas fa-user-plus"></i> Signup</a>
                        </li>
                        <li>
                            <a href="forgot-password.php"><i class="fas fa-user-lock"></i> Forgot password</a>
                        </li>
                    </ul>
                </li> -->
                
                <li>
                    <a href="charts.php"><i class="fas fa-chart-bar"></i> Charts</a>
                </li>
                
                <li>
                            <a href="comments.php"><i class="fas fa-comments"></i> All Comments</a>
                        </li>
                <!-- <li>
                    <a href="#pagesmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-comments"></i> Comment</a>
                    <ul class="collapse list-unstyled" id="pagesmenu">
                        <li>
                            <a href="comments.php"><i class="fas fa-comments"></i> All Comments</a>
                        </li>
                        <li>
                            <a href="404.php"><i class="fas fa-info-circle"></i> 404 Error page</a>
                        </li>
                        <li>
                            <a href="500.php"><i class="fas fa-info-circle"></i> 500 Error page</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-friends"></i>Users</a>
                    <ul class="collapse list-unstyled" id="users">
                    
                        <li>
                        <a href="users.php"><i class="fas fa-user"></i>Normal Users</a>
                        </li>
                        <li>
                        <a href="adminuser.php"><i class="fas fa-user"></i>Admins</a>
                        </li>
                        <li>
                        <a href="deletedusers.php"><i class="fas fa-trash"></i>Deleted Users</a>
                        </li>
                        <li>
                        <a href="addusers.php"><i class="fas fa-plus"></i>Add Users</a>
                        </li>
                       
                    </ul>
                </li>
                <!-- <li>
                    <a href="settings.php"><i class="fas fa-cog"></i>Settings</a>
                </li> -->
            </ul>
        </nav>
 <!-- sidebar End -->