<?php
include 'db_conn.php';

if(isset($_POST['add'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($conn,"INSERT INTO users (firstname,lastname,username,password) VALUES('$firstname','$lastname','$username','$password')");

}

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    mysqli_query($conn,"DELETE FROM users WHERE user_id = '$id' ");
}

header('Location: index.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $count = mysqli_num_rows($sql);
    $err_msg = "is-invalid";

    if($count > 0) {
        header('Location: index.php');
    } 
    else {
        header("Location: login.php?error=$err_msg");
    }
}