<?php


$TInitial = array(1,2,3,4,5,6,7,8,9);

shuffle($TInitial);

$temp = 0;
$swap = 0;
$comp = 0;

$count = count($TInitial);

$Tnew = array();

function trie ($TInitial) {
  global $temp;
  global $count;
  global $swap;
  global $comp;
  for ($i = 0 ; $i < $count ; $i++) {

    for ($j = $i+1 ; $j < $count ; $j++) {
      $comp ++;
      if ($TInitial[$i] > $TInitial[$j]) {
        $temp = $TInitial[$i];
        $TInitial[$i] = $TInitial[$j];
        $TInitial[$j] = $temp;
        $swap ++;
      }
    }
  }
  return $TInitial;
}


function display ($TInitial) {
  print $TInitial;
}
