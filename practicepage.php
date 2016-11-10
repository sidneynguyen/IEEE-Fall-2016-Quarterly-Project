<!DOCTYPE html>
<html lang="en-US">

<head>
	<!-- import the css file -->
  <link rel="stylesheet" type="text/css" href="practice.css">
</head>

<?php
				include "GLOBAL.php"; // get our global functions and header

				$collection = connectMongo(); // get collection using global method
?>

<body>

<h1>Input</h1>
<p>Mission: Put data into mlab</p>
				
<!-- PROCESSING FROM INPUT -->
<?php
	if (isset($_POST['enter_name'])) {
		$newdata = array( "first" => $_POST['name_first'],
											"last" => $_POST['name_last'],
											"username" => $_POST['username']
							);
		$collection -> insert($newdata);

		echo "Entry successful <br><br>";
	}

?>

<!-- HTML FORM FOR INPUT -->
<form method='post'>
  
	First Name: <input type="text" name="name_first"><br>
	Last Name: <input type="text" name="name_last"><br>
	Username: <input type="text" name="username"><br>
	<input type="submit" name="enter_name"><br><br>

</form>

<hr> <!-- END INPUT> BEGIN OUTPUT -->

<h1>Output</h1>
<p>Mission: Display the data in a table</p>
	
	<div class="tbl"> <!-- divs for everything! Look in CSS file to see why -->
	<table>
		
		<tr> <!-- header row -->
			<td class="header">First</td>
			<td class="header">Last</td>
			<td class="header">Username</td>
		</tr>
	<?php // fill in the table. Open the for loop, and create html for a table
				// each iteration.
		$cursor = $collection->find();
		foreach ($cursor as $doc) {
	?>
		<tr>
			<td><?php echo $doc['first']; ?></td>
			<td><?php echo $doc['last']; ?></td>
			<td><?php echo $doc['username']; ?></td>
		</tr>
	<?php // remember to close your for loop!
		}
	?>
	</table>
	</div> <!-- END TBL --> <!-- this helps keep code clean -->

<br><br><br>
</body>
