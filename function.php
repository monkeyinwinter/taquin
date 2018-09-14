<?php

include 'test2.php';

$TInitial1 = array(1,2,3,4,5,6,7,8,9);//tableau 1d
$temp = 0;

$temp2d = array(array(0));

$TSolution = array(//tableau 2d
              array('1','2','3')
              ,array('4','5','6')
              ,array('7','8','0')
            );

$TInitial = array(//tableau 2d
              array(1,2,0)
              ,array(4,5,3)
              ,array(7,8,6)
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
  $x_1 = 0;
  $y_1 = 0;
  $x_2 = $x_1+1;
  $y_2 = 0;
  $swap = false;
  foreach ($tab as $i => $subTab) {
    foreach ($subTab as $j => $value) {
      $x_1 = $i;
      $y_1 = $j;
      $x_2 = $i;
      $y_2 = $j+1;
      if($y_2 == count($tab)){
        $x_2 = $x_2+1;
        $y_2 = 0;
      }
      if($x_2 == count($tab)){
        continue;
      }
      if($tab[$x_1][$y_1] > $tab[$x_2][$y_2]){
        $temp = $tab[$x_1][$y_1];
        $tab[$x_1][$y_1] = $tab[$x_2][$y_2];
        $tab[$x_2][$y_2] = $temp;
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


$origin_X = -1;
$origin_Y = -1;

function rand2 ($TInitial)
{
  global $temp;
  global $origin_X;
  global $origin_Y;
  $swap = 0;
  echo '<br>fct rand2';

  for ($tour = 0 ; $tour < 100 ; $tour++)
  {

    for( $Y = 0 ; $Y < count($TInitial) ; $Y++)//ou se trouve le zero
    {
      for( $X = 0 ; $X < count($TInitial) ; $X++)
      {
        if ($TInitial[$Y][$X] == 0) {
          $origin_Y = $Y;
          $origin_X = $X;
        }
      }
    }

    if ( $origin_X == 0 AND $origin_Y == 0)///si position 1
    {
      $valider = 0;
      while ($valider == 0) {
        $choix = rand(0,1);
        if ($choix == 0 AND $origin_X != $origin_X+1)//vers la droite
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X+1];
          $TInitial[$origin_Y][$origin_X+1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 1 AND $origin_Y != $origin_Y+1)//vers le bas
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y+1][$origin_X];
          $TInitial[$origin_Y+1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
      }
    }
    elseif ( $origin_X == 1 AND $origin_Y == 0)///si position 2
    {
      $valider = 0;
      while ($valider == 0) {
        $choix = rand(0,2);
        if ($choix == 0 AND $origin_X != $origin_X+1)//vers la droite
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X+1];
          $TInitial[$origin_Y][$origin_X+1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 1 AND $origin_Y != $origin_Y+1)//vers le bas
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y+1][$origin_X];
          $TInitial[$origin_Y+1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 2 AND $origin_X != $origin_X-1)//vers la gauche
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X-1];
          $TInitial[$origin_Y][$origin_X-1] = $temp;

          $valider = 1;
          $swap++;
        }
      }
    }
    elseif ( $origin_X == 2 AND $origin_Y == 0)///si position 3
    {
      $valider = 0;
      while ($valider == 0) {
        $choix = rand(0,1);
        if ($choix == 0 AND $origin_Y != $origin_Y+1)//vers le bas
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y+1][$origin_X];
          $TInitial[$origin_Y+1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 1 AND $origin_X != $origin_X-1)//vers la gauche
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X-1];
          $TInitial[$origin_Y][$origin_X-1] = $temp;

          $valider = 1;
          $swap++;
        }
      }
    }
    elseif ( $origin_X == 0 AND $origin_Y == 1)///si position 4
    {
      $valider = 0;
      while ($valider == 0) {
        $choix = rand(0,2);
        if ($choix == 0 AND $origin_X != $origin_X+1)//vers la droite
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X+1];
          $TInitial[$origin_Y][$origin_X+1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 1 AND $origin_Y != $origin_Y+1)//vers le bas
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y+1][$origin_X];
          $TInitial[$origin_Y+1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 2 AND $origin_Y != $origin_Y-1)//vers le haut
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y-1][$origin_X];
          $TInitial[$origin_Y-1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
      }
    }
    elseif ( $origin_X == 1 AND $origin_Y == 1)///si position 5
    {
      $valider = 0;
      while ($valider == 0) {
        $choix = rand(0,3);
        if ($choix == 0 AND $origin_X != $origin_X+1)//vers la droite
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X+1];
          $TInitial[$origin_Y][$origin_X+1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 1 AND $origin_Y != $origin_Y+1)//vers le bas
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y+1][$origin_X];
          $TInitial[$origin_Y+1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 2 AND $origin_X != $origin_X-1)//vers la gauche
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X-1];
          $TInitial[$origin_Y][$origin_X-1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 3 AND $origin_Y != $origin_Y-1)//vers le haut
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y-1][$origin_X];
          $TInitial[$origin_Y-1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
      }
    }
    elseif ( $origin_X == 2 AND $origin_Y == 1)///si position 6
    {
      $valider = 0;
      while ($valider == 0) {
        $choix = rand(0,2);
        if ($choix == 0 AND $origin_Y != $origin_Y+1)//vers le bas
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y+1][$origin_X];
          $TInitial[$origin_Y+1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 1 AND $origin_X != $origin_X-1)//vers la gauche
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X-1];
          $TInitial[$origin_Y][$origin_X-1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 2 AND $origin_Y != $origin_Y-1)//vers le haut
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y-1][$origin_X];
          $TInitial[$origin_Y-1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
      }
    }
    elseif ( $origin_X == 0 AND $origin_Y == 2)///si position 7
    {
      $valider = 0;
      while ($valider == 0) {
        $choix = rand(0,1);
        if ($choix == 0 AND $origin_X != $origin_X+1)//vers la droite
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X+1];
          $TInitial[$origin_Y][$origin_X+1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 1 AND $origin_Y != $origin_Y-1)//vers le haut
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y-1][$origin_X];
          $TInitial[$origin_Y-1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
      }
    }
    elseif ( $origin_X == 1 AND $origin_Y == 2)///si position 8
    {
      $valider = 0;
      while ($valider == 0) {
        $choix = rand(0,2);
        if ($choix == 0 AND $origin_X != $origin_X+1)//vers la droite
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X+1];
          $TInitial[$origin_Y][$origin_X+1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 1 AND $origin_X != $origin_X-1)//vers la gauche
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X-1];
          $TInitial[$origin_Y][$origin_X-1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 2 AND $origin_Y != $origin_Y-1)//vers le haut
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y-1][$origin_X];
          $TInitial[$origin_Y-1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
      }
    }
    elseif ( $origin_X == 2 AND $origin_Y == 2)///si position 9
    {
      $valider = 0;
      while ($valider == 0) {
        $choix = rand(0,1);
        if ($choix == 0 AND $origin_X != $origin_X-1)//vers la gauche
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y][$origin_X-1];
          $TInitial[$origin_Y][$origin_X-1] = $temp;

          $valider = 1;
          $swap++;
        }
        if ($choix == 1 AND $origin_Y != $origin_Y-1)//vers le haut
        {
          $temp = $TInitial[$origin_Y][$origin_X];
          $TInitial[$origin_Y][$origin_X] = $TInitial[$origin_Y-1][$origin_X];
          $TInitial[$origin_Y-1][$origin_X] = $temp;

          $valider = 1;
          $swap++;
        }
      }
    }

  }
  print '<br>nbr de boucles de melange : ' .$tour;
  echo '<br>nbr de swap : ' .$swap;
  return $TInitial;
}


