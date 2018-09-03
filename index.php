<?php

$TInitial = array(9,5,4,6,3,1,2,8,7);

$temp = 0;
$swap = 0;
$comp = 0;

$count = count($TInitial);

$Tnew = array();
$action = 'test';
$action = $_GET['action'];
// var_dump($action);

if (empty($action)) {
  $action = "Afficher" ;
}

if ($action == "display" ) {
  $action = 'trier';
  $text = 'trier';

  $Tnew = trie($TInitial);

} else {
  $action = 'display';
  $text = "Afficher";

  // display($Tnew);
}

?>
<form action="http://taquin.test/index.php" method="post">
  <input type="hidden" name="action" value="<?php echo $action; ?>">
  <button type="submit"><?php echo $text ;?></button>
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
