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
<html lang="en">
<head>
	<title>SmartKid</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="../style/admin.css">

	<script>

	function openForm1() {
		document.getElementById("myForm1").style.display = "block";
	}
	function openForm2() {
		document.getElementById("myForm2").style.display = "block";
	}
	function openForm3() {
		document.getElementById("myForm3").style.display = "block";
	}

	</script>

</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="admin.php"><img src="../images/logo4.png" alt="logo"></a>
		</div>
			<h1>Hi, <b>Admin<b></h1>
			<div class="settings">
				<a href="#"><i class="material-icons">settings</i></a>
			</div>
		</div>

		<div class="main">
			<?=$output?>

			<div class="buttons">
				<button type="submit" onclick="openForm1()">New User</button>
				<button type="submit" onclick="openForm2()">Update Details</button>
				<button type="submit" onclick="openForm3()">Delete User</button>
			</div>

			<div class="form-popup" id="myForm1">
				<form class="form-inline" method="POST" action="admin.php">
					<input type="text" name="forename" placeholder="Forename" required>
					<input type="text" name="surname" placeholder="Surname" required>
					<input type="text" name="username" placeholder="Username" required>
					<input type="text" name="password" placeholder="Password" required><br>
					<input type="submit" name = "submit" value="INSERT">
				</form>
			</div>
			<br>
			<?php
				$forename = $_POST['forename'];
				$surname = $_POST['surname'];
				$username = $_POST['username'];
				$password = $_POST['password'];

				$query = $con->prepare("INSERT INTO smartkid_users(forename, surname, username, password)	VALUES (:forename, :surname, :username, :password)");

				$success = $query->execute([
					'forename' => $forename,
					'surname' => $surname,
					'username' => $username,
					'password' => $password
				]);

				echo ("Added: $forename $surname $username $password");
			?>
			<div class="form-popup" id="myForm2">
				<form class="form-inline" method="POST" action="admin.php">
					<input type="text" name="forename" placeholder="Forename" required>
					<input type="text" name="surname" placeholder="Surname" required>
					<input type="text" name="username" placeholder="Username" required>
					<input type="text" name="password" placeholder="Password" required><br>
					<input type="submit" name = "submit" value="UPDATE">
				</form>
			</div>
			<br>
			<?php
				include_once 'test.php';

				$forename = $_POST['forename'];
				$surname = $_POST['surname'];
				$username = $_POST['username'];
				$password = $_POST['password'];

				$query = $con->prepare("UPDATE smartkid_users SET username = :username and password = :password WHERE forename = :forename and surname = :surname");

				$success = $query->execute([
					'forename' => $forename,
					'surname' => $surname,
					'username' => $username,
					'password' => $password
				]);

				echo ("The details have been updated");
		 ?>
			<div class="form-popup" id="myForm3">
				<form class="form-inline" method="POST" action="admin.php">
					<input type="text" name="username" placeholder="Username" required><br>
					<input type="submit" name = "submit" value="DELETE">
				</form>
			</div>
			<?php
				include_once 'test.php';

				$username = $_POST['username'];

				$query = $con->prepare("DELETE FROM smartkid_users
				WHERE username = :username");

			  $success = $query->execute([
				'username'=>$username
			  ]);

			  echo ("You've deleted username $username");
		 ?>
		</div>

	</body>
	</html>
