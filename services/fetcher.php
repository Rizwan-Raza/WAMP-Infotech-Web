<?php 

function getJson($filepath, $filter = null) {
    $string = file_get_contents($filepath);
    $json = json_decode($string, true);
    if($filter != null) {
        return $json[$filter];
    }
    return $json;
}

?>