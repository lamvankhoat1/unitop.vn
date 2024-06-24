<?php

function show_array($data) {
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

function array_key_exists_multi_level($key, $array) {
    if(is_array($array)) {
        $position = strpos(json_encode($array), "\"{$key}\":", 0);
        return ($position == false) ? false : true;
    } 
    return false;
};

