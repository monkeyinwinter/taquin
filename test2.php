<?php

function droite (&$TInitial , &$origin_X , &$origin_Y)
{
  $temp = $TInitial[$origin_Y][$origin_X];
  $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X+1];
  $TInitial[$origin_Y][$origin_X+1] = $temp;
}

function gauche (&$TInitial , &$origin_X , &$origin_Y)
{
  $temp = $TInitial[$origin_Y][$origin_X];
  $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X-1];
  $TInitial[$origin_Y][$origin_X-1] = $temp;
}

function haut (&$TInitial , &$origin_X , &$origin_Y)
{
  $temp = $TInitial[$origin_Y][$origin_X];
  $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y-1][$origin_X];
  $TInitial[$origin_Y-1][$origin_X] = $temp;
}

function bas (&$TInitial , &$origin_X , &$origin_Y)
{
  $temp = $TInitial[$origin_Y][$origin_X];
  $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y+1][$origin_X];
  $TInitial[$origin_Y+1][$origin_X] = $temp;
}

function MvtPossible ($TInitial, $origin_Y, $origin_X)
{
  $TPosition = array();

  if ($origin_Y > 0 AND $origin_Y != $origin_Y-1)//je suis en bas
  {
    $TPosition[] = 'haut';
  }

  if ($origin_Y < 2 AND $origin_Y != $origin_Y+1)//je suis à en haut
  {
    $TPosition[] = 'bas';
  }

  if ($origin_X >= 0 AND $origin_X < 2 AND $origin_X != $origin_X-1)//je suis à gauche
  {
    $TPosition[] = 'droite';
  }

  if ($origin_X <= 2 AND $origin_X > 0 AND $origin_X != $origin_X+1)//je suis à droite
  {
    $TPosition[] = 'gauche';
  }

  return $TPosition;
}
