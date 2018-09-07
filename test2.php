<?php


function droite ($TInitial , $origin_X , $origin_Y) {
  $arrayDroite = array(array(), array());

  $temp = $TInitial[$origin_Y][$origin_X];
  $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X+1];
  $TInitial[$origin_Y][$origin_X+1] = $temp;

  $arrayDroite[0] = $TInitial[$origin_Y][$origin_X];
  $arrayDroite[1] = $TInitial[$origin_Y][$origin_X+1];

  return $arrayDroite;

}

function gauche ($TInitial , $origin_X , $origin_Y) {
  $arrayDroite = array();

  $temp = $TInitial[$origin_Y][$origin_X];
  $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y-1][$origin_X];
  $TInitial[$origin_Y-1][$origin_X] = $temp;

  $arrayDroite[0] = $TInitial[$origin_Y][$origin_X];
  var_dump($origin_Y);
  var_dump($origin_X);
  echo '<br>';
  var_dump($arrayDroite[0]);
  // $arrayDroite[1] = $TInitial[$origin_Y][$origin_X+1];

  return $arrayDroite;

}

function haut ($TInitial , $origin_X , $origin_Y) {
  $arrayDroite = array(array(), array());

  $temp = $TInitial[$origin_Y][$origin_X];
  $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y-1][$origin_X];
  $TInitial[$origin_Y-1][$origin_X] = $temp;

  $arrayDroite[0] = $TInitial[$origin_Y][$origin_X];
  var_dump($origin_Y);
  var_dump($origin_X);
    echo '<br>';
  var_dump($arrayDroite[0]);
  // $arrayDroite[1][0] = $TInitial[$origin_Y][$origin_X+1];

  return $arrayDroite;

}

function bas ($TInitial , $origin_X , $origin_Y) {
  $arrayDroite = array(array(), array());

  $temp = $TInitial[$origin_Y][$origin_X];
  $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y+1][$origin_X];
  $TInitial[$origin_Y+1][$origin_X] = $temp;

  $arrayDroite[0] = $TInitial[$origin_Y][$origin_X];
  $arrayDroite[1] = $TInitial[$origin_Y][$origin_X+1];

  return $arrayDroite;

}
