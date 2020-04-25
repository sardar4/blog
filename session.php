<?php
    include 'batadese/conect.php';

    session_start();
    $user_check = $_SESSION ['loging_user'];
    $sql = "SELECT * FROM user WHERE   email='$user_check'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);

    $login_session = $row['name'];
    $_SESSION['login_id'] = $row['id'];
    $login_id = $_SESSION['login_id'];

    if(!isset($login_session)){
        mysqli_close($conn);
        header ('location:login.php');        
    }
?>