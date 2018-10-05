<script>
<?php $months =  ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
// MORRIS BAR CHART
// =================================================================
// Require MorrisJS Chart
// -----------------------------------------------------------------
// http://morrisjs.github.io/morris.js/
// =================================================================
Morris.Bar({
element: 'demo-morris-bar-month',
data: [
	<?php
	foreach ($months as $key => $value) {
		// code...
		$month = $key+1;
		$found = false;
		foreach ($collections as $collection) {
			// code...
			if($key+1 == $collection->month && ($collection->tithe != NULL && $collection->offering != NULL && $collection->other != NULL)){
				$found = true;
				echo "{y: '" .$value. "', a: " .$collection->tithe.", b: ".$collection->offering.", c: ".$collection->other."},";
			}
		}
		if(!$found){
			echo "{y: '" .$value. "', a: 0, b: 0, c: 0},";
		}

	} ?>
],
xkey: 'y',
ykeys: ['a', 'b', 'c'],
labels: ['Tithe', 'Offering', 'Other'],
gridEnabled: true,
gridLineColor: 'rgba(0,0,0,.1)',
gridTextColor: '#8f9ea6',
gridTextSize: '11px',
barColors: ['#8c0e0e', 'green', 'yellow'],
resize:true,
hideHover: 'auto'
});

//FOR Day
<?php $days =  ['Sun', 'Mon', 'Tue', 'Wed','Thur','Fri','Sat']; ?>
Morris.Bar({
element: 'demo-morris-bar-day',
data: [
	<?php
	foreach ($days as $key => $value) {
		// code...
		$day = $key+1;
		$found = false;
		foreach ($collections2 as $collections) {
			// code...
			if($key+1 == $collections->day && ($collections->tithe != NULL && $collections->offering != NULL && $collections->other != NULL)){
				$found = true;
				echo "{y: '" .$value. "', a: " .$collections->tithe.", b: ".$collections->offering.", c: ".$collections->other."},";
			}
		}
		if(!$found){
			echo "{y: '" .$value. "', a: 0, b: 0, c: 0},";
		}

	} ?>
],
xkey: 'y',
ykeys: ['a', 'b', 'c'],
labels: ['tithe', 'offering', 'other'],
gridEnabled: true,
gridLineColor: 'rgba(0,0,0,.1)',
gridTextColor: '#8f9ea6',
gridTextSize: '11px',
barColors: ['#8c0e0e', 'green', 'yellow'],
resize:true,
hideHover: 'auto'
});
//FOR Week
<?php
$weeks = [];
$i = 10;
while ($i > 0) {

$weeks[$i] = date('W', strtotime("-$i week")); //1 week ago
$i--;
}
//$weeks =  [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,
      //18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34,
      //35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51,
      //52,];
?>

Morris.Bar({
element: 'demo-morris-bar-week',
data: [
	<?php
	foreach ($weeks as $key => $value) {
		// code...
		$week = $key+1;
		$found = false;
		foreach ($collections3 as $collections) {
			// code...
			if($value == $collections->week && ($collections->tithe != NULL && $collections->offering != NULL && $collections->other != NULL)){
				$found = true;
				echo "{y: 'Week " .$value. "', a: " .$collections->tithe.", b: ".$collections->offering.", c: ".$collections->other."},";
			}
		}
		if(!$found){
			echo "{y: 'Week " .$value. "', a: 0, b: 0, c: 0},";
		}

	} ?>
],
xkey: 'y',
ykeys: ['a', 'b', 'c'],
labels: ['tithe', 'offering', 'other'],
gridEnabled: true,
gridLineColor: 'rgba(0,0,0,.1)',
gridTextColor: '#8f9ea6',
gridTextSize: '11px',
barColors: ['#8c0e0e', 'green', 'yellow'],
resize:true,
hideHover: 'auto'
});

//FOR Year
<?php
$years = [];
$i = 11;
while ($i >= 0) {

$years[$i] = date('Y', strtotime("-$i year")); //1 week ago
$i--;
}
//$weeks =  [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,
      //18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34,
      //35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51,
      //52,];
?>

Morris.Bar({
element: 'demo-morris-bar-year',
data: [
	<?php
	foreach ($years as $key => $value) {
		// code...
		$year = $key+1;
		$found = false;
		foreach ($collections4 as $collections) {
			// code...
			if($value == $collections->year && ($collections->tithe != NULL && $collections->offering != NULL && $collections->other != NULL)){
				$found = true;
				echo "{y: '" .$value. "', a: " .$collections->tithe.", b: ".$collections->offering.", c: ".$collections->other."},";
			}
		}
		if(!$found){
			echo "{y: '" .$value. "', a: 0, b: 0, c: 0},";
		}

	} ?>
],
xkey: 'y',
ykeys: ['a', 'b', 'c'],
labels: ['tithe', 'offering', 'other'],
gridEnabled: true,
gridLineColor: 'rgba(0,0,0,.1)',
gridTextColor: '#8f9ea6',
gridTextSize: '11px',
barColors: ['#8c0e0e', 'green', 'yellow'],
resize:true,
hideHover: 'auto'
});
</script>
