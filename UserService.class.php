<?php
require_once 'SqlHelper.class.php';
    class UserService{
        public function getUser($username){
            $sql="select username,password from user where username='$username';";
            $sqlHelper=new SqlHelper();
            $result=$sqlHelper->execute_dql2($sql);
            return $result;
        }
        
        public function changeisonline($username,$password){
            $sqlHelper=new SqlHelper();
            $sql="update set isonline=1 where username='$username' and password='$password'";
            $sqlHelper->execute_dml($sql);
        }
        
        public function addUser($username,$password){
            $sqlHelper=new SqlHelper();
            $sql="insert into user(username,password,isonline) values('$username','$password',1);";
            $sqlHelper->execute_dml($sql);  
        }
        
        //查找在线人数
        public function getOnlineMember(){
            $sqlHelper=new SqlHelper();
            $sql="select * from user where isonline=1 order by userid;";
            $result=$sqlHelper->execute_dql2($sql);
            return $result;
        }
        
        //退出聊天室之前改变退出者的在线状态
        public function changeIsonlineExit(){
            session_start();
            $sqlHelper=new SqlHelper();
            $sql1="update user set isonline=0 where name='$_SESSION[username]'";
            $sqlHelper->execute_dql2($sql);
        }
    }