<html>
<head>
	<title>Sistem Informasi Akuntansi</title>
	<link rel="stylesheet" href="css/login.css" type="text/css">
</head>
<body OnLoad="document.login.username.focus();">
<div id="header">
	<div id="content">
		<h2>SIA Login</h2>
		<form method="POST" action="periksa_login.php">
		<table>
			<tr>
				<td>
					<table>
						<tr><td>Username</td><td> : <input type="text" name="username"></td></tr>
						<tr><td>Password</td><td> : <input type="password" name="password"> </td></tr>
						<tr><td colspan="2"> <input type="submit" value="Login"> </td></tr>
					</table>
				</td>
			</tr>
		</table>
		
	</div>
	<div id="footer">
		Copyright &copy; <?php echo"".date('Y').""?> <br> All rights reserved
	</div>
</div>
</body>
</html>