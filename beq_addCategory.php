<?php
//FEhler sollen angezeigt werden, ich bin noch beim entwickeln
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//wordKey == boQwI' word definition + ";;" + word type
$wordKey = $_GET['wordKey'];
//wordCat == user-defined Category for word, to be written
$wordCat = $_GET['wordCat'];

if ($wordKey != '')
{
   $fileData = $wordKey . "--" . $wordCat . "\n";
   file_put_contents( "beq_wordCats.txt", $fileData, FILE_APPEND | LOCK_EX );
}
?>