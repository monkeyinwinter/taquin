<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Taquin</title>
  <style type="text/css">
      DIV.case {
    border: solid red;
    border-width: 1px;
    position: absolute;
    width: 100px; height: 100px;
    }
      IMG.case {
    width: 100px; height: 100px;
    }
  </style>
  <?php
    $a=getenv('QUERY_STRING');
    list($b,$dummy) = explode(",",$a);
    list($key,$val) = explode('=',$b);
    if ($key=="mois") {$d=$val;} else {$d="03";}
  ?>
  <script language="javascript">
    function stop(i) {
        var M=0;var id=16;
        yy=document.getElementById(i).style.top;
        xx=document.getElementById(i).style.left;
        yid=document.getElementById(id).style.top;
        xid=document.getElementById(id).style.left;
        if ((xx==xid) && (yy=="200px") && (yid=="300px")) {M=1;}
        if ((xx==xid) && (yy=="100px") && (yid=="200px")) {M=1;}
        if ((xx==xid) && (yy=="0px") && (yid=="100px")) {M=1;}
        if ((xx==xid) && (yid=="200px") && (yy=="300px")) {M=1;}
        if ((xx==xid) && (yid=="100px") && (yy=="200px")) {M=1;}
        if ((xx==xid) && (yid=="0px") && (yy=="100px")) {M=1;}
        if ((yy==yid) && (xx=="200px") && (xid=="300px")) {M=1;}
        if ((yy==yid) && (xx=="100px") && (xid=="200px")) {M=1;}
        if ((yy==yid) && (xx=="0px") && (xid=="100px")) {M=1;}
        if ((yy==yid) && (xid=="200px") && (xx=="300px")) {M=1;}
        if ((yy==yid) && (xid=="100px") && (xx=="200px")) {M=1;}
        if ((yy==yid) && (xid=="0px") && (xx=="100px")) {M=1;}
        if (M==1){
        document.getElementById(i).style.top=yid;
        document.getElementById(i).style.left=xid;
        document.getElementById(16).style.top=yy;
        document.getElementById(16).style.left=xx;
        id=i;}
        if ((document.getElementById(1).style.top=="0px")&&(document.getElementById(1).style.left=="0px")&&
        (document.getElementById(2).style.top=="100px")&&(document.getElementById(2).style.left=="0px")&&
        (document.getElementById(3).style.top=="200px")&&(document.getElementById(4).style.left=="0px")&&
        (document.getElementById(4).style.top=="300px")&&(document.getElementById(4).style.left=="0px")&&
        (document.getElementById(5).style.top=="0px")&&(document.getElementById(5).style.left=="100px")&&
        (document.getElementById(6).style.top=="100px")&&(document.getElementById(6).style.left=="100px")&&
        (document.getElementById(7).style.top=="200px")&&(document.getElementById(7).style.left=="100px")&&
        (document.getElementById(8).style.top=="300px")&&(document.getElementById(8).style.left=="100px")&&
        (document.getElementById(9).style.top=="0px")&&(document.getElementById(9).style.left=="200px")&&
        (document.getElementById(10).style.top=="100px")&&(document.getElementById(10).style.left=="200px")&&
        (document.getElementById(11).style.top=="200px")&&(document.getElementById(11).style.left=="200px")&&
        (document.getElementById(12).style.top=="300px")&&(document.getElementById(12).style.left=="200px")&&
        (document.getElementById(13).style.top=="0px")&&(document.getElementById(13).style.left=="300px")&&
        (document.getElementById(14).style.top=="100px")&&(document.getElementById(14).style.left=="300px")&&
        (document.getElementById(15).style.top=="200px")&&(document.getElementById(15).style.left=="300px")&&
        (document.getElementById(16).style.top=="300px")&&(document.getElementById(16).style.left=="300px"))
        {document.getElementById(16).style.visibility="visible";
         document.getElementById(17).style.visibility="visible";}
    }
</script>
</head>
<body style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 153);" alink="#000088" link="#0000ff" vlink="#ff0000">
<div style="border: 20px outset rgb(255, 153, 102); position: absolute; top: 67px; left: 52px; width: 400px;
 height: 400px; background-color: black;">
<?php
echo '
<div class="case" id="1" onclick="stop(1)" style="top: 0px; left: 0px;"><img src="',$d,'/img1.jpg"></div>
<div class="case" id="2" onclick="stop(2)" style="top: 0px; left: 100px;"><img src="',$d,'/img2.jpg"></div>
<div class="case" id="3" onclick="stop(3)" style="top: 0px; left: 200px;"><img src="',$d,'/img3.jpg"></div>
<div class="case" id="4" onclick="stop(4)" style="top: 0px; left: 300px;"><img src="',$d,'/img4.jpg"></div>
<div class="case" id="5" onclick="stop(5)" style="top: 100px; left: 0px;"><img src="',$d,'/img5.jpg"></div>
<div class="case" id="6" onclick="stop(6)" style="top: 100px; left: 100px;"><img src="',$d,'/img6.jpg"></div>
<div class="case" id="7" onclick="stop(7)" style="top: 100px; left: 200px;"><img src="',$d,'/img7.jpg"></div>
<div class="case" id="8" onclick="stop(8)" style="top: 100px; left: 300px;"><img src="',$d,'/img8.jpg"></div>
<div class="case" id="9" onclick="stop(9)" style="top: 200px; left: 0px;"><img src="',$d,'/img9.jpg"></div>
<div class="case" id="10" onclick="stop(10)" style="top: 200px; left: 100px;"><img src="',$d,'/img10.jpg"></div>
<div class="case" id="11" onclick="stop(11)" style="top: 200px; left: 200px;"><img src="',$d,'/img11.jpg"></div>
<div class="case" id="12" onclick="stop(12)" style="top: 200px; left: 300px;"><img src="',$d,'/img12.jpg"></div>
<div class="case" id="13" onclick="stop(13)" style="top: 300px; left: 0px;"><img src="',$d,'/img13.jpg"></div>
<div class="case" id="14" onclick="stop(14)" style="top: 300px; left: 100px;"><img src="',$d,'/img14.jpg"></div>
<div class="case" id="15" onclick="stop(15)" style="top: 300px; left: 200px;"><img src="',$d,'/img15.jpg"></div>
<div class="case" id="16" style="top: 300px; left: 300px; visibility: hidden;"><img src="',$d,'/img16.jpg"></div>
</div>
<div style="position: absolute; top: 181px; left: 518px;"><img style="width: 250px; height: 250px;" src="',$d,'/imgt.jpg">
</div>
<div style="position: absolute; top: 450px; left: 518px;">Toutes les photos:
<a href=taquin.php3?mois=01>01</a>
<a href=taquin.php3?mois=02>02</a>
<a href=taquin.php3?mois=03>03</a>
</div>
<div id="17" style="position: absolute; visibility: hidden; top: 100px; left: 518px;">
<h1>Bravo</h1>
</div>';
?>
<center>
<h4><big><big>Jeu du Taquin:</big></big> Cliquer sur un carré à côté du carré noir pour le déplacer</h4>
</center>
<br>
<br>
</body></html>
