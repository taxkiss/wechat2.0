<html><head><title>显示用户留言</title>
<meta http-equiv="refresh" content="5;url=chat_display.php" >
</head>
<body>
   <?php 
    require_once 'chatService.class.php';
    $chatService=new ChatService();
    $result=$chatService->getTextByTime();
    $rows=mysqli_num_rows($result);
    
    //移动内部结果的指针。
    mysqli_data_seek($result, $rows-15);
    if ($rows<15){
        $l=$rows;//如果小于15行则直接指向最后行
    }else {
        $l=15;
    }
    for ($i=1;$i<=$l;$i++){
        //list  把数组中的值赋给一些变量 
        list($cid,$author,$create_time,$text,$color,$emotion)=mysqli_fetch_row($result);
        echo "<table>";
        if($text){
            echo "<tr>";
            echo "<td align=left><font color=$color>$create_time";
            echo "【".$author."】".$emotion."说道：".$text."</font></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
    $chatService->deleteByTime($result, $rows);
    
  
    
   
   
   
   ?>




</body>



</html>