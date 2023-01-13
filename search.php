<?php

// Read the contents of the quran.json file into a string
$json = file_get_contents("quran.json");

// Decode the JSON string into an associative array
$data = json_decode($json, true);

// Function to search the data for a given query and return the results as a JSON object
function search($data, $query) {
  // Use the filter function to search for the query within the data
  $results = array_filter($data, function($item) use ($query) {
    return strpos($item['text'], $query) !== false || strpos($item['nass_safy'], $query) !== false;
  });

  // Return the results as an array
  return json_encode(array_values($results));
}

// Get the search query from the HTTP GET request
$query = $_GET['query'];

// Perform the search and return the results as a JSON object
echo search($data, $query);

