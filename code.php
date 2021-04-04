<?php
session_start();
require('authentication.php');
include('config/dbcon.php');

if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['logout_status'] = "Logged out successfully";
    header('Location: login.php');
    exit(0);

}

if(isset($_POST['adduser']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    if($password == $confirmpassword)
    {
        $checkemail = "SELECT email FROM users WHERE email ='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            $_SESSION['status'] = "Email is already taken";
            header("Location: manage-user.php");
            exit;
        }
        else
        {
            $user_query = "INSERT INTO users (name,phone,email,password) VALUES ('$name','$phone','$email','$password')";
        $user_query_run = mysqli_query($con, $user_query);
    
        if($user_query_run)
        {
            $_SESSION['status'] = "User Added Succesfully";
            header("Location: manage-user.php");
        }
        else
        {
            $_SESSION['status'] = "User Registration Failed";
            header("Location: manage-user.php");
        }
        }

    }
else
{
    $_SESSION['status'] = "Password dose not match";
    header("Location: manage-user.php");
}

}

if(isset($_POST['updateuser']))
{
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "UPDATE users SET name='$name', phone='$phone', email='$email', password='$password' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User updated Succesfully";
        header("Location: manage-user.php");
    }
    else
    {
        $_SESSION['status'] = "User updating Failed";
        header("Location: manage-user.php");
    }
}

if(isset($_POST['DeleteUserbtn']))
{
    $userid = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id='$userid' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Deleted Succesfully";
        header("Location: manage-user.php");
    }
    else
    {
        $_SESSION['status'] = "User Deleting Failed";
        header("Location: manage-user.php");
    }
}
?>