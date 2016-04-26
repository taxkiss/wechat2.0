<?php
class SqlHelper{
    public $host="localhost";
    public $user="root";
    public $password="root";
    public $database="wechat2.0";
    public $link;
    
    public function __construct(){
        $this->link=mysqli_connect($this->host, $this->user, $this->password, $this->database) or die("数据库连接失败！".mysqli_connect_error());
        $sql="set names utf8;";
        mysqli_query($this->link,$sql);
    }
    
    //执行查询操作,返回的不是数组
    public function execute_dql($sql){
        $arr=array();
        $result=mysqli_query($this->link,$sql);
        while ($row=mysqli_fetch_assoc($result)){
            $arr[]=$row;
        }
        return $arr;
    }
    //执行查询操作
    public function execute_dql2($sql){
        $result=mysqli_query($this->link,$sql) or die(mysqli_error());
        return $result;
    }
    
    //执行插入数据,更新操作
    public function execute_dml($sql){
        $result=mysqli_query($this->link,$sql);
        return $result;
/*         if($result){
            if(mysqli_affected_rows($result)==1){
                return true;
            }else{
                return 0;
            }
        }else{
            return false;
        } */
    }
}