<!DOCTYPE html>
<html>
	<head>
		<title>JS Shoutbox</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
	</head>

	<body>
        
		<div id="container">
            <h1 id="download" style="float:right">download chat</h1><span></span>
			<header>
				<h1>JS Shoutbox</h1>
			</header>
            
            <div id="shouts" style="height:200px">
				<form method="get" action="login.php">
					<label>enter user-name</label>
					<input type="text" id="shout" name="user">
					<input type="submit" id="submit" value="START!">
				</form>
			</div>
			<footer>
			
			</footer>
		</div>
        
	</body>
</html>
<script type="text/javascript">
    $('#submit').on('click', function(){
        var name = $('#shout').value;
    console.log(name);
    if(name == "" || name == null || /\s/g.test(name)){
			alert('Please fill in your name');
		}
    });
</script>