$count = 0;
$dernierMvt = '';
$TQeue = array();
$queue = '';
$MvtPossible = '';

function bfs($TInitialResult, $queue)
{
  global $queue;
  global $count;
  global $TSolution;
  global $dernierMvt;
  global $MvtPossible;
  $win = '';
  $Tdata = array();

  echo '<br>$queue au debut : ' .$queue;

  $win = winOrLoose($TInitialResult, $TSolution);//on verifie si le taquin est gagné

  // while($win != 1 || $count < 20)
  // {

    $TPosition0 = where0($TInitialResult);//on determine l emplacement du zero
    $origin_Y = $TPosition0[0];
    $origin_X = $TPosition0[1];

    if($MvtPossible === '')
    {
        $MvtPossible = MvtPossible ($TInitialResult, $dernierMvt, $origin_Y, $origin_X);//on determine les mvt possible
    }
    else
    {
      $MvtPossible = $queue.MvtPossible($TInitialResult, $dernierMvt, $origin_Y, $origin_X);
    }
    echo '<br> $origin_Y debut : ' . $origin_Y;
    echo '<br> $origin_X debut : ' . $origin_X;
    echo '<br> $MvtPossible debut : '.$MvtPossible;
    echo '<br>';


    $MvtPossibles = str_split($MvtPossible);

    foreach ($MvtPossibles as $MvtPossible)//on boucle sur le "tableau-string" des mvt possible
    {
      $fctMvtCall = $dernierMvt = $MvtPossible;//recuperation du mvt a appliquer

      $Tdata = $fctMvtCall($TInitialResult , $origin_Y , $origin_X);//function qui fait le swap

      $win = winOrLoose($Tdata, $TSolution);//on verifie si le taquin est gagné avec ce deplacement

      if ($win == 1)//on verifie si le taquin est gagné et on sort de la fonction si c est gagné
      {
        $TInitialResult = $Tdata;

        win($TInitialResult);

        return $TInitialResult;

      }
      else {
        $TPosition0 = where0($Tdata);//on determine le nouvel emplacement du zero
        $origin_Y = $TPosition0[0];
        $origin_X = $TPosition0[1];

        $queue = $queue.$MvtPossible . MvtPossible ($Tdata, $dernierMvt, $origin_Y , $origin_X);//on determine les nouveaux mvt possible à partir du nouveau sommet

        echo '<br> $origin_Y a la fin avec tdata: ' . $origin_Y;
        echo '<br> $origin_X a la fin avec tdata : ' . $origin_X;
        echo '<br> $queue apres le swap : ' .$queue;
        // exit;
        $count++;
        echo'<br> $count à la fin : ' .$count;
        echo '<br>queue a la fin : ' .$queue;
        echo '<br>';
        print_r($Tdata);
        // exit;
        bfs($Tdata, $queue);
      }
    }//fin de foreach
  // }//fin de while


  return $TInitialResult;
}
    //
    function win($TInitialResult)
    {
      global $queue;
      echo '<br> $queue'.$queue;
      echo '<br>YES YOU WIN !!! PERFECT HAHAHAHA !!!';
      print_r($TInitialResult);
      return $TInitialResult;

    }
    // foreach($TMvtPossible as $dernierMvt=>$tab ){
    //
    //   $fctMvtCall = $dernierMvt;
    //
    //   $Tdata = $fctMvtCall($TInitialResult , $origin_Y , $origin_X);//function qui fait le swap
    //
    //   $win = winOrLoose($Tdata, $TSolution);//on verifie si le taquin est gagné avec ce deplacement
    //
    //   if ($win == 1)//on verifie si le taquin est gagné et on sort de la fonction si c est gagné
    //   {
    //     $TInitial = $Tdata;
    //
    //     echo '<br>YES YOU WIN !!! PERFECT HAHAHAHA !!!';
    //     return $TInitial;
    //   }
    //
    //   $TPosition0 = where0($Tdata);//on determine le nouvel emplacement du zero
    //   $origin_Y = $TPosition0[0];
    //   $origin_X = $TPosition0[1];
    //   $TMvtPossible[$dernierMvt] = MvtPossible ($Tdata, $dernierMvt, $origin_Y , $origin_X);//on determine les nouveaux mvt possible à partir du nouveau sommet
    //
    //   removeLastMove ($Tdata, $origin_Y , $origin_X, $dernierMvt);//annule le swap pour determiner les nouveaux mvt possible en fct de l'emplacement du zero précédent
    //
    // }
    // print_r($TMvtPossible);
    // echo '<br>';


