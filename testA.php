<!DOCTYPE html>
<html>
<head>
	<title>Title of Page</title>

	<link rel="stylesheet" type="text/css" href="tools/css/materialize.css" />

</head>
<body>

<div class="container">
	
	<div class="row">
		<div class="col m3">
			<h3>Karibu to this epic page</h3>
		</div>

<div class="col m9">
	<table>
		<caption>Sample Form</caption>
		<form method="POST" action="testA.php?action=testing" >
			<tbody>
				<tr>
					<td>Name</td>
					<td>
						<input type="text" name="name" />
					</td>
				</tr>
				<tr>
					<td>...</td>
					<td>
						<input type="submit" name="submitbtn" value="Send" />
					</td>
				</tr>
			</tbody>
		</form>
	</table>
</div>
		<?php
			if(isset($_POST) && isset($_REQUEST['action'])=='testing' ){
				printf( " . Processing post-data now.\n" );
				$name = $_POST['name'];
				printf( " . Received name[ $name ].\n" );
				if( strlen($name) >= 3 ){
					$len = strlen($name);
					echo "$len";
					header( "location: index.php?status=string-greater-than-3-char-[$len]" );
				}else{
					printf( "string-less-than-3-characters.!." );
				}
			} else{
				printf( 'No Post Data Recieved.' );
			}
		?>

	</div>

	<div class="row">
		<div class="col m6"></div>
	</div>

</div>

</body>
</html>