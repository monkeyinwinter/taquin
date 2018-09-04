<?php

$TInitial = array(9,5,4,6,3,1,2,8,7);

$temp = 0;
$swap = 0;
$comp = 0;

$count = count($TInitial);

$Tnew = array();



?>

<p>Tableau non trier : <br>
<?php
foreach ($TInitial AS $value) {
  print $value. '     ';
}
?>
</p>

<form action="http://taquin.test/index.php" method="post">
  <input type="hidden" name="action" value="trier">
  <button type="submit">trier</button>
</form>


<form action="http://taquin.test/index.php" method="post">
  <input type="hidden" name="action" value="afficher">
  <button type="submit">afficher</button>
</form>



<?php
function trie ($data) {
  global $temp;
  global $count;
  global $swap;
  global $comp;
  for ($i = 0 ; $i < $count ; $i++) {

    for ($j = $i+1 ; $j < $count ; $j++) {
      $comp ++;
      if ($data[$i] > $data[$j]) {
        $temp = $data[$i];
        $data[$i] = $data[$j];
        $data[$j] = $temp;
        $swap ++;
      }
    }
  }
  return $data;
}

// function display ($data) {
//   print $data;
// }
//
// print 'le nombre de comparaison est de ' .$comp. '<br>';
// print 'le nombre de swap est de ' .$swap. '<br>';
//
// var_dump($TInitial);