// die();
    // for( $X = 0 ; $X < count($TMvtPossible) ; $X++)//on boucle sur le tableau des mvt possible
    // {
    //   $fctMvtCall = $dernierMvt = $TMvtPossible[$X][$X];//recuperation du mvt a appliquer
    //   var_dump($fctMvtCall);
    //   echo '<br> $fctMvtCall : ' .$fctMvtCall;
    //
    //   $Tdata = $fctMvtCall($TInitialResult , $origin_Y , $origin_X);//function qui fait le swap
    //   // var_dump($Tdata);
    //   // echo '<br>';
    //   $win = winOrLoose($Tdata, $TSolution);//on verifie si le taquin est gagné avec ce deplacement
    //   // var_dump($win);
    //   // echo '<br> win  : ' .$win;
    //   if ($win == 1)//on verifie si le taquin est gagné et on sort de la fonction si c est gagné
    //   {
    //     $TInitial = $Tdata;
    //
    //     echo '<br>YES YOU WIN !!! PERFECT HAHAHAHA !!!';
    //     return $TInitial;
    //   }
    //   // exit;
    //
    //   $TPosition0 = where0($Tdata);//on determine le nouvel emplacement du zero
    //   $origin_Y = $TPosition0[0];
    //   $origin_X = $TPosition0[1];
    //
    //   $TMvtPossible[$X][] = MvtPossible ($Tdata, $dernierMvt, $origin_Y , $origin_X);//on determine les nouveaux mvt possible à partir du nouveau sommet
    //
    //   removeLastMove ($Tdata, $origin_Y , $origin_X, $fctMvtCall);//annule le swap pour determiner les nouveaux mvt possible en fct de l'emplacement du zero précédent
    //
    //   $count++;
    //
    // }




