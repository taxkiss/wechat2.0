<?php
    session_start();
?>

<html>
<head><title>离开系统</title>
<script type="text/javascript">
	function exit(){
		flag=1;
		window.top.location="change.php";
		window.top.location="login.php";
	}

</script>
</head>
<body>
<form action="exit.php" method="post">
    <input type="button" id="cmdExit" value="离开系统" onclick="exit()">
</form>
</body>

</html>
