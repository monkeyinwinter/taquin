<?php

function droite ($TData , $origin_Y, $origin_X)
{
    $temp = 0;
  $temp = $TData[$origin_Y][$origin_X];
  $TData[$origin_Y][$origin_X] = $TData[$origin_Y][$origin_X+1];
  $TData[$origin_Y][$origin_X+1] = $temp;
  return $TData;
}

function gauche ($TData , $origin_Y, $origin_X)
{
    $temp = 0;
  $temp = $TData[$origin_Y][$origin_X];
  $TData[$origin_Y][$origin_X] = $TData[$origin_Y][$origin_X-1];
  $TData[$origin_Y][$origin_X-1] = $temp;
    return $TData;
}

function haut ($TData , $origin_Y,$origin_X)
{
    $temp = 0;
  $temp = $TData[$origin_Y][$origin_X];
  $TData[$origin_Y][$origin_X] = $TData[$origin_Y-1][$origin_X];
  $TData[$origin_Y-1][$origin_X] = $temp;
    return $TData;
}

function bas ($TData , $origin_Y, $origin_X)
{
  $temp = 0;
  $temp = $TData[$origin_Y][$origin_X];
  $TData[$origin_Y][$origin_X] = $TData[$origin_Y+1][$origin_X];
  $TData[$origin_Y+1][$origin_X] = $temp;
    return $TData;
}

function MvtPossible ($Tdata, $lastMvt, $origin_X, $origin_Y)
{
  // echo '$origin_Y' . $origin_Y . '  $origin_X' .$origin_X;
  $TResult = array();

  if ($origin_Y > 0 AND $lastMvt != 'bas')//je suis en bas
  {
    $TResult[] = 'haut';
  }

  if ($origin_Y < 2 AND $lastMvt != 'haut')//je suis à en haut
  {
    $TResult[] = 'bas';
  }

  if ($origin_X >= 0 AND $origin_X < 2 AND $lastMvt != 'gauche')//je suis à gauche
  {
    $TResult[] = 'droite';
  }

  if ($origin_X <= 2 AND $origin_X > 0 AND $lastMvt != 'droite')//je suis à droite
  {
    $TResult[] = 'gauche';
  }

  return $TResult;
}
