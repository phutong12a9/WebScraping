<!DOCTYPE html>
<html>
<head>
	<title>Web Scraping</title>
</head>
<style type="text/css">
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
	.content{
		padding-left: 20px;
		padding-top: 15px;
	}
	.footer{
		padding: 10px 0px 15px 200px;
	}
	.footer input{
		border-radius: 5px;
	}
	.footer input[type="submit"]{
		background: MediumSeaGreen;
	}

</style>
<body>
<div class="container">
	<form action="" method="post">
		<h1 class="title">Web Scraping</h1>
		<hr>
		<div class="content">
			<b>Address Web</b>
			<input type="text" name="add_web" required><br>
		</div>
		<div class="footer">
			<a href="siteconfig.php">Config</a>
			<input type="submit" name="json" value="JSON" formaction="json.php" >
			<input type="submit" name="submit" value="Submit" formaction="WebScaping.php">
		</div>
	</form>
</div>
</body>
</html>