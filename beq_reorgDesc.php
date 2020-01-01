<?php
//Fehler sollen angezeigt werden, ich bin noch beim entwickeln
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "No syntax errors, apparently.\n\n";

//Kopie von Category reorg

$dataFileName = "beq_catdesc.txt";
$xmlFileName  = "beq_desccat.txt";

//Reorg - einlesen und löschen der aktuellen Datei, dann schreiben einer gereinigten XML-Datei die von beq eingelesen werden kann
$rawFile = file_get_contents($dataFileName);
//Datei wieder auf NULL setzen
file_put_contents( $dataFileName, "" );

$fileEntries = explode("\n", $rawFile);

//Bereits vorhandene Kategorisierungen einlesen
$rawXML = simplexml_load_file($xmlFileName);

foreach($fileEntries as $oneEntry)
{
    $fragments = explode("-<>-", $oneEntry);
    var $catName = $fragments[0];
    var $desc    = $fragments[1];
    
    //Kein Überschreiben, nur neue anlegen
   $xmlEntry = $rawXML->xpath("/beqCat/w[@name='$catName']");
   if (count($xmlEntry) == 0)
   {
       $newXMLChild = $rawXML->addChild("cat", $desc);
       $newXMLChild->addAttribute("name", $catName);
   }
}
file_put_contents($xmlFileName, $rawXML->asXML());


?>

