<?php
    session_start();
?>
<!-- ----------------------------------------------------------------------------------------------------- -->
<html><head><title>发言</title>
</head>
<body>
<?php 
    require_once 'chatService.class.php';
    //选择字体颜色
    if (isset($_POST['slt_text_color'])){
        switch ($_POST['slt_text_color']){
            case "红色":
                $color="red";
                break;
            case "蓝色":
                $color="blue";
                break;
            case "灰色":
                $color="gray";
                break;
            default:
                $color="black";
                break;
        }
    }
  
    if (isset($_POST['text'])&&$_POST['text']!=""){
        $create_time=date("H:i:s");
        $author=$_SESSION['username'];
        $text=$_POST['text'];
        $emotion=$_POST['emotion'];

        $chatService=new ChatService();
        $result=$chatService->insertText($create_time, $author, $text, $color, $emotion);
        if(!$result){
            echo "聊天信息插入失败！";
        }
        
    }

?>
<form action="speak.php" target="_self" method="post">
    <input type="text" name="text" cols="20">
    <select size=1 name="slt_text_color">
<?php 
    switch ($color){
        case "red":
            $slt_text_color="红色";
            break;
        case "blue":
            $slt_text_color="蓝色";
            break;
        case "gray":
            $slt_text_color="灰色";
            break;
        default:
            $slt_text_color="";
            break;
    }
?>
    <option selected><?php echo $slt_text_color; ?></option>
    <option>红色</option>
    <option>蓝色</option>
    <option>灰色</option>
    </select>
    <!-- 表情 -->
    <select size=1 name="emotion">
    <?php 
        if (isset($emotion))
        {
    ?>
    <option><?php echo $emotion;}?></option>
    <option>害羞</option>
    <option>高兴</option>
    <option>难过</option>
    </select>
    <input type="submit" value="发送"/>
    <?php 
  
    ?>
</form>
</body>
</html>