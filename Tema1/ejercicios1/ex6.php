<html>
	<head>
		<title>Tabla - Información</title>
	</head>
	<body>
		<table border=1>
			<tr>
				<td><b>Nom:</b></td>
				<?php
					$name = $_GET[ 'name' ];
					echo "<td>$name</td>"
				?>
			</tr>
			<tr>
				<td><b>Llinatge:</b></td>
				<?php
					$surname = $_GET[ 'surname' ];
					echo "<td>$surname</td>"
				?>
			</tr>
			<tr>
				<td><b>Edat:</b></td>
				<?php
					$age = $_GET[ 'age' ];
					echo "<td>$age</td>"
				?>
			</tr>
		</table>
	</body>
</html>
