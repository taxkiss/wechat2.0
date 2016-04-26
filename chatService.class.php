<?php
require_once 'SqlHelper.class.php';
    class ChatService{
        //向chat表中插入聊天记录。
        public function insertText($create_time,$author,$text,$color,$emotion){
            $sqlHelper=new SqlHelper();
            $sql="insert into chat(create_time,author,text,color,emotion) values('$create_time','$author','$text','$color','$emotion');";
            $result=$sqlHelper->execute_dml($sql);
            
        }
        
        //获取聊天信息，并且定期处理
        public function getTextByTime(){
            $sqlHelper=new SqlHelper();
            $sql="select * from chat order by create_time;";
            $result=$sqlHelper->execute_dql2($sql);
            return $result;
         }
         
         public function deleteByTime($result,$rows){
             //清除数据库中过时的数据
             $sqlHelper=new SqlHelper();
             mysqli_data_seek($result, $rows-20);
             list($limtime)=mysqli_fetch_row($result);
             $sql2="delete from chat where create_time <'$limtime';";
             $result2=$sqlHelper->execute_dql2($sql2);
             
         }
         
    }