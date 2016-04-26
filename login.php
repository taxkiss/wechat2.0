<html>
<head><title>WeChat</title>
<script type="text/javascript">
	function NameGetFocus(){
		document.frmLogin.username.focus();
	}

	function CheckValid(){
		if(document.frmLogin.username.value==""){
			alert("请输入正确的昵称!");
			document.frmLogin.usernamr.focus();
			return false;
		}
		if(document.frmLogin.password.value==""){
			alert("请输入密码");
			document.frmLogin.password.focus();
			return false;
		}
		return true;
	}
</script>
</head>


<body onload="NameGetFocus()" bgcolor="yellow" text="#000000">
<h1 align="center">Welcome To WeChat</h1>
<form action="loginProcess.php" name="frmLogin" method="post">
<table>
    <tr><td>昵称：</td><td><input type="text" name="username"></td></tr>
    <tr><td>密码：</td><td><input type="password" name="password"></td></tr>
    <tr><td><input type="submit" value="登录" onclick="return CheckValid()"></td><td><input type="reset" value="重置"/></td></tr>
</table>
</form>
    <p>如果你是首次进入聊天室，系统将会自动帮助你创建账号</p>
    
</body>
</html>