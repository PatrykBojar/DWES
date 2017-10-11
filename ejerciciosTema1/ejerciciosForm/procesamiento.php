<html>
<head>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>

	<?php
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$prog = $_POST['prog'];
	$clean = $_POST['clean'];
	$draw = $_POST['draw'];
	$sport = $_POST['sport'];
	$games = $_POST['games'];
	$submit = $_POST['submit'];

	
	?>
	<?php
	/*$nameErr = $emailErr = "";
	$name = $email = "";

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		if ( empty($_POST['name']) ) {
			$nameErr = "Nombre requerido";
		} else {
			$name = $_POST['name'];
		}
	
		if ( empty($_POST['email']) ) {
			$emailErr = "Correo requerido";
		} else {
			$email = $_POST['email'];
}*/
	?>
</head>

<body>
	<table>
		<tr>
			<th>
				Nombre
			</th>
			<th>
				Edad
			</th>
			<th>
				Correo
			</th>
			<th>
				Sexo
			</th>
			<th>
				Aficiones
			</th>
		<tr>
		<tr>
			<td>
				<?php echo $name; ?>
			</td>
			<td>
				<?php echo $age; ?>
			</td>
			<td>
				<?php echo $email; ?>
			</td>
			<td>
				<?php echo $gender; ?>
			</td>
			<td>
				<?php echo $prog;echo $clean;echo $draw;echo $sport;echo $games;?>

			</td>
		</tr> 
	</table>
</body>
</html>


  
