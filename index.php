<?php

include 'function.php';

$display = '';

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
  $TInitial = $TResult;

  $display = 'show';
  $action = 'melanger';
}

elseif ($action == 'afficher') {
  $TResult = trie($TInitial);
  $stringTResult = implode("-" , $TResult);
  $action = 'trier';
}

elseif ($action == 'melanger') {
  $TResult = trie($TInitial);
  $stringTResult = implode("-" , $TResult);
  $action = 'trier';
}

?>

<form action="http://taquin.test/index.php" method="get">
  <input type="hidden" name="stringtableau" value="<?php echo $stringTResult?>">
  <input type="hidden" name="action" value="<?php echo $action?>">
  <button type="submit"><?php echo $action?></button>
</form>

<?php
if ($display == '') {
?>
  <p>Tableau non trier : <br>
<?php
  include 'display.php';
}
?>
</p>

<?php
if ($display == 'show') {
  ?>
  <p>Tableau triè : <br>
  <?php
  include 'display.php';
}