$maxDepth = 85;
$bestDepth = $maxDepth;

function dfs($TInitialResult, $profondeur, $dernierMvt)
{

  global $TSolution;

  for( $Y = 0 ; $Y < count($TInitialResult) ; $Y++)//ou se trouve le zero
  {
    for( $X = 0 ; $X < count($TInitialResult) ; $X++)
    {
      if ($TInitialResult[$Y][$X] == 0)
      {
        $origin_Y = $Y;
        $origin_X = $X;
      }
    }
  }

  global $TInitial;
  global $bestDepth;

  if($profondeur > $bestDepth)
  {
    return false;
  }

  if($TInitialResult == $TSolution)
  {
    $bestDepth = $profondeur;
    $TInitial = $TInitialResult;
    return true;
  }

  $TMvtPossible = MvtPossible ($TInitialResult, $dernierMvt, $origin_X, $origin_Y);

  for ($x = 0 ; $x < count($TMvtPossible) ; $x++)
  {

    $TInitialResult = $TMvtPossible[$x]($TInitialResult , $origin_Y , $origin_X);

    if(dfs($TInitialResult, $profondeur+1, $TMvtPossible[$x])===true)
    {
      return true;
    }
  }

  return false;
}



function newtri2d ($TInitial)
{
  global $temp;
  global $TSolution;
  $test = 0;

  while ($TInitial != $TSolution)
  {

    $TPosition =  MvtPossible ($origin_Y, $origin_X);

    for ($i = 0 ; $i < count($TPosition) ; $i++)
    {

      $TPosition[$i]($TInitial , $origin_X , $origin_Y);

    }

  }//FIN DE WHILE

  return $TInitial;
}





$depth_max = 100;
$move_save = array($depth_max);

$best_move = array($depth_max);
$best_depth = $depth_max;

function isCorrect ()
{
  global $TInitial;
  for ($_x = 0 ; $_x < count($TInitial) ; $_x++ )
  {
    for ($_y = 0 ; $_y < count($TInitial) ; $_y++ )
    {
      if ($TInitial[$_x][$_y] != $TSolution[$_x][$_y])
      {
        return 0;
      }
    }
    return 1;
  }
}

