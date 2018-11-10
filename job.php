<?php
include('session.php');


$sql = "SELECT * FROM task WHERE employeeId = '$user_check'";
$sql2 = "SELECT * FROM task WHERE employeeId <> '$user_check'";
$result = mysqli_query($db,$sql);
$result2 = mysqli_query($db,$sql2);

//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 while($row = mysqli_fetch_array($result))
	{
     $complete[] = array("y"=>($row['jobPer']*$row['taskPer'])*100, "label"=>$row['taskId']);
     //$incomplete[] = array("y"=>(1-$row['jobPer']*$row['taskPer'])*100, "label"=>$row['taskId']);
   }
   while($row = mysqli_fetch_array($result2))
   {
       $others[] = array("y"=>($row['jobPer']*$row['taskPer'])*100, "label"=>$row['taskId']);
       //$incomplete[] = array("y"=>(1-$row['jobPer']*$row['taskPer'])*100, "label"=>$row['taskId']);
     }
//print_r($complete);
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "dark2", //"light1", "dark1", "light2"
	title:{
		text: "Job Percentages"
	},
	axisY:{
		interval: 10,
		suffix: "%"
	},
	toolTip:{
		shared: true
	},
	data:[{
		type: "stackedBar100",
		toolTipContent: "JobID:{label}<br><b>{name}:</b> {y} (#percent%)",
		showInLegend: true,
    color: "lightgreen",
		name: "Complete",
		dataPoints: <?php echo json_encode($complete, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedBar100",
			toolTipContent: "<b>{name}:</b> {y} (#percent%)",
			showInLegend: true,
      color: "blue",
			name: "Incomplete",
      dataPoints: <?php echo json_encode($others, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}

</script>
</head>
<body>
  <div id="chartContainer" style="width: 100%; height: 300px;"></div>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
