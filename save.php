<?php
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
