<?php
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    
    require_once 'UserService.class.php';
    $userService=new UserService();
    $result=$userService->getUser($username);
    $rows=mysqli_num_rows($result);
    
    //如果是老用户
    if($rows){
        list($username2,$password2)=mysqli_fetch_row($result);
        if($password2==$_POST['password']){
            $userService->changeisonline($username,$password);
            require 'main.php';
    }else{//信息输入错误
        require 'relogin.php';
    }
    }/*  else{//如果是新用户
        $userService->addUser($username, $password);
        require 'main.php';
    } */
    
    