<html><head><title>在线用户</title>
<meta http-equiv="refresh" content="5;url=online_member.php">
</head>
<body>
    <h3>在线的用户有：</h3>
    <?php
        require_once 'UserService.class.php';
        $userService=new UserService();
        $result=$userService->getOnlineMember();

        echo "<table>";
        while ($rows=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$rows['username']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

</body>
</html>