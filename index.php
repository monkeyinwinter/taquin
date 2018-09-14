<?php
set_time_limit ( 20 );

include 'function.php';

// $TInitial = rand2($TInitial);

// random2d ($TInitial);

//$TInitial1 = swap1($TInitial1);//fonction 1d
//$TInitial = swap2($TInitial);//fonction 2d

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
  // echo 'trier';
  //$TInitial1 = trie($TInitial1);//fonction en 1d
  //$TInitial = fct_array_merge($TInitial);//fct à virer car pas terrible
  // $TInitial = trie1($TInitial);//fonction en 1d
  //$TInitial = sortTable($TInitial);
  //$TInitial = trie2($TInitial);//fonction en 2d
  // $TInitial = newTri2d($TInitial);
  // if ($TInitial == $TSolution) {
  //   print 'c est bon';
  // }
  //$TInitial = fct_array_chunk($TInitial);//fct à virer car pas terrible
  if (isset($_GET['tableau'])) {
    $TInitial = explode("-" , $_GET['tableau']);
    $TInitial = array_chunk($TInitial, 3);
    // var_dump($TInitial);
    $TInitial = bfs($TInitial, '');
    // dfs($TInitial, 0, '');
    // echo 'eerer';
  }


  // $TInitial = newtri2d($TInitial);

  $action = 'afficher';
}

elseif ($action == 'afficher') {
  echo 'afficher';
  $action = 'melanger';
  // $TInitial = rand2($TInitial);
  //$TInitial1 = swap1($TInitial1);//fonction en 1d
  //$TInitial = swap2($TInitial);//fonction en 2d
}

elseif ($action == 'melanger') {
  echo 'melanger';
  // $TInitial = rand2($TInitial);

  // echo '<br>';
  // var_dump($TInitial);

  $TTabserialise = array_merge($TInitial[0], $TInitial[1], $TInitial[2]);

  $TTabserialise = implode("-" , $TTabserialise);


  // var_dump($TTabserialise);
  // $TInitial = unserialize($TTabserialise);
  // echo '<br>';
  // var_dump($TInitial);
  // exit;
  // $TInitial = newTri2d($TInitial);
  //$TInitial1 = swap1($TInitial1);//fonction en 1d
  //$TInitial = swap2($TInitial);//fonction en 2d
  $action = 'trier';
}

?>

<form action="http://taquin.test/index.php" method="get">
  <input type="hidden" name="tableau" value="<?php echo $TTabserialise ;?>">
  <input type="hidden" name="action" value="<?php echo $action ;?>">
  <button type="submit"><?php echo $action ;?></button>
</form>


  <?php
  //include 'display1.php';
  include 'display2.php';
