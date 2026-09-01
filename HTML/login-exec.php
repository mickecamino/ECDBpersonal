<?php
// File: Login-exec.php
// Function: Execute the login process
// Revision date: 2026-08-31
// Revised by: Mikael Karlsson
// This file is distributed under the license: 
// Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
// 
//Start session
session_start();

//Include database connection details
require_once "include/login/config.php";
include "include/mysql_connect.php";

// Note: connection is $connection
//Array to store validation errors
$errmsg_arr = array();

//Validation error flag
$errflag = false;

// Sanitize USER
$login = mysqli_real_escape_string($connection,$_POST['login']);
$password = mysqli_real_escape_string($connection,$_POST['password']);

//Input Validations
if ($login == '') {
    $errmsg_arr[] = _("Login ID missing");
    $errflag      = true;
}
if ($password == '') {
    $errmsg_arr[] = _("Password missing");
    $errflag      = true;
}

//If there are input validations, redirect back to the login form
if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: login.php");
    exit();
}

//Create query
$qry    = "SELECT * FROM members WHERE login='$login' AND passwd='" . md5($_POST['password']) . "'";
$result = mysqli_query($connection,$qry);

//Check whether the query was successful or not
if ($result) {
    if (mysqli_num_rows($result) == 1) {
        //Login Successful
        session_regenerate_id();
        $member                      = mysqli_fetch_assoc($result);
        $_SESSION['SESS_MEMBER_ID']  = $member['member_id'];
        $_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
        $_SESSION['SESS_LAST_NAME']  = $member['lastname'];
        session_write_close();
        $owner  =   $_SESSION['SESS_MEMBER_ID'];
// Get the chosen language for the user
        $GetLanguage = mysqli_query($connection,"SELECT language FROM members WHERE member_id = ".$owner."");
        $personal = mysqli_fetch_assoc($GetLanguage);
// Set or update the language cookie
// Note: The setcookie() function must appear BEFORE the <html> tag, located in the head.php file
        setcookie("language", $personal['language'], time() + (86400 * 30), "/"); // 86400 * 30 = 30 days

        header("location: index.php");
        exit();
    } else {
        //Login failed
        header("location: login-failed.php");
        exit();
    }
} else {
    die("Query failed");
}
?>
