<?php
	include 'config.php';
	// connect to the database
	$dbh = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection 
	if (!$dbh) { 
	    die("Connection failed: " . mysqli_connect_error()); 
	}  else{
	// echo "Connected successfully"; 
	// After we are done, close the connection 
	}
	

	# select course, section, instructor, date, start, end, duration, room, courses.id as id from courses, time where courses.id = time.id and courses.course like '%cscb%';
	if (isset($_REQUEST['course'])) {
		$course = $_REQUEST["course"];
		$sql = "select course, section, instructor, date, start, end, duration, room, courses.id as id from courses, time where courses.id = time.id and courses.course like '%".$course."%'";
		$res = mysqli_query($dbh, $sql);
		$out = array();
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$out[] = $row;
				
			}
			echo json_encode($out);
		} else {
			echo "t";
		}
	}
	mysqli_close($dbh); 
?> 
