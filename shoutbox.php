<?php 
include 'database.php'; 
?>
<?php 
//error_reporting(0);
	if(isset($_POST['name']) && isset($_POST['shout'])){
		$name = mysqli_real_escape_string($con, $_POST['name']);
		$shout = mysqli_real_escape_string($con, $_POST['shout']);
        $date = date('h:i:s a',time());
//        if(!isset($_COOKIE['name'])){
//        setcookie("name", $name, time() + (86400 * 30), "/");
//        }
		$query = "INSERT INTO shouts (name, shout, date) VALUES ('$name','$shout',SYSDATE())";
		
		if(!mysqli_query($con, $query)){
			echo 'Error: '.myqli_error($con);
		} else {
//            if(isset($_COOKIE['name'])){
//            $user = $_COOKIE['name'];
        
//            if($user){
//						echo "<li class=\"scroll\" style=\"background:white;color:black;float:right\">{$name} : {$date}<br>{$shout}</li><br><br><br>";
//                    }
//                    else{
//                        echo "<li class=\"scroll\" style=\"background:white;color:black;float:left\">{$name} : {$date}<br>{$shout}</li><br><br><br>";
//                }
            $query = "SELECT * FROM shouts ORDER BY date ASC";
	        $shouts = mysqli_query($con, $query);
			while($row = mysqli_fetch_assoc($shouts)){
                    if($row['name']=== $name){
						echo "<li class=\"scroll\" style=\"background:white;color:black;float:right\">{$row['name']} : {$row['date']}<br>{$row['shout']}</li><br><br><br>";
                    }
                    else{
                        echo "<li class=\"scroll\" style=\"background:white;color:black;float:left\">{$row['name']} : {$row['date']}<br>{$row['shout']}</li><br><br><br>";
                }
            }
            }
		}
?>
