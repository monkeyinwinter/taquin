<?php

include 'function.php';



//$TInitial1 = swap1($TInitial1);//fonction 1d
$TInitial = swap2($TInitial);//fonction 2d

if (isset($_GET['action'])) {
  $action = $_GET['action'];

} else {
  $action ='';
}

if (isset($_GET['stringtableau'])) {
  $TResult = explode("-", $_GET['stringtableau']);

} else {
  $TResult ='';
}

if (empty($action)) {
  $action = 'afficher';
}

if ($action == 'trier') {
  //$TInitial1 = trie($TInitial1);//fonction en 1d
  //$TInitial = fct_array_merge($TInitial);//fct à virer car pas terrible
  // $TInitial = trie1($TInitial);//fonction en 1d
  //$TInitial = trie2($TInitial);//fonction en 2d
  $TInitial = sortTable($TInitial);
  //$TInitial = fct_array_chunk($TInitial);//fct à virer car pas terrible
  $action = 'melanger';
}

elseif ($action == 'afficher') {
  $action = 'trier';
  //$TInitial1 = swap1($TInitial1);//fonction en 1d
  $TInitial = swap2($TInitial);//fonction en 2d
}

elseif ($action == 'melanger') {
  //$TInitial1 = swap1($TInitial1);//fonction en 1d
  $TInitial = swap2($TInitial);//fonction en 2d
  $action = 'trier';
}

?>

<form action="http://taquin.test/index.php" method="get">

  <input type="hidden" name="action" value="<?php echo $action?>">
  <button type="submit"><?php echo $action?></button>
</form>


  <?php
  //include 'display1.php';
  include 'display2.php';
