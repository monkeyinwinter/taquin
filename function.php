<?php

$TInitial1 = array(1,2,3,4,5,6,7,8,9);//tableau 1d
$temp = 0;

$TInitial = array(//tableau 2d
              array(5,2,3)
              ,array(7,1,4)
              ,array(6,8,9)
            );

$test = count($TInitial);//count du tableau 2d => 3 (soustableaux)

function fct_array_merge($TInitial) {// faire un seul tableau de plusieurs sous tableaux
  $test2 = array_merge($TInitial[0], $TInitial[1], $TInitial[2]);
  return $test2;
}

function fct_array_chunk ($TInitial) {// faire plusieurs tableaux à partir d'un seul tableau
    global $test;
    $TInitial = array_chunk($TInitial, $test);
    return $TInitial;
}

function swap2 ($tab)//swap 2d pour mélanger le tableau 2 dimensions
{

  for ($h = 0 ; $h <= 40 ; $h++)
  {

    $x = mt_rand(0,2);
    $y =  mt_rand(0,2);
    $move = mt_rand(0,3);

    if ($move == 0 AND $y != 0)
    {
      //swap vers le haut
      $temp = $tab[$y-1][$x];
      $tab[$y-1][$x] = $tab[$y][$x];
      $tab[$y][$x] = $temp;
    }
    elseif ($move == 1 AND $y != 2)
    {
      //swap vers le bas
      $temp = $tab[$y+1][$x];
      $tab[$y+1][$x] = $tab[$y][$x];
      $tab[$y][$x] = $temp;
    }
    elseif ($move == 2 AND $x != 2)
    {
      //droite
      $temp = $tab[$y][$x+1];
      $tab[$y][$x+1] = $tab[$y][$x];
      $tab[$y][$x] = $temp;
    }
    elseif ($move == 3  AND $x != 0)
    {
      //gauche
      $temp = $tab[$y][$x-1];
      $tab[$y][$x-1] = $tab[$y][$x];
      $tab[$y][$x] = $temp;
    }

  }

  return $tab;

}

$count = count($TInitial);
$temp2 = 0;

function swap1 ($TInitial) {//swap 1d pour mélanger le tableau 1 dimension
    global $temp2;

      for ( $i = 0; $i <= 39 ; $i++) {

        $choixIndice = array_rand($TInitial);

        $choixMouvement = mt_rand(1,2);

        if ($choixMouvement == 1 AND $choixIndice != 0) {
          $temp2 = $TInitial[$choixIndice-1];
          $TInitial[$choixIndice-1] = $TInitial[$choixIndice];
          $TInitial[$choixIndice] = $temp2;
        }
        elseif ($choixMouvement == 2 AND $choixIndice != 8) {
          $temp2 = $TInitial[$choixIndice+1];
          $TInitial[$choixIndice+1] = $TInitial[$choixIndice];
          $TInitial[$choixIndice] = $temp2;
        }

      }

    return $TInitial;
}

function sortTable(array $tab): array
{
  $isMulti = false;
  foreach ($tab as $key => $value) {
    if(is_array($value)){
      $isMulti = true;
      break;
    }
  }

  if($isMulti === true){
    return sortTableMutli($tab);
  }

  return trie1($tab);
}

/**
 * @var array $tab
 * @return array $tab 
 */
function sortTableMutli(array $tab): array
{
  $x1 = 0;
  $y1 = 0;
  $x2 = $x1+1;
  $y2 = 0;
  $swap = false;
  foreach ($tab as $i => $subTab) {
    foreach ($subTab as $j => $value) {
      $x1 = $i;
      $y1 = $j;
      $x2 = $i;
      $y2 = $j+1;
      if($y2 == count($tab)){
        $x2 = $x2+1;
        $y2 = 0;
      }
      if($x2 == count($tab)){
        continue;
      }
      if($tab[$x1][$y1] > $tab[$x2][$y2]){
        $temp = $tab[$x1][$y1];
        $tab[$x1][$y1] = $tab[$x2][$y2];
        $tab[$x2][$y2] = $temp;
        $swap = true;
      }
    }
  }
  if($swap === false){
    return $tab;
  }
  return sortTableMutli($tab);
}

function trie2 ($tab)// tri 2d
{
  global $temp;

  $swap = true;
  $count = 0;

  for ($i = 0 ; $i < count($tab) ; $i++)
  {
    if ($i+1 < count($tab))
    {
      for ($j = 0 ; $j < count($tab[$i])-1 ; $j++)
      {

        if ($j+1 < count($tab))
        {

          if ($tab[$i][$j] > $tab[$i][$j+1])//tri horizontale
          {
            $temp = $tab[$i][$j];
            $tab[$i][$j] = $tab[$i][$j+1];
            $tab[$i][$j+1] = $temp;
          }

          if ($tab[$i][count($tab)-1] > $tab[$i+1][0])
          {
            $temp = $tab[$i+1][0];
            $tab[$i][count($tab)-1] = $tab[$i+1][0];
            $tab[$i+1][0] = $temp;
          }

        }
      }
    }

  }

  // echo "\n swap : ".$count;
  return $tab;
}

function trie1 ($tab)// tri 1d
{
  global $temp;

  $swap = true;
  $count = 0;

    for ($i = 0 ; $i < count($tab) ; $i++)
    {
      if($swap === false){
        break;
      }
      $swap = false;
      for ($j = $i+1 ; $j < count($tab) ; $j++)
      {
        $count++;
        if ($tab[$i] > $tab[$j])
        {
          $temp = $tab[$i];
          $tab[$i] = $tab[$j];
          $tab[$j] = $temp;
          $swap = true;
        }
      }
    }

  echo "\n swap : ".$count;
  return $tab;

}

// function display ($TInitial1) {
//   print $TInitial1;
// }
