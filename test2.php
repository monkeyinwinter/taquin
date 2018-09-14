<?php

function where0($Tdata)
{
  $TPosition0 = array();
  for( $Y = 0 ; $Y < count($Tdata) ; $Y++)//ou se trouve le zero
  {
    for( $X = 0 ; $X < count($Tdata) ; $X++)
    {
      if ($Tdata[$Y][$X] == 0)
      {
        $TPosition0[] = $Y;//= $origin_Y
        $TPosition0[] = $X;//= $origin_X
      }
    }
  }
  return $TPosition0;
}

function d ($TData , $origin_Y, $origin_X)
{
    $temp = 0;
  $temp = $TData[$origin_Y][$origin_X];
  $TData[$origin_Y][$origin_X] = $TData[$origin_Y][$origin_X+1];
  $TData[$origin_Y][$origin_X+1] = $temp;
  return $TData;
}

function g ($TData , $origin_Y, $origin_X)
{
    $temp = 0;
  $temp = $TData[$origin_Y][$origin_X];
  $TData[$origin_Y][$origin_X] = $TData[$origin_Y][$origin_X-1];
  $TData[$origin_Y][$origin_X-1] = $temp;
    return $TData;
}

function h($TData , $origin_Y,$origin_X)
{
    $temp = 0;
  $temp = $TData[$origin_Y][$origin_X];
  $TData[$origin_Y][$origin_X] = $TData[$origin_Y-1][$origin_X];
  $TData[$origin_Y-1][$origin_X] = $temp;
    return $TData;
}

function b ($TData , $origin_Y, $origin_X)
{
  $temp = 0;
  $temp = $TData[$origin_Y][$origin_X];
  $TData[$origin_Y][$origin_X] = $TData[$origin_Y+1][$origin_X];
  $TData[$origin_Y+1][$origin_X] = $temp;
    return $TData;
}

function MvtPossible ($Tdata, $lastMvt, $origin_Y, $origin_X)
{
  // echo '$origin_Y' . $origin_Y . '  $origin_X' .$origin_X;
  $Result = '';


  if ($origin_Y > 0 AND $lastMvt != 'b')//je suis en bas
  {
    $Result= $Result .'h';
  }

  if ($origin_X >= 0 AND $origin_X < 2 AND $lastMvt != 'g')//je suis à gauche
  {
    $Result = $Result .'d';
  }

  if ($origin_Y < 2 AND $lastMvt != 'h')//je suis à en haut
  {
    $Result = $Result .'b';
  }

  if ($origin_X <= 2 AND $origin_X > 0 AND $lastMvt != 'd')//je suis à droite
  {
    $Result = $Result .'g';
  }

  return $Result;
}

function removeLastMove ($Tdata, $origin_Y , $origin_X, $fctCall)
{
  if($fctCall == 'g')
  {
    d($Tdata , $origin_Y , $origin_X);
  }
  elseif($fctCall == 'd')
  {
    g($Tdata , $origin_Y , $origin_X);
  }
  elseif ($fctCall == 'h')
  {
    b($Tdata , $origin_Y , $origin_X);
  }
  elseif($fctCall == 'b')
  {
    h($Tdata , $origin_Y , $origin_X);
  }
  return $Tdata;
}

function winOrLoose ($TInitialResult, $TSolution)
{
  $ok = '';

  if ($TInitialResult !== $TSolution)
  {
    $ok = 0;
  }
  else {
    $ok = 1;
  }

  return $ok;
}
