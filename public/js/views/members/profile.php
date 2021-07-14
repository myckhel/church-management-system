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
		foreach ($attendances as $attendance) {
			// code...
			if($key+1 == $attendance->month){
				$found = true;
				echo "{y: '" .$value. "', a: " .$attendance->present.", b: ".$attendance->absent."},";
			}
		}
		if(!$found){
			echo "{y: '" .$value. "', a: 0, b: 0},";
		}

	} ?>
],
xkey: 'y',
ykeys: ['a', 'b'],
labels: ['Present', 'Absent'],
gridEnabled: true,
gridLineColor: 'rgba(0,0,0,.1)',
gridTextColor: '#8f9ea6',
gridTextSize: '11px',
barColors: ['red', 'green'],
resize:true,
hideHover: 'auto'
});

//for collection
<?php $months =  ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
// MORRIS BAR CHART
// =================================================================
// Require MorrisJS Chart
// -----------------------------------------------------------------
// http://morrisjs.github.io/morris.js/
// =================================================================
Morris.Bar({
element: 'demo-morris-bar-month-collection',
data: [
	<?php
	foreach ($months as $key => $value) {
		// code...
		$month = $key+1;
		$found = false;
		foreach ($collections as $collection) {
			// code...
			if($key+1 == $collection->month){
				$found = true;
				echo "{y: '" .$value. "', a: " .$collection->tithe.", b: ".$collection->offering.", c: ".$collection->other."},";
			}
		}
		if(!$found){
			echo "{y: '" .$value. "', a: 0, b: 0},";
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
barColors: ['red', 'green', 'purple'],
resize:true,
hideHover: 'auto'
});

</script>
