<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Login
	</title>
</head>
<body>
	<h1 align="center">Login</h1>
	<table align="center" border="1">
		<form method="post" action="/login/submit">
			@csrf
			<tr>
				<th colspan="2">Login</th>
			</tr>
			<tr>
				<td>
					Email
				</td>
				<td>
					<input type="text" name="email">
				</td>
			</tr>
			<tr>
				<td>
					Password
				</td>
				<td>
					<input type="password" name="password">
				</td>
			</tr>
			<tr>
				<th colspan="2">
					<input type="submit" name="login" value="submit">
				</th>
			</tr>
		</form>
	</table>
</body>
</html>