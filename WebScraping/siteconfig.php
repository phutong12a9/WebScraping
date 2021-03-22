<?php
	require "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Config</title>
</head>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		font-family: Arial, Helvetica, sans-serif;
	}
	.container{
		width: 30%;
		margin: 0 auto;
		border: 1px solid gray;
		border-radius: 10px;
		margin-top: 100px;

	}
	.title{
		text-align: center;
		padding-top: 15px;
	}
	.body{
		padding-left: 20px;
		padding-top: 15px;
		line-height: 50px;
	}
	.footer{
		padding: 10px 0px 15px 300px;
	}
	.footer input{
		border-radius: 5px;
	}
	.footer input[type="submit"]{
		background: MediumSeaGreen;
	}
	.body .content{
		overflow: hidden;
	}
	.body .content .label{
		float: left;
		width: 100px;
	}
	.body .content input[type="text"]{
		float: left;
		margin-top: 18px;
		width: 250px;
	}
	.table_config{
		padding-top: 50px;
	}
</style>
<body>
<div class="container">
	<form action="config.php" method="post">
		<h1 class="title">Config Setting</h1>
		<hr>
		<div class="body">
			<div class="content">
				<div class="label">
					<b>Domain</b>
				</div>
				<input type="text" name="domain" required autocomplete="off">
			</div>
			<div class="content">
				<div class="label">
					<b>TagTitle</b>
				</div>
				<input type="text" name="tag_title" required autocomplete="off">
			</div>
			<div class="content">
				<div class="label">
					<b>TagContent</b>
				</div>
				<input type="text" name="tag_content" required autocomplete="off">
			</div>
			<div class="content">
				<div class="label">
					<b>TagPrice</b>
				</div>
				<input type="text" name="tag_price" required autocomplete="off">
			</div>
			<div class="content">
				<div class="label">
					<b>TagAddress</b>
				</div>
				<input type="text" name="tag_address" required autocomplete="off">
			</div>
			<div class="content">
				<div class="label">
					<b>TagSquare</b>
				</div>
				<input type="text" name="tag_square" required autocomplete="off">
			</div>
			<div class="content">
				<div class="label">
					<b>TagContact</b>
				</div>
				<input type="text" name="tag_contact" required autocomplete="off">
			</div>
			<div class="content">
				<div class="label">
					<b>TagImg</b>
				</div>
				<input type="text" name="tag_img" required autocomplete="off">
			</div>
		</div>
		<div class="footer">
			<input type="submit" name="submit" value="Submit">
		</div>
	</form>
</div>
<div class="table_config">
	<table border="1px">
		<thead>
			<tr>
				<th>Domain</th>
				<th>TagTile</th>
				<th>TagContent</th>
				<th>TagPrice</th>
				<th>TagAddress</th>
				<th>TagSquare</th>
				<th>TagContact</th>
				<th>TagImg</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM config";
				$result = mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {
				    // output dữ liệu trên trang
				    while($row = $result->fetch_assoc()) {
				        echo "<tr>";
				        echo "<td>".$row["Domain"]."</td>";
				        echo "<td>".$row["TagTitle"]."</td>";
				        echo "<td>".$row["TagContent"]."</td>";
				        echo "<td>".$row["TagPrice"]."</td>";
				        echo "<td>".$row["TagAddress"]."</td>";
				        echo "<td>".$row["TagSquare"]."</td>";
				        echo "<td>".$row["TagContact"]."</td>";
				        echo "<td>".$row["TagLink"]."</td>";
				        echo "<td><input type='button' value='update' name='btn_update'></td>";
				        echo "</tr>";
				    }
				} else {
				    echo "0 results";
				}
				$conn->close();
			?>
		</tbody>
	</table>
</div>
</body>
</html>