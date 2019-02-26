<?php
function noData($c_types, $value){
  $y = "{y: '$value',"; $i=1;
  foreach ($c_types as $key => $value) { $y .= "'$i':0,"; $i++;}
  echo $y. "},";
}

function yKeys($c_types){
  $i=1; foreach ($c_types as $key => $value) {echo "'$i',"; $i++;}
}

function yKeys2($c_types){
  foreach ($c_types as $key => $value) {echo "'{$value->name}',";}
}

function labels($c_types){
  foreach ($c_types as $key => $value) {echo "'{$value->disFormatString()}',";}
}

function yData($collection,$c_types, $value){
  $y = "{y: '$value', ";  $i = 1; $size = sizeof($c_types);
  foreach ($c_types as $key => $value) {
    $name = $value->name;
    $amount = isset($collection->$name) ? $collection->$name : 0;
    $y .= "$i: $amount,";
    $i++;
  }
  echo $y . "},";
}

 function barColors($colors){
   foreach ($colors as $value) {echo "'".$value."',";}
 }

function random_color_part() {
  return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function getColor($num) {
    $hash = md5('color' . $num); // modify 'color' to get a different palette
    return (
      hexdec(substr($hash, 0, 2)). // r
      hexdec(substr($hash, 2, 2)). // g
      hexdec(substr($hash, 4, 2))  //b
    );
}

$generateColor = function($c_types){
  $c = [];
  foreach($c_types as $value){
    array_push($c,"#".random_color());
  }
  return $c;
};

function colo (){
  $colors = ['#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#00FFFF',
  '#FF00FF',
  '#C0C0C0',
  '#808080',
  '#800000',
  '#808000',
  '#008000',
  '#800080',
  '#008080',
  '#A52A2A',
  '#000080',];
  return $colors;
}
$empty = [ '', '', '', '', '', '', '', '', '',
 '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
  '', '', '', ''];
// dd($colors);
?>
