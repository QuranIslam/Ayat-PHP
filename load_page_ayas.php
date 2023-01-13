<?php
$b_sura = $_GET["b_sura"];
$b_aya = $_GET["b_aya"];
$e_sura = $_GET["e_sura"];
$e_aya = $_GET["e_aya"];
$url = $_GET["url"];

$file = "tarjmat/".$url.".json";

$json = json_decode(file_get_contents($file), true);

$result = array();
$result["tafsir"] = array();

for($i = $b_sura; $i <= $e_sura; $i++){
    if($i == $b_sura){
        $start = $b_aya;
    }else{
        $start = 1;
    }
    if($i == $e_sura){
        $end = $e_aya;
    }else{
        $end = count($json["tafsir"]);
    }
    for($j = $start; $j <= $end; $j++){
        $key = $i."_".$j;
        if(isset($json["tafsir"][$key])){
            $result["tafsir"][$key] = $json["tafsir"][$key];
        }
    }
}


echo json_encode($result);
?>