<?php
include('session.php');


$sql = "SELECT * FROM task WHERE employeeId = '$user_check'";
$result = mysqli_query($db,$sql);
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 while($row = mysqli_fetch_array($result))
	{
     $complete[] = array("y"=>$row['taskPer']*100, "label"=>$row['taskId']);
     $incomplete[] = array("y"=>100-$row['taskPer']*100, "label"=>$row['taskId']);



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
		text: "Task Percentages"
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
		toolTipContent: "TaskID:{label}<br><b>{name}:</b> {y} (#percent%)",
		showInLegend: true,
    color: "lightgreen",
		name: "Complete",
		dataPoints: <?php echo json_encode($complete, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedBar100",
			toolTipContent: "<b>{name}:</b> {y} (#percent%)",
			showInLegend: true,
      color: "black",
			name: "Incomplete",
      dataPoints: <?php echo json_encode($incomplete, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}

</script>
</head>
<body bgcolor= "lightsteelblue">
  <div id="chartContainer" style="width: 100%; height: 300px;"></div>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
