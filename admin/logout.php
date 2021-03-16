<?php
require __DIR__ . '/vendor/autoload.php';
use App\classes\Session;
if(Session::clearSession())
    header("Location:login.php");
