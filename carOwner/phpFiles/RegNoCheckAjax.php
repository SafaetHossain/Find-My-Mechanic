<?php
function getJSONFromDB($sql){
	
	include 'Mysqldb.php';

	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));

	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
$jsonRegNoString=getJSONFromDB("SELECT VehicleRegNo FROM vehicle WHERE VehicleRegNo='".$_REQUEST['RegNo']."'");

$vehiclDetail = json_decode($jsonRegNoString);

echo $vehiclDetail[0]->VehicleRegNo;

?>