<?php
//Fehler sollen angezeigt werden, ich bin noch beim entwickeln
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "No syntax errors, apparently.\n\n";

$dataFileName = "beq_wordCats.txt";
$xmlFileName  = "beq_Categories.txt";

//Reorg - einlesen und löschen der aktuellen Datei, dann schreiben einer gereinigten XML-Datei die von beq eingelesen werden kann
$rawFile = file_get_contents($dataFileName);
//Datei wieder auf NULL setzen
file_put_contents( $dataFileName, "" );

$fileEntries = explode("\n", $rawFile);
$procEntries = [];

//Combine same word categories, remove duplicates
foreach($fileEntries as $oneEntry)
{
    $fragments = explode("--", $oneEntry);
    if (count($fragments) > 1)
    {
        //Beim ersten Mal kommt hier eine Warnung, die ist aber egal
        $procEntry = $procEntries[$fragments[0]];
        echo $procEntry;
        if (isset($procEntry))
        {
            if (!in_array($fragments[1], $procEntry))
                array_push($procEntries[$fragments[0]], $fragments[1]);
        }
        else
        {
            $procEntries[$fragments[0]] = array($fragments[1]);
        }    
    }    
}

//Bereits vorhandene Kategorisierungen einlesen
$rawXML = simplexml_load_file($xmlFileName);

foreach ($procEntries as $procKey => $procEntry)
{
   $xmlEntry = $rawXML->xpath("/beqCat/w[@name='$procKey']");
   if (count($xmlEntry) > 0)
   {
foreach ($xmlEntry as $entry)
{
       $categs = explode(";", $entry);
       $newCategs = array_merge($categs, $procEntry);
       $entry[0] = implode(";", $newCategs); 
}
   }  
   else
   {
       //Not found - we have to create a new XML entry for it
       $newCategs = implode(";", $procEntry);
       $newXMLChild = $rawXML->addChild("w", $newCategs);
       $newXMLChild->addAttribute("name", $procKey);
   }
}
file_put_contents($xmlFileName, $rawXML->asXML());


?>

