<?php
include('config.php');

$type = $_POST['type'];



if($type == 'fetch')
{
	$events = array();
	$query = mysqli_query($con, "SELECT * FROM calendar");
	while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$e = array();
    $e['id'] = $fetch['id'];
    $e['title'] = $fetch['title'];
    $e['start'] = $fetch['startdate'];
    $e['end'] = $fetch['enddate'];

    $allday = ($fetch['allDay'] == "true") ? true : false;
    $e['allDay'] = $allday;

    array_push($events, $e);
	}
	echo json_encode($events);
}


?>