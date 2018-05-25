<?php 
    include_once('head.php');
    include_once('config.php');
    $idu = $_POST['userId'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    //$email = $_POST['email'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $gender = $_POST['gender'];
    $tel = $_POST['tel'];

    $sql = "UPDATE `member` SET `username` = '$username', `password` = '$password', `firstname` = '$first', `lastname` = '$last', `gender` = '$gender', `tel` = '$tel' WHERE `member`.`idu` = $idu";
    
    if($conn->query($sql)){
        echo "<script>alert('Edit Profile Successful')</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
    else{
        echo "<script>alert('Edit Profile Fail')</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
?>