<?php

// Read the variables from the request
$b_sura = $_GET['b_sura'];
$b_aya = $_GET['b_aya'];
$e_sura = $_GET['e_sura'];
$e_aya = $_GET['e_aya'];

// Load the JSON file for the specified translation
$url = $_GET['url'];
$json = file_get_contents($url);
$tarajem = json_decode($json, true);

// Extract the data for the specified range of aya
$pageData = array();
for ($sura = $b_sura; $sura <= $e_sura; $sura++) {
  if ($sura == $b_sura) {
    // Extract the data for the first sura
    $startAya = $b_aya;
    $endAya = $e_sura == $b_sura ? $e_aya : count($tarajem[$sura]);
  } else if ($sura == $e_sura) {
    // Extract the data for the last sura
    $startAya = 1;
    $endAya = $e_aya;
  } else {
    // Extract the data for all other suras
    $startAya = 1;
    $endAya = count($tarajem[$sura]);
  }
  for ($aya = $startAya; $aya <= $endAya; $aya++) {
    $pageData[$sura . '_' . $aya] = $tarajem[$sura][$aya];
  }
}

// Return the data as a JSON object
echo json_encode($pageData);
