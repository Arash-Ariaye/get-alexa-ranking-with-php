<?php
		include_once 'alexa.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>alexa rank learn-net.ir</title>
		<style>
			div{
				max-width:350px;
				margin:0px auto;
				border:3px solid #F90;
				background: #2E9FFF;
				color:#FFF;
				text-align: center;
				font:normal 100% tahoma;
			}
		</style>
	</head>
	<body>
		<div>
		<h1>--Alexa Rank--</h1>
		<?php 
			//get alexa data
			$data=get_rank('http://learn-net.ir');
			echo "<p>رتبه در جهان : ".$data['global']."</p>";
			end($data);
			$country_name=key($data);
			$country_rank=current($data);
			echo "<p>
						rank in ".$country_name.": ".$country_rank."
				 </p>";
		?>
		</div>
	</body>
</html>
