<?php $months =  ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
// MORRIS BAR CHART
// =================================================================
// Require MorrisJS Chart
// -----------------------------------------------------------------
// http://morrisjs.github.io/morris.js/
// =================================================================
Morris.Bar({
  element: 'demo-morris-bar9',
  data: [
    <?php
    foreach ($months as $key => $value) {
      // code...
      $month = $key+1;
      $found = false;
      foreach ($collections3 as $collection) {
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
  barColors: ['red', 'green', 'yellow'],
  resize:true,
  hideHover: 'auto'
});

//for week
<?php $days =  ['Mon', 'Tue', 'Wed','Thur','Fri','Sat','Sun']; ?>
Morris.Bar({
  element: 'demo-morris-bar95',
  data: [
    <?php
    foreach ($days as $key => $value) {
      // code...
      $day = $key+1;
      $found = false;
      foreach ($attendances4 as $collection) {
        // code...
        if($key+1 == $collection->day && ($collection->tithe != NULL && $collection->offering != NULL && $collection->other != NULL)){
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
  labels: ['special offering', 'seed Offering', 'Offering'],
  gridEnabled: true,
  gridLineColor: 'rgba(0,0,0,.1)',
  gridTextColor: '#8f9ea6',
  gridTextSize: '11px',
  barColors: ['red', 'green', 'yellow'],
  resize:true,
  hideHover: 'auto'
});
