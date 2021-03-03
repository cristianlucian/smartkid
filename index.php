<?php

include_once 'test.php';

$query = $con->query("select * from smartkid_users");

$users = $query->fetchAll(PDO::FETCH_OBJ);

$output = "";
$output .= "<table>";
$output .= "<th>ID</th>
			<th>Forename</th>
			<th>Surname</th>
			<th>Username</th>
			<th>Password</th>";
foreach ($users as $user)
{
$output .='<tr>';
$output .='<td>' . $user->ID .'</td>';
$output .='<td>' . $user->Forename .'</td>';
$output .='<td>' . $user->Surename .'</td>';
$output .='<td>' . $user->Username .'</td>';
$output .='<td>' . $user->Password .'</td>';
$output .='</tr>';
}
$output .="</table>";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<style>
		table
		{
			border-collapse:collapse;
			margin:0px auto;
		}
		table,th,td
		{
			border:1px solid black;
			padding:5px;
		}
		.buttons
		{
			margin:auto;
			width:50%;
		}
		form
		{
			display:inline;
			padding:113px;
		}
		input
		{
			border:none;
			cursor: pointer;
			padding: 14px 28px;
			background-color:#ee6f57;
		}
	</style>
</head>
<body>


	<?=$output?><br>
	<div class="buttons">
	<form method="post" action="update.html">
	<input type="submit" name = "submit" value="UPDATE">
	</form>
	<form method="post" action="delete.html">
	<input type="submit" name = "submit" value="DELETE">
	</form>
	</div>
</body>
</html>
