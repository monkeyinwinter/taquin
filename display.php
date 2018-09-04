<?php

$top1 = '0px';
$top2 = '100px';
$top3 = '200px';

$left1 = '0px';
$left2 = '100px';
$left3 = '200px';

?>

<!DOCTYPE html>
  <html>
  <head>
    <Link rel = "StyleSheet" href = "style.css" type = "text / css" />
  </head>
  <body>
    <div class="desktop">
      <div class="contain">
          <div class="carre">

            <div class="carre" id="carre1" style="top:<?php echo $top1 ;?>; left: <?php echo $left1; ?>" >
              <p><?php echo $TInitial[0] ;?></p>
            </div>
            <div class="carre" id="carre2" style="top:<?php echo $top1 ;?>; left: <?php echo $left2; ?>">
              <p><?php echo $TInitial[1] ;?></p>
            </div>
            <div class="carre" id="carre3" style="top:<?php echo $top1 ;?>; left: <?php echo $left3; ?>">
              <p><?php echo $TInitial[2] ;?></p>
            </div>
            <div class="carre" id="carre4" style="top:<?php echo $top2 ;?>; left: <?php echo $left1; ?>">
              <p><?php echo $TInitial[3] ;?></p>
            </div>

            <div class="carre" id="carre5" style="top:<?php echo $top2 ;?>; left: <?php echo $left2; ?>">
              <p><?php echo $TInitial[4] ;?></p>
            </div>
            <div class="carre" id="carre6" style="top:<?php echo $top2 ;?>; left: <?php echo $left3; ?>">
              <p><?php echo $TInitial[5] ;?></p>
            </div>
            <div class="carre" id="carre7" style="top:<?php echo $top3 ;?>; left: <?php echo $left1; ?>">
              <p><?php echo $TInitial[6] ;?></p>
            </div>
            <div class="carre" id="carre8" style="top:<?php echo $top3 ;?>; left: <?php echo $left2; ?>">
              <p><?php echo $TInitial[7] ;?></p>
            </div>

            <div class="carre" id="carre9" style="top:<?php echo $top3 ;?>; left: <?php echo $left3; ?>">
              <p><?php echo $TInitial[8] ;?></p>
            </div>


          </div>
      </div>
    </div>

  </body>
</html>
