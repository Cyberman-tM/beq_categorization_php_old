<?php
//Fehler sollen angezeigt werden, ich bin noch beim entwickeln
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "No syntax errors, apparently.\n\n";

//Define filenames for raw data and finished product
$dataFileName = "beq_cat_raw.txt";
$xmlFileName  = "beq_categorized.txt";    //This is XML but called TXT to prevent servers from interefering

//Reorg - einlesen und löschen der aktuellen Datei, dann schreiben einer gereinigten XML-Datei die von beq eingelesen werden kann
$rawFile = file_get_contents($dataFileName);

//Roh-Datei wieder auf NULL setzen
file_put_contents( $dataFileName, "" );

//Die Rohdatei wird zeilenweise geschrieben
$fileEntries = explode("\n", $rawFile);
$procEntries = [];

//Before we read in the new words, we have to read in the already categorized words, because
//that way we get the actual categories!











?php>
