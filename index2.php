<?php


$TSolution = array(1,8,7,5,4,6,3,2,9);

echo '<br>TRI PAR INSERTION<BR>AVANT : ';//tri par insertion
print_r ($TSolution);

$count = count($TSolution)-1;

for( $X = 0 ; $X < $count ; $X++)
{
  $after = $TSolution[$X];

  for ($Z = 0 ; $Z < $X ; $Z++)
  {
    $before = $TSolution[$Z];
    if ($after < $before)
    {
      $TSolution[$Z] = $after;
      $after = $before;
    }
  }
  $TSolution[$X] = $after;
}

echo '<br> APRÈS : ';
print_r ($TSolution);//FIN TRI PAR INSERTION

/////////////////////////////////////////////////////////////////////////

$TSolution2 = array(1,8,7,5,4,6,3,2,9);

echo '<br><br>TRI A BULLES<BR>AVANT : '; //tri À BULLES
print_r ($TSolution2);

$i = count($TSolution2);

if ($i <= 0) return false;

do
{
  $ok = false;
  for($j = $i-1; $j != 0; $j--)
  {
      if ($TSolution2[$j] < $TSolution2[$j-1])
      {
          $temp = $TSolution2[$j];
          $TSolution2[$j] = $TSolution2[$j-1];
          $TSolution2[$j-1] = $temp;
          $ok = true;
       }
   }
 }
 while($ok);//FIN TRI À BULLES

 echo '<br> APRÈS : ';
 print_r ($TSolution2);//FIN TRI PAR SELECTION

 ////////////////////////////////////////////////////////////////////////
$TSolution3 = array(1,8,7,5,4,6,3,2,9);

echo '<br><br>TRI RAPIDE<BR>AVANT : ';//TRI RAPIDE
print_r ($TSolution3);

$resultat = tri_rapide($TSolution3);

function tri_rapide($TTemp)
{
	$longueur = count($TTemp);

	if($longueur <= 1){
		return $TTemp;
	}
	else{

		$pivot = $TTemp[0];

		$gauche = $droite = array();

		for($i = 1; $i < count($TTemp); $i++)
		{
			if($TTemp[$i] < $pivot){
				$gauche[] = $TTemp[$i];
			}
			else{
				$droite[] = $TTemp[$i];
			}
		}

		return array_merge(tri_rapide($gauche), array($pivot), tri_rapide($droite));
	}
}


echo '<br> APRÈS : ';
print_r($resultat);//FIN TRI RAPIDE

////////////////////////////////////////////////////////////////////////