function search_dfs($origin_X, $origin_Y, $depth, $played_X, $played_Y)
{
  global $TInitial;
  global $depth_max;
  global $best_depth;
  global $move_save;

  if ($depth >= $best_depth)//recherche de la meilleur solution pas plus profond -- CUTOFF
  {
    return;
  }

  if (isCorrect())
  {
    print 'Solution trouvée avec : ' .$depth. ' déplacements';
    $best_depth = $depth;
    for ($i = 0 ; $i < $depth ; $i++)
    {
      $best_move[$i] = $moves[$i];
    }
    return;
  }

  if ($depth != 0)
  {
    $move_save[$depth-1] = $TInitial[$played_X][$played_Y];//save des deplacements pour ne pas les rejouer
  }

  $x_1 = $origin_X +1;
  $y_1 = $origin_Y;
  $x_2 = $origin_X -1;
  $y_2 = $origin_Y;
  $x_3 = $origin_X;
  $y_3 = $origin_Y +1;
  $x_4 = $origin_X ;
  $y_4 = $origin_Y -1;

  if ($x_1 == $played_X AND $y_1 == $played_Y)//empeche de revenir en arriere
  {
    $x_1 = $y_1 = -1;
  }

  if ($x_2 == $played_X AND $y_2 == $played_Y)//empeche de revenir en arriere
  {
    $x_2 = $y_2 = -1;
  }

  if ($x_1 == $played_X AND $y_2 == $played_Y)//empeche de revenir en arriere
  {
    $x_3 = $y_3 = -1;
  }

  if ($x_1 == $played_X AND $y_2 == $played_Y)//empeche de revenir en arriere
  {
    $x_4 = $y_4 = -1;
  }

  if($x_1 >= 0 AND $y_1 >= 0 AND $x_1 < count($TInitial) AND $y_1 < count($TInitial))
  {
    $TInitial[$origin_X][$origin_Y] = $TInitial[$x_1][$y_1];
    $TInitial[$x_1][$y_1] = 0;
    search_dfs($x_1, $y_1, $depth +1, $origin_X, $origin_Y);
    $TInitial[$x_1][$y_1] = $TInitial[$origin_X][$origin_Y];
    $TInitial[$origin_X][$origin_Y] = 0;
  }

  if($x_2 >= 0 AND $y_2 >= 0 AND $x_2 < count($TInitial) AND $y_2 < count($TInitial))
  {
    $TInitial[$origin_X][$origin_Y] = $TInitial[$x_2][$y_2];
    $TInitial[$x_2][$y_2] = 0;
    search_dfs($x_2, $y_2, $depth +1, $origin_X, $origin_Y);
    $TInitial[$x_2][$y_2] = $TInitial[$origin_X][$origin_Y];
    $TInitial[$origin_X][$origin_Y] = 0;
  }

  if($x_3 >= 0 AND $y_3 >= 0 AND $x_3 < count($TInitial) AND $y_3 < count($TInitial))
  {
    $TInitial[$origin_X][$origin_Y] = $TInitial[$x_3][$y_3];
    $TInitial[$x_3][$y_3] = 0;
    search_dfs($x_3, $y_3, $depth +1, $origin_X, $origin_Y);
    $TInitial[$x_3][$y_3] = $TInitial[$origin_X][$origin_Y];
    $TInitial[$origin_X][$origin_Y] = 0;
  }

  if($x_4 >= 0 AND $y_4 >= 0 AND $x_4 < count($TInitial) AND $y_4 < count($TInitial))
  {
    $TInitial[$origin_X][$origin_Y] = $TInitial[$x_4][$y_4];
    $TInitial[$x_4][$y_4] = 0;
    search_dfs($x_4, $y_4, $depth +1, $origin_X, $origin_Y);
    $TInitial[$x_4][$y_4] = $TInitial[$origin_X][$origin_Y];
    $TInitial[$origin_X][$origin_Y] = 0;
  }

}

function xxx ($TInitial)
{
  global $best_depth;

  $origin_X = -1;
  $origin_Y = -1;

  for( $x = 0 ; $x < count($TInitial) ; $x++)//ou se trouve le zero
  {
    for( $y = 0 ; $y < count($TInitial) ; $y++)
    {
      if ($TInitial[$x][$y] == 0) {
        $origin_X = $x;
        $origin_Y = $y;
      }
    }
  }

  search_dfs($origin_X, $origin_Y, 0, -1, -1);

  for ($i = 0 ; $i < $best_depth ; $i++)
  {
    print "?????" .$i. $best_move[$i];
  }

  $xxx = -1;
  return $xxx;
}
