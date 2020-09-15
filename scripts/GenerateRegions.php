<?php
use LibI18N\Locale;
require __DIR__ . '/../vendor/autoload.php';

$regionList = array();

foreach(Locale::allLocales as $locale){
    $currentRegion = Locale::getRegion($locale);
    if(!in_array($currentRegion,$regionList,true) && !empty($currentRegion)){
        $regionList[] = $currentRegion;
    }
}

$outputText = "";
$outputText .= implode('\', \'', $regionList);
$outputText .= "\r\n\r\n";
foreach($regionList as $singleRegion){
    $outputText .= 'const REGION_' . $singleRegion . ' = \'' . $singleRegion . '\';';
    $outputText .= "\r\n";
}
file_put_contents('output.txt',$outputText);