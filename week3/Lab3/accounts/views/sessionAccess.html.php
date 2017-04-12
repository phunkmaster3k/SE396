<?php
session_start();

if ( !isset($_SESSION['user_ID']) || $_SESSION['user_ID'] <= 0) {
    exit('You are not allowed');
}
