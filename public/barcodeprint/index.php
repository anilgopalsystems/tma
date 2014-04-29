<?php

$assetname = $_POST['asset_name'];
$assetbarcodeno = $_POST['asset_key'];  

$content = 'I8,A,001


Q240,024
q831
rN
S4
D7
ZT
JF
OD
R56,0
f100
N
B657,184,2,1,2,6,114,B,"'.$assetbarcodeno.'"
A716,223,2,4,1,1,N,"Asset Name :"
A518,224,2,4,1,1,N,"'.$assetname.'"
B297,184,2,1,2,6,114,B,"'.$assetbarcodeno.'"
A356,223,2,4,1,1,N,"Asset Name :"
A158,224,2,4,1,1,N,"'.$assetname.'"
P1
';


$my_file = 'assetlabel.txt';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
$res = fwrite($handle, $content);

?>
