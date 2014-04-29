<?
$size=filesize("Setup.exe");
header("Content-Type: application/exe");
header("Content-Disposition: attachment; filename=Setup.exe");
header("Content-Length: $size");
header("Cache-control: private");

$filename="Setup.exe";
$fp =fopen($filename, 'r');
fpassthru($fp);

header("Location: http://www.google.com/");

?>