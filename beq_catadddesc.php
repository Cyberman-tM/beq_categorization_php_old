<?php
//FEhler sollen angezeigt werden, ich bin noch beim entwickeln
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Category - whatever the category is
$category = $_GET['category'];
//Description - what is this category for
$description = $_GET['description'];

if ($category != '')
{
   $description = str_replace("\n", "<br>", $description);
   $fileData = $category . "-<>-" . $description . "\n";
   file_put_contents( "beq_catdesc.txt", $fileData, FILE_APPEND | LOCK_EX );
}
?>