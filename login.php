<?php include 'database.php'; ?>
<?php
	$query = "SELECT * FROM shouts ORDER BY date ASC";
	$shouts = mysqli_query($con, $query);
//error_reporting(0);
?>
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
        <?php
            if(!isset($_GET['user']) ||$_GET['user']===" " || empty($_GET['user'])){
                    header("Location: index.php");
                }
                else{
                    $user = $_GET['user'];
                }
        ?>
		<div id="container">
            <h1 id="download" style="float:right;margin-top:10px">download chat</h1><span></span>
			<header>
				<h1 class="img-thumbnail"> $ CHAT BOX $ </h1>
                
			</header>
            
            <div id="shouts">
				<ul>
				</ul>
			</div>
			<footer>
				<form>
					<?php echo "<input type=\"hidden\" name=\"name\" id=\"name\" value=\"{$user}\">"; ?>
					<input type="text" id="shout" placeholder="type something ⌨">
					<input type="submit" id="submit" value="S E N D !"><a href="index.php" style="float:right;color:white">logout ❗</a>
				</form>
			</footer>
		</div>
	</body>
</html>
<script type="text/javascript">
    $('#shouts ul').load("init.php?user=<?php echo $user ?>");
      //name= window.prompt("enter your name to start conversation : ");
//            while(name=="null" || /\s/g.test(name))
//            {
//                //var name= window.prompt("enter your name to start conversation : ");
//            }
//document.getElementById("name").value=name;
$(document).ready(function(){
	$('#submit').on('click', function(){
		var name = $('#name').val();
		var shout = $('#shout').val();
		var date = getDate();
		var dataString = 'name='+ name + '&shout=' + shout + '&date=' + date;
		
		// Validation
		if(name == '' || shout == ''){
			alert('Please fill in your name and shout');
		} else {
        document.getElementsByTagName("ul").innerHTML=" ";
			$.ajax({
				type:"POST",
				url:"../jsshoutbox/shoutbox.php",
				data: dataString,
				cache: true,
				success: function(html){
					$('#shouts ul').html(html);
				}
			});
		}
		
		return false;
	});
    $('#download').on('click', function(){
		$.ajax({
				type:"POST",
				url:"../jsshoutbox/download.php",
				success: function(html){
					$('span').html("downloaded");
				}
			});
	});
});

//Format date like MySQL date
function getDate(){
	var date;
    date = new Date();
    date = date.getUTCFullYear() + '-' +
            ('00' + (date.getUTCMonth() + 1)).slice(-2) + '-' +
            ('00' + date.getUTCDate()).slice(-2) + ' ' +
            ('00' + date.getUTCHours()).slice(-2) + ':' +
            ('00' + date.getUTCMinutes()).slice(-2) + ':' +
            ('00' + date.getUTCSeconds()).slice(-2);  
    return date;
}
</script>