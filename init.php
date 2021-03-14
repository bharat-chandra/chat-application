<?php 
include 'database.php'; 
?>
<?php 
            $query = "SELECT * FROM shouts ORDER BY date ASC";
	        $shouts = mysqli_query($con, $query);
			while($row = mysqli_fetch_assoc($shouts)){
                    if($row['name']=== $_GET['user']){
						echo "<li class=\"scroll\" style=\"background:white;color:black;float:right\">{$row['name']} : {$row['date']}<br>{$row['shout']}</li><br><br><br>";
                    }
                    else{
                        echo "<li class=\"scroll\" style=\"background:white;color:black;float:left\">{$row['name']} : {$row['date']}<br>{$row['shout']}</li><br><br><br>";
                }
            }
?>
