<?php
// Load the JSON file
$quran_json = file_get_contents('quran.json');
$quran = json_decode($quran_json, true);

// Get the sura and aya parameters from the request
$sura = $_GET['sura'];
$aya = $_GET['aya'];

// Loop through the array of verses in the file
foreach ($quran as $verse) {
  // Check if the verse's sura and aya match the specified sura and aya
  if ($verse['sura'] == $sura && $verse['aya'] == $aya) {
    // If a match is found, return the verse as a JSON object
    echo json_encode($verse);
    return;
  }
}

// If no match is found, return an error message
echo json_encode(array('error' => 'Verse not found'));
