<?php
//FEhler sollen angezeigt werden, ich bin noch beim entwickeln
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Category - whatever the category is
$category = $_GET['category'];
//Description - what is this category for
$description = $_GET['description'];

$xmlFileName  = "beq_CatDesc.txt";

//Daten direkt einlesen und zurückschreiben, ohne Umwege
if ($category != '')
{
    //Bereits vorhandene Kategorisierungen einlesen
    $rawXML = simplexml_load_file($xmlFileName);
    $xmlEntry = $rawXML->xpath("/beqCatDesc/cat[@name='$category']");
   if (count($xmlEntry) > 0)
       $xmlEntry[0][0] = $description;
   else
   {
       $newXMLChild = $rawXML->addChild("cat", $description);
       $newXMLChild->addAttribute("name", $category);
   }    
   
   file_put_contents($xmlFileName, $rawXML->asXML());
}
?>