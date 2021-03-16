 <!-- menu start -->
 <?php

    use App\classes\Session;
    ?>
 <div class="main-menu bg-nav clearfix">
     <div class="container">

         <nav>
             <div class="logo"> <a href="index.php"><img src="assest/img/logo.png" width="60px" alt=""></a></div>
             <a class="text-end fs-50 toggle" href="#"><i class="fas fa-bars"></i></a>
             <div class="all-menu">
                 <div class="menu">
                     <ul>
                         <li><a href="index.php">Home</a></li>
                         <!-- <li><a href="#">Catagories</a></li> -->

                         <li><a href="blog.php">Blog</a></li>
                         <?php
if(Session::getSessionData("loggedin")){
        ?>
        <li><a href="dashboard.php">Dashboard</a></li>
        <?php
}else{
  echo ' <li><a href="allbooks.php">All Books</a></li>';
}
        ?>
                         
                        
                         
                         <?php
if(Session::getSessionData("loggedin")){
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">My Menu</a>
          <ul class="dropdown-menu bg-nav" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="addbook.php">Add Books</a></li>
            <li><a class="dropdown-item" href="allbooks.php">All Books</a></li>
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          </ul>
        </li>
        <?php
}else{
  echo ' <li><a href="addbook.php">Add Books</a></li>';
}
        ?>
                        
                     </ul>
                 </div>
                 <div class="register">
<?php
// ?id=".Session::getSessionData('userid')."
if(Session::getSessionData("loggedin")){
echo "<ul><li><a href='profile.php'>".Session::getSessionData("username") . "</a></li><li> <a href='logout.php'>Logout</a></li></ul>";
} else{
echo '<ul>
<li><a href="login.php">Login</a></li>
<li><a href="register.php">register</a></li>
</ul>';
}
?>
                         



                 </div>
             </div>
     </div>
     </nav>
 </div>
 <!-- menu End -->