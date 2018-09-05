<?php

$Y1 = '0px';
$Y2 = '100px';
$Y3 = '200px';

$X1 = '0px';
$X2 = '100px';
$X3 = '200px';

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

            <div class="carre" id="carre1" style="top:<?php echo $Y1 ;?>; left: <?php echo $X1; ?>" >
              <p><?php echo $TInitial1[0] ;?></p>
            </div>
            <div class="carre" id="carre2" style="top:<?php echo $Y1 ;?>; left: <?php echo $X2; ?>">
              <p><?php echo $TInitial1[1] ;?></p>
            </div>
            <div class="carre" id="carre3" style="top:<?php echo $Y1 ;?>; left: <?php echo $X3; ?>">
              <p><?php echo $TInitial1[2] ;?></p>
            </div>

            <div class="carre" id="carre4" style="top:<?php echo $Y2 ;?>; left: <?php echo $X1; ?>">
              <p><?php echo $TInitial1[3] ;?></p>
            </div>
            <div class="carre" id="carre5" style="top:<?php echo $Y2 ;?>; left: <?php echo $X2; ?>">
              <p><?php echo $TInitial1[4] ;?></p>
            </div>
            <div class="carre" id="carre6" style="top:<?php echo $Y2 ;?>; left: <?php echo $X3; ?>">
              <p><?php echo $TInitial1[5] ;?></p>
            </div>

            <div class="carre" id="carre7" style="top:<?php echo $Y3 ;?>; left: <?php echo $X1; ?>">
              <p><?php echo $TInitial1[6] ;?></p>
            </div>
            <div class="carre" id="carre8" style="top:<?php echo $Y3 ;?>; left: <?php echo $X2; ?>">
              <p><?php echo $TInitial1[7] ;?></p>
            </div>
            <div class="carre" id="carre9" style="top:<?php echo $Y3 ;?>; left: <?php echo $X3; ?>">
              <p><?php echo $TInitial1[8] ;?></p>
            </div>


          </div>
      </div>
    </div>

  </body>
</html>
